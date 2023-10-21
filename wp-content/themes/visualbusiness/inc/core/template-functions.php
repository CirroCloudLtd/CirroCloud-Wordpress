<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package VisualBusiness
 */

/**
 * Add customizer default values.
 *
 * @param array $default_options
 * @return array
 */
function visualbusiness_customizer_add_defaults( $default_options) {
	$defaults = array(
		// Excerpt Options
		'visualbusiness_excerpt_length'    => 50,
	);


	$updated_defaults = wp_parse_args( $defaults, $default_options );

	return $updated_defaults;
}
add_filter( 'visualbusiness_customizer_defaults', 'visualbusiness_customizer_add_defaults' );

/**
 * Returns theme mod value saved for option merging with default option if available.
 * @since 1.0
 */
function visualbusiness_gtm( $option ) {
	// Get our Customizer defaults
	$defaults = apply_filters( 'visualbusiness_customizer_defaults', true );

	return isset( $defaults[ $option ] ) ? get_theme_mod( $option, $defaults[ $option ] ) : get_theme_mod( $option );
}

if ( ! function_exists( 'visualbusiness_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 */
	function visualbusiness_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Theme Options
		$length	= visualbusiness_gtm( 'visualbusiness_excerpt_length' );

		return absint( $length );
	} // visualbusiness_excerpt_length.
endif;
add_filter( 'excerpt_length', 'visualbusiness_excerpt_length', 999 );

/*
 * Remove parentheses from categories widget
 */
function visualbusiness_categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post-count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','visualbusiness_categories_postcount_filter');

/*
 * Admin Notice
 */
function visualbusiness_notice() {

    $theme = wp_get_theme();

    echo '<div class="notice notice-success is-dismissible"><p>'. esc_html('Thank you for installing the VisualBusiness theme!','visualbusiness') . '</p><p><a class="button-secondary" href="' . esc_url( $theme->get( 'ThemeURI' ) ) . '" target="_blank">' . esc_html( 'Theme Demo', 'visualbusiness' ) . '</a> '. '&nbsp;' . ' <a class="button-primary" href="' . esc_url( $theme->get( 'AuthorURI' ) . '/themes/visualbusiness-pro' ) . '" target="_blank">' . esc_html( 'Upgrade to PRO theme', 'visualbusiness' ) . '</a></p></div>';

}

add_action('admin_notices', 'visualbusiness_notice');
