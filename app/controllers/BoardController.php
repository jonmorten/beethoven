<?php

class BoardController extends BaseController
{

	private $boardHandler;

    public function __construct ()
    {
		$this->boardHandler = App::make( 'BoardHandler' );
    }

	public function getBoard ( $id )
	{
		return Response::json( $this->boardHandler->getBoard( $id ) );
	}

	public function newBoard ()
	{
		return Response::json( $this->boardHandler->newBoard() );
	}

	public function patchBoard ( $id )
	{
		return Response::json( $this->boardHandler->patchBoard( $id ) );
	}

}
