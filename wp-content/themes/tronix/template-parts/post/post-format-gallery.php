<?php
if ( get_post_meta( get_the_ID(), 'Tronix_postmeta_gallery', true ) ) {
	$gallery_meta = get_post_meta( get_the_ID(), 'Tronix_postmeta_gallery', true );
} else {
	$gallery_meta = array();
}
if ( array_key_exists( 'Tronix_post_gallery', $gallery_meta ) ) {
	$gallery_image = explode( ',', $gallery_meta['Tronix_post_gallery'] );
} else {
	$gallery_image = '';
}


?>

<?php if ( is_array($gallery_image) && $gallery_image[0] !== '' ) : ?>
    <div class="post-thumbnail-wrapper">
        <div <?php if(is_rtl()){echo 'dir="ltr"';} ?> class="post-gallery-slider post-gallerys">
	        <?php foreach ( $gallery_image as $image_id ) : ?>
                <img src="<?php echo wp_get_attachment_url( $image_id ); ?>"
                     alt="<?php echo get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>">
	        <?php endforeach; ?>
        </div>

    </div>

<?php else : ?>

	<?php if ( has_post_thumbnail() ) : ?>

        <div class="post-thumbnail-wrapper">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'tronix-large' ) ?>"
                 alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
        </div>

	<?php endif; ?>
<?php endif; ?>