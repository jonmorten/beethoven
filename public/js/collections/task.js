define( [
	'backbone',
	'models/task'
], function ( Backbone, Task ) {

	var TaskCollection = Backbone.Collection.extend( {
		model: Task
	} );

	return TaskCollection;

} );
