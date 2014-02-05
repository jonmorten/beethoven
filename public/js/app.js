define( [
	'underscore',
	'backbone',
	'backbone.marionette',
	'mock/mock'
], function ( _, Backbone, Marionette, mock ) {


	var Beethoven = new Marionette.Application();


	Beethoven.navigate = function ( route, options ) {
		options = options || {};
		console.info( 'navigating to:' );
		console.log( route );
		console.log( options );
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
			console.info( 'board' );
			console.log( id );

			if ( filters ) {
				filters = _.object(
					_.filter(
						_.map(
							filters.split( '/' ),
							function( set ) {
								var splitSet = set.split( ':' );
								return ( splitSet.length > 1 ? [ splitSet[0], splitSet[1] ] : null );
							}
						),
						function( set ) {
							return !!set;
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
			console.info( 'edit' );
			console.log( id );
		},

		newBoard: function () {
			console.info( 'newboard' );

			require( [
				'views/pages/newboard'
			], function( NewBoardView ) {
				var newBoardView = new NewBoardView();

				Beethoven.contentRegion.show( newBoardView );
			} );
		},

		default: function ( path ) {
			console.info( 'default' );
			console.log( path );
		}
	} );


	Beethoven.addInitializer( function( options ) {
		var router = new Beethoven.Router();
		//router.navigate( 'board/new' );

		Beethoven.addRegions( {
			headerRegion: options.headerRegionSelector,
			contentRegion: options.contentRegionSelector
		} );
	} );


	return Beethoven;


} );
