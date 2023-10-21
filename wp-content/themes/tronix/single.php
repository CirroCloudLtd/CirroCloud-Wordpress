<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tronix
 */

get_header();
if ( get_post_meta( get_the_ID(), 'Tronix_metabox', true ) ) {
	$Tronix_commonMeta = get_post_meta( get_the_ID(), 'Tronix_metabox', true );
} else {
	$Tronix_commonMeta = array();
}

if ( is_array($Tronix_commonMeta) &&  array_key_exists( 'Tronix_layout_meta', $Tronix_commonMeta ) && $Tronix_commonMeta['Tronix_layout_meta'] != 'default' ) {
	$Tronix_postLayout = $Tronix_commonMeta['Tronix_layout_meta'];
} else {
	$Tronix_postLayout = Tronix_options( 'single_post_default_layout', 'right-sidebar' );
}

if ( is_array($Tronix_commonMeta) &&  array_key_exists( 'Tronix_sidebar_meta', $Tronix_commonMeta ) && $Tronix_commonMeta['Tronix_sidebar_meta'] != '0' ) {
	$Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
} else {
	$Tronix_selectedSidebar = 'sidebar';
}

if ( $Tronix_postLayout == 'left-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) || $Tronix_postLayout == 'right-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
	$Tronix_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
	$Tronix_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( array_key_exists( 'Tronix_meta_enable_banner', $Tronix_commonMeta ) ) {
	$Tronix_postBanner = $Tronix_commonMeta['Tronix_meta_enable_banner'];
} else {
	$Tronix_postBanner = true;
}

$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );
?>
	<?php if ( $Tronix_postBanner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?> class="page-title">
				 	<?php the_title(); ?>
				</<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?>>
				<?php if ( function_exists( 'bcn_display' ) ): ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>


    <div id="primary" class="content-area layout-<?php echo esc_attr( $Tronix_postLayout ); ?>">

        <div class="container post-details-wrapper">
            <div class="row">
				<?php
					if ( $Tronix_postLayout == 'left-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
						get_sidebar();
					}
				?>

                <div class="<?php echo esc_attr( $Tronix_pageColumnClass ); ?>">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
                </div>

				<?php
					if ( $Tronix_postLayout == 'right-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
						get_sidebar();
					} 
				?>
            </div>
        </div>
    </div><!-- #primary -->
<?php
get_footer();
