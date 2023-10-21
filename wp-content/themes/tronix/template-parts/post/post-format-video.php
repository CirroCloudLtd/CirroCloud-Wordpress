<?php
if ( get_post_meta( $post->ID, 'Tronix_postmeta_video', true ) ) {
	$video_meta = get_post_meta( $post->ID, 'Tronix_postmeta_video', true );
} else {
	$video_meta = array();
}

if ( array_key_exists( 'Tronix_post_video', $video_meta ) && ! empty( $video_meta['Tronix_post_video'] ) ) {
	$video_url = $video_meta['Tronix_post_video'];
} else {
	$video_url = '';
}
?>

<?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumbnail-wrapper">
        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'tronix-large' ) ?>"
             alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">

		<?php if ( $video_url ): ?>
            <div class="post-video-button-wrapper">
                <a href="<?php echo esc_url( $video_url ); ?>" class="post-video video-popup">
                    <i class="fas fa-play"></i>
                </a>
            </div>
		<?php endif; ?>

    </div>
<?php endif; ?>