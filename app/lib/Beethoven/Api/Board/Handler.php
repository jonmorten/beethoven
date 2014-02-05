<?php

namespace Beethoven\Api\Board;

class Handler
{

	public function __construct ()
	{}

	public function getBoard ( $id )
	{
		return array( 'test' );
	}
	public function newBoard ()
	{
		$test = \DB::connection( 'activecollab' )->select(
			"SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='ProjectCategory'"
		);
		return array( $test );
	}
	public function patchBoard ( $id )
	{
		return array( 'test' );
	}

	// categories
	// $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='ProjectCategory'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='ProjectCategory' AND `id`='{$id}'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='TaskCategory'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type` FROM `acx_categories` WHERE `type`='TaskCategory' AND `id`='{$id}'" );


	// labels
	// $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='ProjectLabel'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='ProjectLabel' AND `id`='{$id}'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='AssignmentLabel'" );
	// $connection->fetchAll( "SELECT `id`, `name`, `type`, `raw_additional_properties` FROM `acx_labels` WHERE `type`='AssignmentLabel' AND `id`='{$id}'" );

	// foreach ( $label as &$_label )
	// {
	//     $_label['raw_additional_properties'] = unserialize( $_label['raw_additional_properties'] );
	// }


	// users
	// $connection->fetchAll( "SELECT `id`, `first_name`, `last_name`, `email`, `last_login_on` FROM `acx_users` WHERE `company_id` = '6'" );
	// $connection->fetchAll( "SELECT `id`, `first_name`, `last_name`, `email` FROM `acx_users` WHERE `id`='{$id}'" );

}
