<?php

namespace OhSeven\Beethoven\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
	    $response = $this->render( 'OhSevenBeethovenFrontendBundle:Default:index.html.twig' );
	    $response->headers->set( 'Content-Type', 'text/html' );
        return $response;
    }
}
