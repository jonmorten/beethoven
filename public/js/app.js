define( [
	'underscore',
	'backbone',
	'backbone.marionette',
	'mock/mock'
], function ( _, Backbone, Marionette, mock ) {


	var Beethoven = new Marionette.Application();


	Beethoven.navigate = function ( route, options ) {
		options = options || {};
		Backbone.history.navigate( route, options );
	};
	Beethoven.Router = Backbone.Router.extend( {
		routes: {
			'board/show/:id/*filters': 'board',
			'board/show/:id': 'board',
			'board/edit/:id': 'editBoard',
			'board/new': 'newBoard',
			'*path': 'default'
		},

        initialize: function () {
			if ( Backbone.history ) {
				Backbone.history.start();
			}
        },

		board: function ( id, filters ) {
			console.info( 'board: ' + id );

			if ( filters ) {
				filters = _.object(
					_.filter(
						_.map(
							filters.split( '/' ),
							function( filterSet ) {
								var splitSet = filterSet.split( ':' );
								return ( splitSet.length > 1 ? [ splitSet[0], splitSet[1] ] : null );
							}
						),
						function( filterSet ) {
							return !!filterSet;
						}
					)
				);
			}

			require( [
				'collections/column',
				'collections/task',
				'views/pages/board'
			], function( ColumnCollection, TaskCollection, BoardView ) {
				var columns = new ColumnCollection( mock.columns );
				columns.each( function( column ) {
					var tasks = column.get( 'tasks' );
					var taskCollection = new TaskCollection( tasks );
					column.set( 'tasks', taskCollection );
				});

				var boardView = new BoardView( {
					collection: columns
				} );

				Beethoven.contentRegion.show( boardView );
			} );

		},

		editBoard: function ( id ) {
			console.info( 'edit: ' + id );
		},

		newBoard: function () {
			console.info( 'newboard' );

			require( [
				'views/pages/newboard'
			], function( NewBoardView ) {
				Beethoven.contentRegion.show( new NewBoardView() );
			} );
		},

		default: function ( path ) {
			console.info( 'default' );
			console.log( path );
		}
	} );


	Beethoven.addInitializer( function( options ) {
		var router = new Beethoven.Router();

		Beethoven.addRegions( {
			headerRegion: options.headerRegionSelector,
			contentRegion: options.contentRegionSelector
		} );
	} );


	return Beethoven;


} );
