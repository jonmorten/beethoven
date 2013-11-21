<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class BoardController extends FOSRestController
{

    /**
     * @Rest\View
     */
    public function allAction ()
    {
        return array(
            'users' => array(
                33 => array( 'name' => 'Dummy0' ),
                44 => array( 'name' => 'Dummy1' ),
            ),
        );
    }

    /**
     * @Rest\View
     */
    public function getAction ( $id )
    {
        return array(
            'user' => array( 'name' => 'Dummy0' ),
        );
    }

}
