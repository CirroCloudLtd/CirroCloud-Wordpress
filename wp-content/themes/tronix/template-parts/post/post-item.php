<?php
if(is_archive()){
	$post_item_layout = Tronix_options('Tronix_archive_layout', 'right-sidebar');
}else if(is_search()){
	$post_item_layout = Tronix_options('Tronix_search_layout', 'right-sidebar');
}else{
	$post_item_layout = Tronix_options('Tronix_blog_layout', 'right-sidebar');
}

if($post_item_layout == 'grid-ls' || $post_item_layout == 'grid-rs' || $post_item_layout == 'grid'){
	$word_count = 20;
}else{
	$word_count = 50;
}

$show_author_name = Tronix_options('Tronix_post_author', true);
$show_post_date = Tronix_options('Tronix_post_date', true);
$show_comment_number = Tronix_options('Tronix_cmnt_number', true);
$show_category = Tronix_options('Tronix_show_category', true);
$show_read_more = Tronix_options('Tronix_show_readmore', true);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
	<div class="single-post-wrapper">
		<?php
            if(get_post_format() === 'gallery'){
	            get_template_part( 'template-parts/post/post-format-gallery');
            }else if(get_post_format() === 'video'){
	            get_template_part( 'template-parts/post/post-format-video');
            }else if(get_post_format() === 'audio'){
	            get_template_part( 'template-parts/post/post-format-audio');
            }else{
	            get_template_part( 'template-parts/post/post-format-others');
            }
        ?>

		<div class="post-content-wrapper">

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="post-meta">
					<ul>
                        <?php if( $show_author_name == true):?>
						<li><?php tronix_posted_by(); ?></li>
                        <?php endif; ?>

						<?php if( $show_post_date == true):?>
						<li><?php tronix_posted_on(); ?></li>
						<?php endif; ?>

						<?php if( $post_item_layout == 'full-width' || $post_item_layout == 'left-sidebar' || $post_item_layout == 'right-sidebar' ) : ?>
                            <?php if ( get_comments_number() != 0 && $show_comment_number == true ) : ?>
                                <li class="comment-number"><?php tronix_comment_count(); ?></li>
                            <?php endif; ?>

						    <?php if($show_category == true):?>
                            <li><?php tronix_post_first_category(); ?></li>
                            <?php endif;?>
                        <?php endif;?>
					</ul>
				</div>
			<?php endif; ?>

			<?php the_title( '<h3 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="post-excerpt">
				<p><?php echo tronix_words_limit( get_the_excerpt(), $word_count ); ?><?php if ( ! empty( get_the_content() ) ) {
						echo ' [...]';
					} ?></p>
			</div>

			<?php if( $show_read_more == true ):
				$read_more_text = Tronix_options('Tronix_blog_read_text','Read More');
            ?>
			<div class="post-read-more">
					<a class="theme-button" href="<?php echo esc_url( get_the_permalink() ) ?>">
	                    <?php echo esc_html($read_more_text);?><i class="fas fa-arrow-right"></i></i>
                    </a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>