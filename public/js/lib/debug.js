define( function() {

	var response = function ( arg, method ) {
		method = method || 'log';
		if ( typeof console === 'undefined' || !console[method] ) {
			return;
		}
		return console[method]( arg );
	};

	var d = {
		e: function ( arg ) {
			return response( arg, 'error' );
		},
		i: function ( arg ) {
			return response( arg, 'info' );
		},
		l: function ( arg ) {
			return response( arg, 'log' );
		},
		w: function ( arg ) {
			return response( arg, 'warn' );
		}
	};

	return d;

} );
