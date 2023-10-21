<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function visualbusiness_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'visualbusiness-border',
				'label' => esc_html__( 'Borders', 'visualbusiness' ),
			)
		);
	}
	add_action( 'init', 'visualbusiness_register_block_styles' );
}
