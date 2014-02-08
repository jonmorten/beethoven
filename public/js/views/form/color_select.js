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
				'<div class="input-group">',
					'<span ',
						'class="input-group-addon" ',
						'data-hook-color-select-preview ',
					'>&nbsp;</span>',
					'<select class="form-control"></select>',
				'</div>'
			].join( '' )
		),
		itemView: OptionView,
		itemViewContainer: 'select',
		onRender: function () {
			var $preview = this.$el.find( '[data-hook-color-select-preview]' );
			var $select = this.$el.find( 'select' );
			var $options = $select.find( 'option' );
			var color_class;
			var color_class_base = 'color-select-preview';
			var setColorPreview = function ( event ) {
				if ( typeof event !== 'undefined' && !!color_class ) {
					$preview.removeClass( color_class );
				}
				color_class = color_class_base + '-' + $options.filter( ':selected:first' ).val();
				$preview.addClass( color_class );
			};
			$preview.addClass( color_class_base );
			$select.on( 'change.color-select', setColorPreview );
			setColorPreview();
		},
		initialize: function ( options ) {
			this.$el = options.$el;
			this.render();
		}
	} );


	return SelectView;


} );
