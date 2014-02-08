( function( requirejs ) {
	requirejs.config( {
		paths: {
			'async': '../vendor/js/require/require.async-0.1.1.min',
			'backbone': '../vendor/js/backbone/backbone-1.0.0.min',
			'backbone.localStorage': '../vendor/js/backbone.localStorage',
			'backbone.marionette': '../vendor/js/backbone/backbone.marionette-1.2.2.min',
			'bootstrap': '../vendor/js/bootstrap/bootstrap-3.0.3.min',
			'jquery': '../vendor/js/jquery/jquery-2.0.3.min',
			'jquery-ui': '../vendor/js/jquery/jquery-ui-1.10.4.custom.min',
			'jquery.chosen': '../vendor/js/chosen/chosen.jquery.min',
			'text': '../vendor/js/require/require.text-2.0.3',
			'underscore': '../vendor/js/underscore/underscore-1.5.1.min'
		},

		shim: {
			'backbone': {
				deps: [ 'jquery', 'underscore' ],
				exports: 'Backbone'
			},
			'backbone.localStorage': {
				deps: [ 'backbone' ],
				exports: 'Backbone.LocalStorage'
			},
			'backbone.marionette': {
				deps: [ 'backbone', 'jquery', 'underscore' ],
				exports: 'Marionette'
			},
			'jquery.chosen': {
				deps: [ 'jquery' ]
			},
			'jquery': {
				exports: '$'
			},
			'jquery-ui': {
				deps: [ 'jquery' ]
			},
			'underscore': {
				exports: '_'
			}
		},

		urlArgs: [ 'diecache=', ( new Date() ).getTime() ].join( '' ),

		waitSeconds: 20
	} );

	require( [ 'jquery', 'app' ], function( $, Beethoven ) {
		'use strict';

		$( document ).ready( function() {
			Beethoven.start( {
				headerRegionSelector: '#app-header',
				contentRegionSelector: '#app-content'
			} );
		} );
	} );
} )( window.requirejs );
