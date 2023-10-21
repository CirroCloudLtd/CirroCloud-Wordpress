<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tronix
 */


if ( is_page() || is_singular( 'post' ) || is_singular('tronix_portfolio') || is_singular('tronix_team') && get_post_meta( $post->ID, 'Tronix_metabox', true ) ) {
	$TronixMeta = get_post_meta( $post->ID, 'Tronix_metabox', true );
} else {
	$TronixMeta = array();
}

if ( is_array( $TronixMeta ) && array_key_exists( 'footer_style_meta', $TronixMeta ) && $TronixMeta['footer_style_meta'] != '' && $TronixMeta['footer_style_meta'] != 'default' ) {
	$footer_query = new WP_Query( [
		'post_type'      => 'tronix_footer',
		'posts_per_page' => -1,
		'p'              => $TronixMeta['footer_style_meta'],
	] );

} elseif(!empty(Tronix_options('site_default_footer'))){
	$footer_query = new WP_Query( [
		'post_type'      => 'tronix_footer',
		'posts_per_page' => -1,
		'p'              => Tronix_options('site_default_footer'),
	] );
}else{
	$footer_query = '';
}

$Tronix_enable_top_to_bottom = Tronix_options( 'Tronix_enable_top_to_bottom', true );
$Tronix_enable_ttb_icon = Tronix_options( 'Tronix_enable_ttb_icon', 'fa fa-angle-up' );
?>

    <footer class="site-footer">
        <?php if(!empty($footer_query) && $footer_query->have_posts()) : ?>
            <?php
            while ( $footer_query->have_posts() ) : $footer_query->the_post();
                the_content();
            endwhile;
            wp_reset_postdata();
            ?>
        <?php else: ?>

            <?php get_template_part( 'inc/footer/default-footer-style'); ?>

        <?php endif; ?>
    </footer><!-- #colophon -->
    <?php if ( $Tronix_enable_top_to_bottom == true ) : ?>
        <div class="to-top" id="back-top">
            <i class="<?php echo esc_attr( $Tronix_enable_ttb_icon ); ?>"></i>
        </div>
    <?php endif;?>
</div><!-- #page -->
<?php wp_footer();?>

</body>
</html>