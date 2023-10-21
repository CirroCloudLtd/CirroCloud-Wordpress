<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tronix
 * @since 1.0.0
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
		if ( have_comments() ) :
	?>
		<div class="comment-title-and-comment-list">
			<h2 class="comments-title">
				<?php 
					$Tronix_comment_count = get_comments_number();
					if ( '1' === $Tronix_comment_count ) {
						printf(
						/* translators: 1: title. */
							esc_html__( '1 Comment', 'tronix' ),
							'<span>' . get_the_title() . '</span>'
						);
					} else {
						printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s Comments', '%1$s Comments', $Tronix_comment_count, 'comments title', 'tronix' ) ),
							number_format_i18n( $Tronix_comment_count ),
							'<span>' . get_the_title() . '</span>'
						);
					}
				?>
			</h3>
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'      	=> 'ol',
						'short_ping' 	=> true,
						'avatar_size' 	=> 100,
						'format' 		=> 'html5',
						'reply_text'    => esc_html__( 'Reply', 'tronix' ),
					) );
				?>
			</ol><!-- .comment-list -->
		</div>

		<?php
			Tronix_comments_pagination();
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( !comments_open() ) :
				?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tronix' );?></p>
				<?php
			endif;

	endif; // Check for have_comments().

	comment_form();

	?>
</div><!-- #comments -->