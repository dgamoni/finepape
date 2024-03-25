<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

/* remove before trail breadcrumbs */
add_filter('avia_breadcrumbs_args', 'mmx_change_home_breadcrumb', 50, 1);
function mmx_change_home_breadcrumb($args){
    $args['before'] = '';
    return $args;
}


function pizzaro_child_scripts()
{
    wp_enqueue_style('flexslider_css', get_stylesheet_directory_uri() . '/js/flexslider.css');
    wp_enqueue_script('flexslider_js', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array(), true, true);
	wp_enqueue_style('selectric_css', get_stylesheet_directory_uri() . '/js/selectric.css');
    wp_enqueue_script('selectric_js', get_stylesheet_directory_uri() . '/js/jquery.selectric.js', array(), true, true);

    wp_enqueue_script('pizzaro_imagesloaded_js', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true, true);
    wp_enqueue_script('pizzaro_masonry_js', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array(), true, true);
}

add_action('wp_enqueue_scripts', 'pizzaro_child_scripts', 100);

add_action('wp_footer', 'add_custom_css');
function add_custom_css() {
	global $current_user;
	?>
	<script>
		$(document).ajaxComplete(function() {
		 	$('.searchandfilter select').selectric();
		});

		jQuery(document).ready(function($) {
			$('.searchandfilter select').selectric();
			var fb_newhref = '<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-logo-button.svg';
			$('.ssba_facebook_share img').attr('src', fb_newhref);
			var in_newhref = '<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin-logo-button.svg';
			$('.ssba_linkedin_share img').attr('src', in_newhref);
		
			
		});
		
		$(window).load(function() {
		  $('.flexslider').flexslider({
		    animation: "slide"
		  });
		});
	</script>
	<style>

	</style>
	<?php
}
// Remover bandeiras wpml top bar
function avia_remove_main_menu_flags(){
        remove_filter( 'wp_nav_menu_items', 'avia_append_lang_flags', 9998, 2 );
        remove_filter( 'avf_fallback_menu_items', 'avia_append_lang_flags', 9998, 2 );
        remove_action( 'avia_meta_header', 'avia_wpml_language_switch', 10);
}
add_action('after_setup_theme','avia_remove_main_menu_flags');


