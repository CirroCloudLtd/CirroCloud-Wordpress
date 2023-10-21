<?php 
/**
 * Enqueue scripts and styles.
 */
function Tronix_scripts() {
	global $wp_query;
	wp_enqueue_style('bootstrap', get_theme_file_uri('assets/bootstrap/bootstrap-min.css'), array(),  TRONIX_VERSION, 'all');
	if ( is_rtl() ) {
		wp_enqueue_style('bootstrap-rtl', get_theme_file_uri('assets/bootstrap/bootstrap-rtl-min.css'), array(),  TRONIX_VERSION, 'all');
	}
	wp_enqueue_style('bootstrap-icons', get_theme_file_uri('assets/bootstrap/bootstrap-icons.css'), array(),  TRONIX_VERSION, 'all');
	wp_enqueue_style('magnific-popup', get_theme_file_uri('assets/popup/magnific-popup.css'), array(), TRONIX_VERSION , 'all');
	wp_enqueue_style('slick', get_theme_file_uri('assets/slick/slick.css'), array(), TRONIX_VERSION , 'all');
	wp_enqueue_style('fontawesome-all', get_theme_file_uri('assets/css/fontawesome-all.css'), array(),  TRONIX_VERSION , 'all');
    wp_enqueue_style('animation', get_theme_file_uri('assets/css/animation.css'), array(),  TRONIX_VERSION , 'all'); 
	wp_enqueue_style('tronix-typography', get_theme_file_uri('assets/css/typography.css'), array(), TRONIX_VERSION , 'all');
	wp_enqueue_style('tronix-theme', get_theme_file_uri('assets/css/theme.css'), array(), TRONIX_VERSION , 'all');
	wp_enqueue_style('tronix-style', get_stylesheet_uri(), array(), TRONIX_VERSION, 'all');
	wp_style_add_data( 'tronix-style', 'rtl', 'replace' );
	if( !class_exists( 'CSF' ) ) {
		wp_enqueue_style( 'tronix-default-fonts', '//fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap', '', '1.0.0', 'screen' );
	}

	//Enqueue scripts.
	wp_enqueue_script('popper', get_theme_file_uri('assets/bootstrap/popper-min.js'), array(),  TRONIX_VERSION, true);
	wp_enqueue_script('bootstrap', get_theme_file_uri('assets/bootstrap/bootstrap-min.js'), array(), TRONIX_VERSION, true);
	wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('assets/popup/jquery-magnific-popup-min.js'), array('jquery'), TRONIX_VERSION , true);
	wp_enqueue_script('slick-min', get_theme_file_uri('assets/slick/slick-min.js'), array(), TRONIX_VERSION , true);
	wp_enqueue_script('tronix-theme', get_theme_file_uri('assets/js/theme.js'), array('jquery'), TRONIX_VERSION , true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'Tronix_scripts' );
?>