<?php

namespace OhSeven\Beethoven\ApiBundle\Handler;

interface BoardHandlerInterface
{

    /**
     */
    public function get ( $id );

    /**
     */
    public function getAll ();

    /**
     */
    public function createBoard ();

}
