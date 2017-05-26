<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 26.04.17
 * Time: 12:21
 */

namespace AppBundle\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    protected $media = '';

    public function contentAction()
    {
//        $media = $mediaManager->findOneBy(array('id' => 7));

        return $this->render('AppBundle:Site:site_content_block.html.twig', array(
            'media' => $this->media
        ));
    }
}