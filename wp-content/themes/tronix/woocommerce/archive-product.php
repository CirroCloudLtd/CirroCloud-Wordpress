<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 */
defined( 'ABSPATH' ) || exit;
$Tronix_banner_enable    = Tronix_options( 'Tronix_shop_banner_enable', true );
$Tronix_shop_layout      = Tronix_options( 'Tronix_shop_layout', 'right-sidebar' );
$Tronix_breadcrumb_select_html = Tronix_options('Tronix_breadcrumb_select_html', 'h2');
if($Tronix_shop_layout == 'left-sidebar' || $Tronix_shop_layout == 'right-sidebar'){
    $Tronix_shopColumn = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $Tronix_shopColumn = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}
get_header( 'shop' );
if($Tronix_banner_enable == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr($Tronix_breadcrumb_select_html); ?> class="page-title"> <?php woocommerce_page_title(); ?> </<?php echo esc_attr($Tronix_breadcrumb_select_html); ?> class="brea-title">
				<div class="bre-sub">
				<?php if(function_exists('bcn_display')){
					bcn_display();
				}?>
				</div>
			</div>
		</div>
	</div>
<?php endif;

do_action( 'woocommerce_before_main_content' );
?>
	<div class="page-layout woo-layout <?php echo esc_attr($Tronix_shop_layout); ?>">
		<div class="row">
			<?php
			if($Tronix_shop_layout == 'left-sidebar' && is_active_sidebar('tronix-shop')){
			?>
			<div id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area woo-widget-area">
			<?php dynamic_sidebar('tronix-shop'); ?>
			</div>
			<?php 
			}
			?>
			<div class="<?php echo esc_attr($Tronix_shopColumn); ?>">
				<div class="all-posts-wrapper woo-all-post">
				<?php
					if ( woocommerce_product_loop() ) {
						do_action( 'woocommerce_before_shop_loop' );
						woocommerce_product_loop_start();
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();
								do_action( 'woocommerce_shop_loop' );
						
								wc_get_template_part( 'content', 'product' );
							}
						}
						woocommerce_product_loop_end();
						do_action( 'woocommerce_after_shop_loop' );
						} else {
						do_action( 'woocommerce_no_products_found' );
						}
					?>
				</div>
			</div>
			<?php
			if($Tronix_shop_layout == 'right-sidebar' && is_active_sidebar('tronix-shop')){
			?>
			<div id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area woo-widget-area">
			<?php dynamic_sidebar('tronix-shop'); ?>
			</div>
			<?php 
			}?>
		</div>
	</div>
<?php 
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );