/**
 * Cross-Browser SkipLinks
 * Ensure a11y skip links work on all browsers.
 *
 * Copyright (c) 2015 Flagship Software, LLC;
 * MIT license
 */
;(function( $, window, document, undefined ) {
	'use strict';

	var pluginName = 'compassSkipLinks';

	// The actual plugin constructor
	function Plugin() {
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend( Plugin.prototype, {
		init: function() {
			var $window   = $( window ),
				$element  = $( location.hash.substring( 1 ) ),
				userAgent = navigator.userAgent.toLowerCase(),
				isWebkit  = userAgent.indexOf( 'webkit' ) > -1,
				isOpera   = userAgent.indexOf( 'opera' )  > -1,
				isIe      = userAgent.indexOf( 'msie' )   > -1;

			// Bail if we're not on a browser that needs to be fixed.
			if ( ! isWebkit && ! isOpera && ! isIe ) {
				return;
			}

			$window.on( 'hashchange', this.focusElement( $element[0] ), false );
		},

		cleanup: function( element ) {
			element.removeAttr( 'tabindex' );
			element.off( 'blur', this.cleanup( element ), false );
		},

		focusElement: function( element ) {
			if ( ! element ) {
				return;
			}
			if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) || element.attr( 'tabindex' !== 'undefined' ) ) ) {
				element.tabIndex = -1;
				element.on( 'blur', this.cleanup( element ), false );
			}
			element.focus();
		}
	});

	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[ pluginName ] = function() {
		this.each( function() {
			if ( ! $.data( this, 'plugin_' + pluginName ) ) {
				$.data( this, 'plugin_' + pluginName, new Plugin( this ) );
			}
		});

		// chain jQuery functions
		return this;
	};
})( jQuery, window, document );
