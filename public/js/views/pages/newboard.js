define( [
	'underscore',
	'jquery',
	'backbone',
	'text!templates/pages/board_config.html',
	'views/form/chosen_select',
	'views/form/color_select'
], function ( _, $, Backbone, BoardConfigTemplate, ChosenSelectView, ColorSelectView ) {


	var newBoardRequest = $.ajax( '/api/board/new' );

	var NewBoardView = Backbone.View.extend( {
		template: _.template( BoardConfigTemplate ),
		render: function () {
			var view = this;
			view.el = view.template();

			$.when( newBoardRequest ).then( function() {
				$( '.view-is-loading' ).removeClass( '.view-is-loading' );

				var result = newBoardRequest.responseJSON.result;

				var chosen_select_data = _.extend(
					{ labels: result.column_options.labels },
					result.task_filters
				);

				$( '[data-chosen-select]' ).each( function() {
					var $this = $( this );
					new ChosenSelectView( {
						$el: $this,
						collection: new Backbone.Collection( chosen_select_data[ $this.data( 'chosen-select' ) ] )
					} );
				} );

				new ColorSelectView( {
					$el: $( '[data-color-select]:first' ),
					collection: new Backbone.Collection( result.column_options.colors )
				} );

				var task_filter_data_key = 'data-task-filter';
				var $taskFilterSelect = $( '[data-task-filter-select]' );
				var $taskFilters = $( '[' + task_filter_data_key + ']' );
				var showSelectedTaskFilter = function ( event ) {
					var filter_type = $taskFilterSelect.find( ':selected:first' ).val();
					$taskFilters.hide().filter( [ '[', task_filter_data_key, '="', filter_type, '"]' ].join( '' ) ).show();
				};
				$taskFilterSelect.on( 'change', showSelectedTaskFilter );
				showSelectedTaskFilter();
			} );
		}
	} );


	return NewBoardView;


} );
