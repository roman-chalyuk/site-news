<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.04.17
 * Time: 12:22
 */

namespace AppBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RightContentController extends Controller
{
    public function rightContentAction()
    {
        return $this->render('AppBundle:Site:site_right_block.html.twig');
    }
}