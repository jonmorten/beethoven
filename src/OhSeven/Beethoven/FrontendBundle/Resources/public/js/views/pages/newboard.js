define( [
	'underscore',
	'jquery',
	'backbone',
	'backbone.marionette'
], function ( _, $, Backbone, Marionette ) {


	var NewBoardView = Backbone.View.extend();


	var ProjectCategoryView = Marionette.ItemView.extend( {
		template: _.template( '<option value="<%= id %>"><%= name %></option>' ),
		render: function () {
			this.setElement( this.template( this.model.attributes ) );
		}
	} );
	var ProjectCategoriesSelect = Marionette.CompositeView.extend( {
		el: '#app-content',//@todo
		className: 'column',
		tagName: 'div',
		template: _.template( '<h1>Categories</h1><select></select>' ),
		itemView: ProjectCategoryView,
		itemViewContainer: 'select'
	} );


	var ProjectCategoryModel = Backbone.Model.extend();
	var ProjectCategoryCollection = Backbone.Collection.extend( {
		model: ProjectCategoryModel,
		parse: function( response ) {
			return response.result;
		}
	} );

	var projectCategories = new ProjectCategoryCollection( [], { url: '/category/project' } );
	var fetched = projectCategories.fetch();
	$.when( fetched ).then( function() {
		console.log( projectCategories );
		new ProjectCategoriesSelect( {
			collection: projectCategories
		} ).render();
	} );


	return NewBoardView;


} );
