<?php
/**
 * Created by PhpStorm.
 * User: habib1
 * Date: 25/05/17
 * Time: 11:16
 */

namespace Mos\VenteBundle\Beta;


use Symfony\Component\HttpFoundation\Response;

class Beta
{
    //Méthode pour ajouter le bêta à une réponse
    public function addBeta(Response $response, $remainingDays)
    {
        $content=$response->getContent();
        //Code à ajouter
        // je mets ici du css en ligne mais il faudrait utiliser un fichier css
        // bin sûr
        $html = 'div style="position: absolute; top: 0; background: orange;
            width: 100%; text-align: center; padding: 0.5em;">Beta J-'.(int)
            $remainingDays.' !</div>';
        // Inserstion du code dans la page
        $content=str_replace('<body>','<body>'.$html,$content

        );
        //Modification du contenu dans la réponse
        $response->setContent($content);
        return $content;

    }
}