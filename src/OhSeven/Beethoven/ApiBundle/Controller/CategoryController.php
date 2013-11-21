<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategoryController extends FOSRestController
{

    /**
     * @Rest\View
     */
    public function allProjectAction ()
    {
        $connection = $this->get( 'database_connection' );
        $categories = $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='ProjectCategory'" );

        return array(
            'result' => $categories,
        );
    }


    /**
     * @Rest\View
     */
    public function getProjectAction ( $id )
    {
        $connection = $this->get( 'database_connection' );
        $categories = $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='ProjectCategory' AND `id`='{$id}'" );

        return array(
            'result' => $categories,
        );
    }


    /**
     * @Rest\View
     */
    public function allTaskAction ()
    {
        $connection = $this->get( 'database_connection' );
        $categories = $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='TaskCategory'" );

        return array(
            'result' => $categories,
        );
    }


    /**
     * @Rest\View
     */
    public function getTaskAction ( $id )
    {
        $connection = $this->get( 'database_connection' );
        $categories = $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='TaskCategory' AND `id`='{$id}'" );

        return array(
            'result' => $categories,
        );
    }

}
