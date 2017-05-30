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
//        $service = $this->get('domain_info');
//        if($service->isLocaleAllowed())
//        {
//            echo $service->isLocaleAllowed() . ' locale allowed.';
//        }
//        else
//        {
//            echo 'Without locale';
//        }
        $choices = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Language')->findAll();
        $codes = [];

        foreach ($choices as $id => $code)
        {
            $codes[$code->getCode()] = $code->getCode();
        }
        print_r($codes);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homeAction()
    {
        $articles = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Articles')
            ->findAllOrderedByPublishDate();

//        $categories = $this->get('doctrine.orm.entity_manager')
//            ->getRepository('AppBundle:Articles')
//            ->getArticleCategory();

        // replace this example code with whatever you need
        return $this->render('AppBundle:Site:site_main_page.html.twig', array(
                'articles' => $articles
            )
        );
    }
}