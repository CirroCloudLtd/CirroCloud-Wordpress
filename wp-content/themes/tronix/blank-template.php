<?php
/**
 *Template Name: Blank Template
 */

get_header();

if ( get_post_meta( get_the_ID(), 'Tronix_metabox', true ) ) {
    $Tronix_commonMeta = get_post_meta( get_the_ID(), 'Tronix_metabox', true );
} else {
    $Tronix_commonMeta = array();
}

if ( array_key_exists( 'Tronix_meta_enable_banner', $Tronix_commonMeta ) ) {
    $Tronix_postBanner = $Tronix_commonMeta['Tronix_meta_enable_banner'];
} else {
    $Tronix_postBanner = true;
}

if ( array_key_exists( 'Tronix_meta_custom_title', $Tronix_commonMeta ) ) {
    $Tronix_customTitle = $Tronix_commonMeta['Tronix_meta_custom_title'];
} else {
    $Tronix_customTitle = '';
}

$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );

?>
<?php if ( $Tronix_postBanner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">

				<<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?> class="page-title">
					<?php
						if ( !empty( $Tronix_customTitle ) ) {
							echo esc_html( $Tronix_customTitle );
						} else {
							the_title();
						}
					?>
				</<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?>>

				<?php if ( function_exists( 'bcn_display' ) ) : ?>
					<div class="bre-sub">
						<?php bcn_display(); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif;?>

	<main id="primary" class="site-main content-area">
		<?php the_content();?>
	</main><!-- #main -->

<?php get_footer();
