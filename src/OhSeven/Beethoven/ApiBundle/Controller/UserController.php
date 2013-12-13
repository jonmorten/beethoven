<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;

class UserController extends SymfonyController implements ClassResourceInterface
{

    /**
     * @Rest\View
     */
    public function cgetAction ()
    {
        $connection = $this->get( 'database_connection' );
        $users = $connection->fetchAll( "SELECT `id`, `first_name`, `last_name`, `email`, `last_login_on` FROM `acx_users` WHERE `company_id` = '6'" );

        return array(
            'result' => $users,
        );
    }

    /**
     * @Rest\View
     */
    public function getAction ( $id )
    {
        $connection = $this->get( 'database_connection' );
        $user = $connection->fetchAll( "SELECT `id`, `first_name`, `last_name`, `email` FROM `acx_users` WHERE `id`='{$id}'" );

        return array(
            'result' => $user,
        );
    }

}
