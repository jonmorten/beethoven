<?php

namespace Beethoven\Api\Board;
use DB as DB;

class Handler
{


	const QUERY_TTL = 10;


	public function __construct ()
	{}


	private function acDb ()
	{
		return DB::connection( 'activecollab' );
	}


	public function getBoard ( $id )
	{
		return array( 'test' );
	}


	public function newBoard ()
	{
		$result = array();

		//	Task filters

		$projects = $this->acDb()
			->table( 'acx_projects' )
			->select( 'id', 'name' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$users = $this->acDb()
			->table( 'acx_users' )
			->select(
				'id',
				$this->acDb()->raw( 'CONCAT(`first_name`, " ", `last_name`) as `name`' )
			)
			->where( 'company_id', '6' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$projectCategories = $this->acDb()
			->table( 'acx_categories' )
			->select( 'id', 'name' )
			->where( 'type', 'ProjectCategory' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$projectLabels = $this->acDb()
			->table( 'acx_labels' )
			->select( 'id', 'name' )
			->where( 'type', 'ProjectLabel' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$taskCategories = $this->acDb()
			->table( 'acx_categories' )
			->select( 'id', 'name' )
			->where( 'type', 'TaskCategory' )
			->groupBy( 'name' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$result['task_filters'] = array(
			'projects' => $projects,
			'users' => $users,
			'project_categories' => $projectCategories,
			'project_labels' => $projectLabels,
			'task_categories' => $taskCategories,
		);

		//	Column options

		$colors = array_map(
			function ( $color )
			{
				return array(
					'id' => $color,
					'name' => ucfirst( $color ),
				);
			},
			array(
				'black',
				'blue',
				'brown',
				'cyan',
				'gray',
				'green',
				'magenta',
				'maroon',
				'navy',
				'orange',
				'purple',
				'red',
				'teal',
				'violet',
				'yellow',
			)
		);
		$taskLabels = $this->acDb()
			->table( 'acx_labels' )
			->select( 'id', 'name' )
			->where( 'type', 'AssignmentLabel' )
			->orderBy( 'name', 'ASC' )
			->remember( self::QUERY_TTL )->get();

		$result['column_options'] = array(
			'colors' => $colors,
			'labels' => $taskLabels,
		);

		return array(
			'status' => '@todo',
			'result' => $result,
		);
	}


	public function patchBoard ( $id )
	{
		return array( 'test' );
	}


}
