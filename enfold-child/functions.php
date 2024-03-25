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
}

add_action('wp_enqueue_scripts', 'pizzaro_child_scripts', 100);

add_action('wp_footer', 'add_custom_css');
function add_custom_css() {
	global $current_user;
	?>
	<script>
		jQuery(document).ready(function($) {

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