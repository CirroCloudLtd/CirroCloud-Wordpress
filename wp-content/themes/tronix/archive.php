<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tronix
 */

get_header();

$Tronix_archiveLayout = Tronix_options( 'Tronix_archive_layout', 'right-sidebar' );
$Tronix_archive_banner = Tronix_options( 'Tronix_archive_banner', true );
$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );
$Tronix_archive_pagination = Tronix_options( 'Tronix_archive_pagination', true );
?>
	<?php if($Tronix_archive_banner == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<?php the_archive_title( '<'.esc_attr($Tronix_breadcrumb_select_html).' class="archive-title page-title">', '</'.esc_attr($Tronix_breadcrumb_select_html).'>' ); ?>
				<div class="bre-sub">
				<?php if(function_exists('bcn_display')){
					bcn_display();
				}?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<main id="primary" class="site-main content-area">
		<div class="container page-layout <?php echo esc_attr($Tronix_archiveLayout); ?>">
			<?php
				if ( $Tronix_archiveLayout == 'grid' ) {
					get_template_part( 'template-parts/post/post-grid' );
				} else {
					get_template_part( 'template-parts/post/post-sidebar' );
				}
			?>
		</div>
	</main><!-- #main -->
<?php get_footer();
