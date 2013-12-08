<?php

namespace OhSeven\Beethoven\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;

class BoardController extends SymfonyController implements ClassResourceInterface
{
    /**
     * @Rest\View
     */
    public function cgetAction ()
    {
        $boards = $this->get( 'oh_seven_beethoven_api.board.handler' )->getAll();

        return array(
            'boards' => $boards,
        );
    }

    /**
     * @Rest\View
     */
    public function getAction ( $id )
    {
        if ( !( $board = $this->get( 'oh_seven_beethoven_api.board.handler' )->get( $id ) ) )
        {
            throw new NotFoundHttpException( "The resource '{$id}' was not found." );
        }

        return array(
            'board' => $board,
        );
    }

    /**
     * @Rest\View
     */
    public function createAction ()
    {
        $board = $this->get( 'oh_seven_beethoven_api.board.handler' )->create();

        return array(
            'board' => $board,
        );
    }

    /**
     * @Rest\View
     */
    public function postAction ()
    {
        $request = $this->getRequest();
        $parameters = $request->request->all();
        return $this->get( 'oh_seven_beethoven_api.board.handler' )->post( $parameters );
    }
}
