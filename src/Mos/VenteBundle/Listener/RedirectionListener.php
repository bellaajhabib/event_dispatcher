<?php
/**
 * Created by PhpStorm.
 * User: habib1
 * Date: 19/05/17
 * Time: 15:45
 */

namespace Mos\VenteBundle\Listener;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
//        $this->securityContext = $container->get('security.context');
    }

    public function onKernelRequest(FilterControllerEvent $event)
    {
        $request = $event->getRequest();

        // Matched route
        $_route  = $request->attributes->get('_route');
        // Matched controller
        $_controller = $request->attributes->get('_controller');

        // All route parameters including the `_controller`
        $params      = $request->attributes->get('_route_params');
        dump($_controller);


    }

}