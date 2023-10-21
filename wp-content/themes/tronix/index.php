<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tronix
 */

get_header();
$Tronix_blogc_title = Tronix_options( 'Tronix_blog_title' );
$Tronix_blog_home_stitle = Tronix_options( 'Tronix_blog_home_stitle', '' );
$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );
$Tronix_banner_enable = Tronix_options( 'Tronix_blog_banner_enable', true );
$Tronix_blog_layout = Tronix_options( 'Tronix_blog_layout', 'right-sidebar' );
?>
<?php if ( $Tronix_banner_enable == true ): ?>
<div class="breadcroumb-area">
	<div class="container">
		<div class="breadcroumn-contnt">

			<<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?> class="page-title">
				<?php echo esc_html( $Tronix_blogc_title ); ?>
			</<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?>>

			<?php if( function_exists('bcn_display') ) : ?>
				<div class="bre-sub"><?php bcn_display(); ?></div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php endif;?>
<main id="primary" class="site-main content-area page-layout-<?php echo esc_attr( $Tronix_blog_layout ); ?>">
	<div class="container">
		<?php
			if ( $Tronix_blog_layout == 'grid' ) {
				get_template_part( 'template-parts/post/post-grid' );
			} else {
				get_template_part( 'template-parts/post/post-sidebar' );
			}?>
	</div>
</main>
<?php
get_footer();
