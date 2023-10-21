<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Tronix
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */

function Tronix_woocommerce_setup() {
    add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'Tronix_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */

function Tronix_woocommerce_scripts() {
    wp_enqueue_style( 'tronix-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

    wp_add_inline_style( 'tronix-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'Tronix_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );*/

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function Tronix_woocommerce_active_body_class( $classes ) {
    $classes[] = 'woocommerce-active';

    return $classes;
}
add_filter( 'body_class', 'Tronix_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function Tronix_woocommerce_products_per_page() {
    return Tronix_options( 'Tronix_shop_item', 8 );
}
add_filter( 'loop_shop_per_page', 'Tronix_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function Tronix_woocommerce_thumbnail_columns() {
    return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'Tronix_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */

function Tronix_woocommerce_loop_columns() {
    $Tronix_shop_layout = Tronix_options( 'Tronix_shop_layout', 'right-sidebar' );
    if ( $Tronix_shop_layout == 'left-sidebar' || $Tronix_shop_layout == 'right-sidebar' ) {
        $retrun = '3';
    } else {
        $retrun = '4';
    }
    return $retrun;
}
add_filter( 'loop_shop_columns', 'Tronix_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function Tronix_woocommerce_related_products_args( $args ) {
    $Tronix_singel_shop_layout = Tronix_options( 'Tronix_single_shop_layout', 'right-sidebar' );
    if ( $Tronix_singel_shop_layout == 'left-sidebar' || $Tronix_singel_shop_layout == 'right-sidebar' ) {
        $Tronix_woorelated_item = 3;
    } else {
        $Tronix_woorelated_item = 4;
    }
    $defaults = array(
        'posts_per_page' => $Tronix_woorelated_item,
        'columns'        => $Tronix_woorelated_item,
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'Tronix_woocommerce_related_products_args' );

if ( !function_exists( 'Tronix_woocommerce_product_columns_wrapper' ) ) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function Tronix_woocommerce_product_columns_wrapper() {
        $columns = Tronix_woocommerce_loop_columns();
        ?>
		<div class="tronix-woo-shop-topbar">
			<div class="row">
                
				<div class="col-lg-8 col-md-8 switcher-and-result">
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div id="tronix-shop-view-mode">
								<ul class="tronix-ul-style tronix-list-inline">
									<li class="tronix-shop-grid"><i class="fas fa-th-large"></i></li>
									<li class="tronix-shop-list"><i class="fas fa-list-ul"></i></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<div class="tronix-woo-result-count-wrapper">
								<?php woocommerce_result_count();?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4">
					<div class="tronix-woo-sort-list">
						<?php woocommerce_catalog_ordering();?>
					</div>
				</div>
			</div>
		</div>
		<?php
echo '<div class="columns-' . absint( $columns ) . '">';
    }
}
add_action( 'woocommerce_before_shop_loop', 'Tronix_woocommerce_product_columns_wrapper', 40 );

if ( !function_exists( 'Tronix_woocommerce_product_columns_wrapper_close' ) ) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function Tronix_woocommerce_product_columns_wrapper_close() {
        echo '</div>';
    }
}
add_action( 'woocommerce_after_shop_loop', 'Tronix_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( !function_exists( 'Tronix_woocommerce_wrapper_before' ) ) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function Tronix_woocommerce_wrapper_before() {
        ?>
		<main id="primary" class="site-main content-area">
			<div class="tronix-woocommerce-page container">
			<?php
}
}
add_action( 'woocommerce_before_main_content', 'Tronix_woocommerce_wrapper_before' );

if ( !function_exists( 'Tronix_woocommerce_wrapper_after' ) ) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function Tronix_woocommerce_wrapper_after() {
        ?>
			</div><!-- #primary -->
		</main><!-- #primary -->
		<?php
    }
}
add_action( 'woocommerce_after_main_content', 'Tronix_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
<?php
    if ( function_exists( 'Tronix_woocommerce_header_cart' ) ) {
        Tronix_woocommerce_header_cart();
    }
?>
 */

if ( !function_exists( 'Tronix_woocommerce_cart_link_fragment' ) ) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function Tronix_woocommerce_cart_link_fragment( $fragments ) {
        ob_start();
        Tronix_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'Tronix_woocommerce_cart_link_fragment' );

if ( !function_exists( 'Tronix_woocommerce_cart_link' ) ) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function Tronix_woocommerce_cart_link() {
        ?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'tronix' );?>">
			<span class="fas fa-shopping-cart"></span>
			<?php
                $item_count_text = sprintf(
                /* translators: number of items in the mini cart. */
                is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''
            );
            ?>
			<span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
    }
}

if ( !function_exists( 'Tronix_woocommerce_header_cart' ) ) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function Tronix_woocommerce_header_cart() {
        if ( is_cart() ) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
		<ul id="site-header-cart" class="tronix-hmini">
			<?php Tronix_woocommerce_cart_link();?>
			<li class="tronix-mini-cart-items">
				<?php
                    $instance = array(
                        'title' => '',
                    );
                    the_widget( 'WC_Widget_Cart', $instance );
                ?>
			</li>
		</ul>
		<?php
    }
}
// Remove woocommerce defaults breadcrumb
add_action( 'init', 'Tronix_remove_wc_breadcrumbs' );
function Tronix_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action( 'init', 'remove_ordering_result_count' );
function remove_ordering_result_count() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
}