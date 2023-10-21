<?php

if ( get_post_meta( $post->ID, 'Tronix_postmeta_audio', true ) ) {
	$audio_meta = get_post_meta( $post->ID, 'Tronix_postmeta_audio', true );
} else {
	$audio_meta = array();
}

if ( array_key_exists( 'Tronix_post_audio', $audio_meta ) && !empty($audio_meta['Tronix_post_audio'])) {
	$embade_code = $audio_meta['Tronix_post_audio'];
} else {
	$embade_code = '';
}

?>


<?php if( $embade_code ) : ?>
    <div class="post-thumbnail-wrapper">
        <div class="audio-iframe-wrapper">
            <?php echo tronix_iframe_embed( $embade_code, '' ); ?>
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