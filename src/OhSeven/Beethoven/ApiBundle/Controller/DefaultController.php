<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render( 'OhSevenBeethovenApiBundle:Default:index.html.twig' );
    }
}
