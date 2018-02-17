/**
 * This file contains handlers to make Theme Customizer preview reload changes asynchronously using jQuery
 *
 * @package Alexis
 * @since 1.0
 */

(function( $ ) {
	"use strict";
	wp.customize( 'theme_color', function( value ) {
		value.bind( function( to ) {
			$( '.header' ).css( 'background-color', to ); 
			$( '.menu .menu-item a, .label.right' ).css( 'background-color', to );   
			$( 'a,.widget_categories li, .widget_archive li' ).css( 'color', to ); 
			$( '.header a' ).css({
				color: '#fff'
			});    				 
		});
	});

	wp.customize( 'menu_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.header a' ).css( 'color', to );     				 
		} );
	});	
})( jQuery );



 