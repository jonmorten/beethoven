define( [
	'backbone.marionette',
	'jquery',
	'jquery.chosen'
], function ( Marionette, $ ) {


	var OptionView = Marionette.ItemView.extend( {
		template: _.template( '<option value="<%= id %>"><%= name %></option>' ),
		render: function () {
			this.setElement( this.template( this.model.attributes ) );
		}
	} );


	var SelectView = Marionette.CompositeView.extend( {
		template: _.template(
			[
				'<select ',
					'multiple ',
					'style="width: 100%;" ',
					'class="form-control" ',
					'data-hook-chosen ',
					'data-placeholder="<%= placeholder %>"',
				'></select>'
			].join( '' )
		),
		itemView: OptionView,
		itemViewContainer: 'select',
		onRender: function () {
			this.$el.find( '[data-hook-chosen]' ).chosen( {
				inherit_select_classes: true
			} );
		},
		initialize: function ( options ) {
			var placeholder = options.placeholder || 'Start typing ...';
			if ( typeof this.model !== 'undefined' ) {
				this.model.set( 'placeholder', placeholder );
			} else {
				this.model = new Backbone.Model( { placeholder: placeholder } );
			}

			this.$el = options.$el;
			this.render();
		}
	} );


	return SelectView;


} );
