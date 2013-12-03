<?php

namespace OhSeven\Beethoven\ApiBundle\Model;

Interface BoardInterface
{
    /**
     */
    public function getId();

    /**
     */
    public function setColumns( $columns );

    /**
     */
    public function getColumns();

    /**
     */
    public function setName( $name );

    /**
     */
    public function getName();

    /**
     */
    public function setFilter( $filter );

    /**
     */
    public function getFilter();
}
