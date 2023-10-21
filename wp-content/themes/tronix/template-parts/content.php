<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tronix
 */


$post_author = Tronix_options('Tronix_single_post_author', true);
$post_date = Tronix_options('Tronix_single_post_date', true);
$post_comment_number = Tronix_options('Tronix_single_post_cmnt', true);
$post_cat_name = Tronix_options('Tronix_single_post_cat', true);
$post_tag = Tronix_options('Tronix_single_post_tag', true);
$post_share = Tronix_options('Tronix_post_share', true);
$post_nav = Tronix_options('Tronix_post_nav', true);
$author_profile = Tronix_options('Tronix_author_profile', false );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>

	<?php
	if ( get_post_format() === 'gallery' ) {
		get_template_part( 'template-parts/post/post-format-gallery' );
	} else if ( get_post_format() === 'video' ) {
		get_template_part( 'template-parts/post/post-format-video' );
	} else if ( get_post_format() === 'audio' ) {
		get_template_part( 'template-parts/post/post-format-audio' );
	} else {
		get_template_part( 'template-parts/post/post-format-others' );
	}
	?>

	<?php if ( 'post' === get_post_type() ) : ?>
        <div class="post-meta post-details-meta">
            <ul>
				<?php if ($post_author == true) :?>
                    <li><?php tronix_posted_by(); ?></li>
				<?php endif; ?>

				<?php if ($post_date == true) :?>
                    <li><?php tronix_posted_on(); ?></li>
				<?php endif; ?>

				<?php if ( get_comments_number() != 0 && $post_comment_number == true) : ?>
                    <li class="comment-number"><?php tronix_comment_count(); ?></li>
				<?php endif; ?>

				<?php if ($post_cat_name == true) :?>
                    <li><?php tronix_post_categories(); ?></li>
				<?php endif; ?>
            </ul>
        </div>
	<?php endif; ?>


    <div class="entry-content">
		<?php
		the_title( '<h3 class="post-title single-blog-post-title">', '</h3>' );
		the_content( sprintf(
			wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tronix' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tronix' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->

	<?php if (has_tag() && $post_tag == true) :?>
        <footer class="post-footer">
            <div class="post-tags">
				<?php tronix_post_tags(); ?>
            </div>
			<?php if ( function_exists( 'tronix_post_share' ) && $post_share == true) {
				tronix_post_share();
			} ?>
        </footer><!-- .entry-footer -->
	<?php endif; ?>
	
	<?php

	$total_post = wp_count_posts('post')->publish;
	if($total_post > 1 && $post_nav == true) {
		tronix_next_prev_post_link();
	}

	if( $author_profile == true ){
		get_template_part( 'inc/author','info');
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->