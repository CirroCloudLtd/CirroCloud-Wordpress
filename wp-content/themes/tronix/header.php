<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tronix
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<?php 
    if ( is_page() || is_singular( 'post' ) || is_singular('tronix_portfolio') || is_singular('tronix_team') && get_post_meta( $post->ID, 'Tronix_metabox', true ) ) {
		$TronixMeta = get_post_meta( $post->ID, 'Tronix_metabox', true );
	} else {
		$TronixMeta = array();
	}

	if ( is_array( $TronixMeta ) && array_key_exists( 'header_style_meta', $TronixMeta ) && $TronixMeta['header_style_meta'] != '' && $TronixMeta['header_style_meta'] != 'default' ) {
		$header_query = new WP_Query( [
			'post_type'      => 'tronix_header',
			'posts_per_page' => -1,
			'p'              => $TronixMeta['header_style_meta'],
		] );

	} elseif(!empty( Tronix_options('site_default_header'))){
		$header_query = new WP_Query( [
			'post_type'      => 'tronix_header',
			'posts_per_page' => -1,
			'p'              => Tronix_options('site_default_header'),
		] );
	}else{
		$header_query = '';
	}
    $Tronix_enable_preloader = Tronix_options('Tronix_enable_preloader', true);

	wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <?php if( $Tronix_enable_preloader == true ) { ?>
    <div class="preloader-area">
        <div class="theme-loader"></div>
    </div>
    <?php } ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tronix' ); ?></a>

		<?php if(!empty($header_query) && $header_query->have_posts()): ?>
	        <?php
	        while ( $header_query->have_posts() ) : $header_query->the_post();
		        the_content();
	        endwhile;
	        wp_reset_postdata();
	        ?>
	    <?php else: ?>
	        <?php get_template_part( 'inc/header/default-header-style' ); ?>
        <?php endif; ?>
