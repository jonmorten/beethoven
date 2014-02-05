define( [
	'underscore',
	'backbone',
	'backbone.marionette'
], function ( _, Backbone, Marionette ) {


	var TaskView = Marionette.ItemView.extend( {
		className: 'task',
		tagName: 'article',
		template: _.template( [
			'<%= project.name %><br>',
			'<strong><%= title %></strong><br>',
			'<% if (owner !== null) { %><em><%= owner.name %></em><% } %>'
		].join( '' ) ),
		events: {
			'click': function() {
				var label = this.model.get( 'label' );
				alert( label.name );
			}
		}
	} );


	var ColumnView = Marionette.CompositeView.extend( {
		className: 'column',
		tagName: 'section',
		template: _.template( '<h1><%= name %></h1><div></div>' ),
		itemView: TaskView,
		itemViewContainer: 'div',
		initialize: function() {
			this.collection = this.model.get( 'tasks' );
		}
	} );


	var BoardView = Marionette.CollectionView.extend( {
		className: 'board',
		itemView: ColumnView
	} );


	return BoardView;


} );
