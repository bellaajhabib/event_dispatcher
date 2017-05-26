<?php
/**
 * Created by PhpStorm.
 * User: habib1
 * Date: 25/05/17
 * Time: 11:20
 */

namespace Mos\VenteBundle\Beta;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class BetaListener
{
//Notre Processur
 protected $betaHTML;
    // la date defin de la version bêta:
    // Avant cette date, on affichera un compte à rebours
    // Après cette date, on n'affichera plus le b$eta
    public function __construct(BetaHtmlAdder $betaHTML,$endDate)
    {
        $this->betaHTML=$betaHTML;
        $this->endDate=new \ DateTime($endDate);
        dump($this->endDate);

    }
    // L'argument de la méthode est un FuilterResponseEvent
    public function processBeta(FilterResponseEvent $event){

        // On test si la requête est bien la requête principale  (et non une sous-requête)
        if (!$event->isMasterRequest()){
            return;
        }
        //On récupère la réponse que le gestionnaire a insérée dans l'évenement.
        $response=$event->getResponse();

        // Ici,on modifie comme on veut la réponse
//        $response->setContent('<h1>IO</h1>');
        // Puis on insère la réponse modifiée dans l'événement.
        $event->setResponse($response);

        $remainingDays=$this->endDate->diff(new \DateTime())->days;
        if($remainingDays<=0){
            // Si la date est dépassée,on ne fait rein.
            return;
        }
        // Ici,on appellera la méthode
        // $this->beat
    }

    public function ignoreBeta(FilterControllerEvent $event){

        $controller=$event->getController();
        dump($controller);
    }

}