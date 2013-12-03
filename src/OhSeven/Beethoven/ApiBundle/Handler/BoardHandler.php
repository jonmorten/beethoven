<?php

namespace OhSeven\Beethoven\ApiBundle\Handler;

class BoardHandler implements BoardHandlerInterface
{
    private $repository;

    public function __construct ( $repository )
    {
        $this->repository = $repository;
    }

    /**
     */
    public function get ( $id )
    {
        return $this->repository->find( $id );
    }

    /**
     */
    public function getAll ()
    {
        return $this->repository->findAll();
    }

    /**
     */
    public function createBoard ()
    {
         return new $this->entityClass();
    }

}
