<?php

namespace OhSeven\Beethoven\ApiBundle\Handler;

use OhSeven\Beethoven\ApiBundle\Form\BoardType;
use OhSeven\Beethoven\ApiBundle\Model\BoardInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\Persistence\ObjectRepository;

use Symfony\Component\Form\FormFactoryInterface;

class BoardHandler
{
    /**
     *  @var EntityManager
     */
    private $entityManager;

    /**
     *  @var ObjectRepository
     */
    private $repository;

    /**
     *  @var FormFactoryInterface
     */
    private $formFactory;

    /**
     *  @var
     */
    private $entityClass;

    /**
     *  @param entityManager        $entityManager
     *  @param FormFactoryInterface $formFactory
     *  @param                      $entityClass
     */
    public function __construct ( EntityManager $entityManager, FormFactoryInterface $formFactory, $entityClass )
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository( $entityClass );
        $this->formFactory = $formFactory;
        $this->entityClass = $entityClass;
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
    public function create ()
    {
        return $this->formFactory->create( new BoardType() );
    }

    /**
     */
    public function post ( array $parameters )
    {
        $board = new $this->entityClass();
        return $this->processForm( $board, $parameters, 'POST' );
    }

    private function processForm ( BoardInterface $board, array $parameters, $method = 'PUT' )
    {
        $form = $this->formFactory->create( new BoardType(), $board, array( 'method' => $method ) );
        $form->submit( $parameters, $method !== 'PATCH' );
        if ( $form->isValid() )
        {
            $board = $form->getData();
            $this->entityManager->persist( $board );
            $this->entityManager->flush( $board );

            return $board;
        }
        return false;
    }
}
