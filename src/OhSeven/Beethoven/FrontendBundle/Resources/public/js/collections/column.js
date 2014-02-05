define( [
	'backbone',
	'models/column'
], function ( Backbone, Column ) {

	var ColumnCollection = Backbone.Collection.extend( {
		model: Column
	} );

	return ColumnCollection;

} );
