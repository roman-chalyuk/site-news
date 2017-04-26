<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 24.04.17
 * Time: 18:51
 */

namespace AppBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/article", name="article_main_page")
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Site:Article/article_main_page.html.twig');
    }
}