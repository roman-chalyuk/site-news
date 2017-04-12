<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 12.04.17
 * Time: 11:00
 */
namespace AppBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class DefaultController extends Controller
{
    /**
     * @Route("/test", name="test_page")
     */
    public function testAction()
    {
        $service = $this->get('domain_info');
        if($service->isLocaleAllowed())
        {
            echo $service->isLocaleAllowed() . ' locale allowed.';
        }
        else
        {
            echo 'Without locale';
        }
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homeAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}