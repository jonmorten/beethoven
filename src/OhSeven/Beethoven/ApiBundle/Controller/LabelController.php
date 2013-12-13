<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;

class LabelController extends SymfonyController implements ClassResourceInterface
{

    /**
     * @Rest\View
     */
    public function allProjectAction ()
    {
        $connection = $this->get( 'database_connection' );
        $labels = $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='ProjectLabel'" );

        foreach ( $labels as &$label )
        {
            $label['raw_additional_properties'] = unserialize( $label['raw_additional_properties'] );
        }

        return array(
            'result' => $labels,
        );
    }

    /**
     * @Rest\View
     */
    public function getProjectAction ( $id )
    {
        $connection = $this->get( 'database_connection' );
        $label = $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='ProjectLabel' AND `id`='{$id}'" );

        foreach ( $label as &$_label )
        {
            $_label['raw_additional_properties'] = unserialize( $_label['raw_additional_properties'] );
        }

        return array(
            'result' => $label,
        );
    }

    /**
     * @Rest\View
     */
    public function allTaskAction ()
    {
        $connection = $this->get( 'database_connection' );
        $labels = $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='AssignmentLabel'" );

        foreach ( $labels as &$label )
        {
            $label['raw_additional_properties'] = unserialize( $label['raw_additional_properties'] );
        }

        return array(
            'result' => $labels,
        );
    }

    /**
     * @Rest\View
     */
    public function getTaskAction ( $id )
    {
        $connection = $this->get( 'database_connection' );
        $label = $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='AssignmentLabel' AND `id`='{$id}'" );

        foreach ( $label as &$_label )
        {
            $_label['raw_additional_properties'] = unserialize( $_label['raw_additional_properties'] );
        }

        return array(
            'result' => $label,
        );
    }

}
