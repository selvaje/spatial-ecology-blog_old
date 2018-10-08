/**
 * License:            GNU General Public License v3.0
 * License URI:        http://www.gnu.org/licenses/gpl-3.0.html
 * 
 */

jQuery(document).ready(function($) {
	// smooth scroll to top
	$('.top').click(function(){
		$('html, body').animate({scrollTop: 0}, 400);
		return false;
	});

	// toggle menu on mobile				
	$('.hamburger').on('click', function(){
       	$('i', this).toggleClass('fa-times fa-bars');
		$('.menu-list').slideToggle(400);
	});
	$('.menu-item').has('ul').prepend('<span class="menu-click"><i class="fa fa-chevron-down"></i></span>');

	// toggle sub-menu		
	$('.menu-list').on('click', '.menu-click', function(){
		$(this).siblings('.sub-menu').slideToggle(400);
		$(this).children('.fa').toggleClass('rotate');			
	});	
});


	