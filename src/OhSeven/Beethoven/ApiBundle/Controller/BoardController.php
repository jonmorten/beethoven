<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use OhSeven\Beethoven\ApiBundle\Form\BoardType;

class BoardController extends FOSRestController
{

    /**
     * @Rest\View
     */
    public function createAction ()
    {
        return $this->createForm( new BoardType() );
    }

    /**
     * @Rest\View
     */
    public function allAction ()
    {
        $boards = $this->getAll();

        return array(
            'boards' => $boards,
        );
    }

    /**
     * @Rest\View
     */
    public function getAction ( $id )
    {
        $board = $this->getOr404( $id );

        return array(
            'board' => $board,
        );
    }

    /**
     */
    private function getOr404 ( $id = null )
    {
        if ( !( $board = $this->get( 'oh_seven_beethoven_api.board.handler' )->get( $id ) ) )
        {
            throw new NotFoundHttpException( "The resource '{$id}' was not found." );
        }

        return $board;
    }

    /**
     * @Rest\View
     */
    private function getAll ()
    {
        $boards = $this->get( 'oh_seven_beethoven_api.board.handler' )->getAll();

        return array(
            'boards' => $boards,
        );
    }

}
