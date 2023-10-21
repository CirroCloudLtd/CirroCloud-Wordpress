<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tronix
 */

get_header();
$Tronix_searchLayout = Tronix_options('Tronix_search_layout', 'right-sidebar');
$Tronix_search_banner = Tronix_options('Tronix_search_banner', true);
$Tronix_search_pagination = Tronix_options('Tronix_search_pagination', true);
$Tronix_breadcrumb_select_html = Tronix_options('Tronix_breadcrumb_select_html', 'h2');

?>
	<?php if($Tronix_search_banner == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr($Tronix_breadcrumb_select_html); ?> class="page-title">
					<?php 
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'tronix' ), '<span>' . get_search_query() . '</span>' );
					?>
				</<?php echo esc_attr($Tronix_breadcrumb_select_html); ?>>
				<?php if ( function_exists( 'bcn_display' ) ): ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<main id="primary" class="site-main content-area">
		<div class="container page-layout <?php echo esc_attr($Tronix_searchLayout); ?>">
			<?php
				if ( $Tronix_searchLayout == 'grid' ) {
					get_template_part( 'template-parts/post/post-grid' );
				} else {
					get_template_part( 'template-parts/post/post-sidebar' );
				}
			?>	
		</div>
	</main><!-- #main -->
<?php get_footer();
