<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tronix
 */

get_header();

if(get_post_meta( get_the_ID(), 'Tronix_metabox', true)) {
    $Tronix_commonMeta = get_post_meta( get_the_ID(), 'Tronix_metabox', true );
} else {
    $Tronix_commonMeta = array();
}

if(array_key_exists('Tronix_meta_page_navbar', $Tronix_commonMeta)){
	$Tronix_meta_page_navbar = $Tronix_commonMeta['Tronix_meta_page_navbar'];
}else{
	$Tronix_meta_page_navbar = '';
}

if(array_key_exists('Tronix_layout_meta', $Tronix_commonMeta)){
    $Tronix_pageLayout = $Tronix_commonMeta['Tronix_layout_meta'];
}else{
    $Tronix_pageLayout = 'full-width';
}

if(array_key_exists('Tronix_sidebar_meta', $Tronix_commonMeta)){
    $Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
}else{
    $Tronix_selectedSidebar = 'sidebar';
}

if($Tronix_pageLayout == 'left-sidebar' && is_active_sidebar($Tronix_selectedSidebar) || $Tronix_pageLayout == 'right-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
    $Tronix_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $Tronix_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if(array_key_exists('Tronix_meta_enable_banner', $Tronix_commonMeta)){
    $Tronix_postBanner = $Tronix_commonMeta['Tronix_meta_enable_banner'];
}else{
    $Tronix_postBanner = true;
}

$Tronix_enable_page_cmt = Tronix_options('Tronix_enable_page_cmt', true );
$Tronix_breadcrumb_select_html = Tronix_options('Tronix_breadcrumb_select_html', 'h2');
?>
	<?php if($Tronix_postBanner == true ) : ?>
		<div class="breadcroumb-area">
			<div class="container">
				<div class="breadcroumn-contnt">
					
					<<?php echo esc_attr($Tronix_breadcrumb_select_html); ?> class="page-title">
						<?php the_title(); ?> 
					</<?php echo esc_attr($Tronix_breadcrumb_select_html); ?>>

					<?php if(function_exists('bcn_display')) : ?>
						<div class="bre-sub"><?php bcn_display(); ?></div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	<?php endif; ?>

	<main id="primary" class="site-main content-area">
		<div class="container <?php echo esc_attr($Tronix_pageLayout); ?>">
			<div class="page-layout">
				<div class="row">

					<?php
						if($Tronix_pageLayout == 'left-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
							get_sidebar();
						}
					?>

					<div class="<?php echo esc_attr($Tronix_pageColumnClass); ?>">
						<div class="all-posts-wrapper">

						<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'page' );
							endwhile; // End of the loop.

							if( $Tronix_enable_page_cmt == true) :
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endif;
						?>
						</div>
					</div>

					<?php
					if($Tronix_pageLayout == 'right-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
						get_sidebar();
					}?>

				</div>
			
			</div>
		</div>
	</main><!-- #main -->
<?php get_footer();
