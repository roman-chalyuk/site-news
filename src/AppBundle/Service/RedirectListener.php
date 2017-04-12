<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 11:14
 */
namespace AppBundle\Service;

use AppBundle\Service\Managers\Domain;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RedirectListener
{

    /** @var  Router */
    private $router;

    /** @var  EntityManager */
    private $dm;

    /** @var  Domain */
    private $domain;

    public function __construct($router, $dm, $domain)
    {
        $this->router = $router;
        $this->dm = $dm;
        $this->domain = $domain;
    }

//    public function onKernelController(FilterControllerEvent $event)
//    {
//        /** @var CityController $controller */
//        $controller = $event->getController();
//        if (!is_array($controller)) {
//            return;
//        }

//        if ($controller[0] instanceof CityAliasControllerInterface) {
//            $city = $event->getRequest()->get('cityUrlName');
//            $city = $this->dm->getRepository('AppBundle:CitiesAliases')->getCityForAlias($city);
//
//            foreach ($city as $item) {
//                throw new CityAliasRedirectException($item->getCity()->getUrlName());
//            }
//        }
//    }

//    public function onKernelException(GetResponseForExceptionEvent $event)
//    {
//        if ($event->getException() instanceof CityAliasRedirectException) {
//            $event->setResponse(new RedirectResponse(
//                $this->router->generate(
//                    $event->getRequest()->get('_route'),
//                    ['cityUrlName' => $event->getException()->getMessage(), '_locale' => $event->getRequest()->getLocale()]
//                ), 301
//            ));
//        } elseif ($event->getException() instanceof NewsWrongLanguageException) {
//            $event->setResponse(new RedirectResponse(
//                $this->router->generate(
//                    'news_list',
//                    ['_locale' => $this->domain->getDefaultNewsLocale()]
//                ), 302
//            ));
//        }
//    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->isMasterRequest()) {

            $this->redirectByList($event);

            if ($event->getRequest()->getRequestUri() === '/') {
                $this->redirectToDefaultLocale($event);
            }

            if (!$this->domain->isLocaleAllowed()) {
                throw new HttpException(404, "This language is not supported on this domain");
            }
        }
//        print_r($event->getRequestType());
    }

    private function redirectByList(GetResponseEvent $event)
    {
        $uri = $event->getRequest()->getRequestUri();

        $redirect = $this->dm->getRepository('AppBundle:Redirect')->findOneBy(['sourceUri' => $uri]);

        if ($redirect) {
            $event->setResponse(new RedirectResponse($redirect->getDestinationUri(), $redirect->getStatusCode()));
        }
    }

    private function redirectToDefaultLocale(GetResponseEvent $event)
    {
        $event->setResponse(
            new RedirectResponse(
                $this->router->generate('homepage', ['_locale' => $this->domain->getDefaultLocale()->getCode()])
            )
        );
    }
}