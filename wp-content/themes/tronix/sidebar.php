<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tronix
 */
if(is_page() || is_singular('post') || is_singular('Tronix_portfolio') || is_singular('Tronix_team') && get_post_meta($post->ID, 'Tronix_metabox', true)) {
    $Tronix_commonMeta = get_post_meta($post->ID, 'Tronix_metabox', true);
} else {
    $Tronix_commonMeta = array();
}


if(is_array($Tronix_commonMeta) && array_key_exists('Tronix_sidebar_meta', $Tronix_commonMeta)){
    $Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
}else{
    $Tronix_selectedSidebar = 'sidebar';
}

if (is_array($Tronix_commonMeta) && array_key_exists( 'Tronix_sidebar_meta', $Tronix_commonMeta ) && $Tronix_commonMeta['Tronix_sidebar_meta'] != '0' ) {
	$Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
} else {
	$Tronix_selectedSidebar = 'sidebar';
}


?>
<aside id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-12 sidebar-widget-area">
    <div class="sidebar-sticky-area">
        <?php
            if( is_active_sidebar( $Tronix_selectedSidebar ) ) {
                dynamic_sidebar( $Tronix_selectedSidebar );
            }
        ?>
    </div>
</aside>
