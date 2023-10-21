<?php
/**
 * The template for displaying all portfolio single posts
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

$Tronix_project_related = Tronix_options( 'Tronix_project_related', true );
$Tronix_project_related_title = Tronix_options( 'Tronix_project_related_title' );
$Tronix_project_banner_enable = Tronix_options( 'Tronix_project_banner_enable' );
$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );
if ( array_key_exists( 'Tronix_layout_meta', $Tronix_commonMeta ) && !empty( $Tronix_commonMeta['Tronix_layout_meta'] ) ) {
    $Tronix_portfolio_Layout = $Tronix_commonMeta['Tronix_layout_meta'];
} else {
    $Tronix_portfolio_Layout = 'full-width';
}
if ( is_array( $Tronix_commonMeta ) && array_key_exists( 'Tronix_sidebar_meta', $Tronix_commonMeta ) ) {
    $Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
} else {
    $Tronix_selectedSidebar = 'sidebar';
}

if ( $Tronix_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) || $Tronix_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
    $Tronix_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
    $Tronix_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( $Tronix_project_banner_enable == false ) {
    $Tronix_portfolio_post_Banner = false;
} elseif ( array_key_exists( 'Tronix_meta_enable_banner', $Tronix_commonMeta ) ) {
    $Tronix_portfolio_post_Banner = $Tronix_commonMeta['Tronix_meta_enable_banner'];
} else {
    $Tronix_portfolio_post_Banner = true;
}

?>
	<?php if ( $Tronix_portfolio_post_Banner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				
                <<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?> class="page-title"> 
                    <?php the_title();?> 
                </<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?>>

                <?php if ( function_exists( 'bcn_display' ) ) : ?>
                    <div class="bre-sub"><?php bcn_display(); ?></div>
                <?php endif; ?>
            </div>
		</div>
	</div>
	<?php endif;?>
	<main id="primary" class="site-main content-area tp-portfolio-wrapper">
		<div class="container">
			<div class="page-layout <?php echo esc_attr( $Tronix_portfolio_Layout ); ?>">
				<div class="row">
					<?php
						if ( $Tronix_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
							get_sidebar();
						}
						?>
					<div class="<?php echo esc_attr( $Tronix_portfolioColumnClass ); ?>">
						<div class="all-posts-wrapper">
                            <?php
                                while ( have_posts() ):
                                    the_post();
                                    the_content();
                                endwhile; // End of the loop.
							?>

						</div>
					</div>
					<?php
						if ( $Tronix_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $Tronix_selectedSidebar ) ) {
							get_sidebar();
						}?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();