<?php
/**
 * VisualBusiness: Block Patterns
 *
 * @since VisualBusiness 1.0
 */

/**
 * Registers pattern categories.
 *
 * @since VisualBusiness 1.0
 *
 * @return void
 */
function visualbusiness_register_pattern_category() {

	$patterns = array();

	$block_pattern_categories = array(
		'visualbusiness' => array( 'label' => __( 'VisualBusiness Theme', 'visualbusiness' ) )
	);

	$block_pattern_categories = apply_filters( 'visualbusiness_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'visualbusiness_register_pattern_category', 9 );
