<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends FOSRestController
{

    /**
     * @Rest\View
     */
    public function indexAction ()
    {
        return array(
            'ping' => 'pong',
        );
    }

}
