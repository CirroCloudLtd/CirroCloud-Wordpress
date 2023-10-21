<?php
/**
 * @package   StartWeb
 */

require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/extras.php'; 
//require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/sections/section-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-testimonial.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/navigation.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-typography.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/typography_style.php';


if ( ! function_exists( 'cleverfox_startweb_frontpage_sections' ) ) :
	function cleverfox_startweb_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/startweb/sections/section-slider.php';
		//require CLEVERFOX_PLUGIN_DIR . 'inc/arowana/sections/section-flash.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/arowana/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/sections/section-testimonial.php';
    }
	add_action( 'startkit_sections', 'cleverfox_startweb_frontpage_sections' );
endif;

function cleverfox_startweb_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
	//wp_enqueue_style('owl-theme-default-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('owl-carousel-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.carousel.min.css');
	wp_enqueue_script( 'owl-carousel', CLEVERFOX_PLUGIN_URL . 'inc/startweb/js/owl.carousel.min.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'cleverfox_startweb_enqueue_scripts' );
