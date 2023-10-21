<?php

/*--------------------------------
Get Theme Options
----------------------------------*/
if ( !function_exists( 'Tronix_options' ) ) {
    function Tronix_options( $option = '', $default = null ) {
        $defaults = Tronix_default_theme_options();
        $options = get_option( 'Tronix_Theme_Option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
function tronix_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'tronix-woo-active';
	}else{
		$classes[] = 'tronix-woo-deactivate';
	}

	//Check Elementor Page Builder Used or not
	$elementor_used = get_post_meta(get_the_ID(), '_elementor_edit_mode', true);

	if(is_archive() || is_search()){
		$classes[]        = !!$elementor_used ? 'page-builder-not-used' : 'page-builder-not-used';
	}else{
		$classes[]        = !!$elementor_used ? 'page-builder-used' : 'page-builder-not-used';
	}

	return $classes;
}
add_filter( 'body_class', 'tronix_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tronix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tronix_pingback_header' );


/**
 * Words limit
 */
function tronix_words_limit($text, $limit) {
	$words = explode(' ', $text, ($limit + 1));

	if (count($words) > $limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}


/**
 * Get excluded sidebar list
 */
if( ! function_exists( 'tronix_sidebars' ) ) {
	function tronix_sidebars() {
		$default = esc_html__('Default', 'tronix');
		$options = array($default);
		// set ids of the registered sidebars for exclude
		$exclude = array( 'tronix-footer-widget' );

		global $wp_registered_sidebars;

		if( ! empty( $wp_registered_sidebars ) ) {
			foreach( $wp_registered_sidebars as $sidebar ) {
				if( ! in_array( $sidebar['id'], $exclude ) ) {
					$options[$sidebar['id']] = $sidebar['name'];
				}
			}
		}

		return $options;
	}
}


/**
 * Iframe embed
 */

function tronix_iframe_embed( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'tronix_iframe_embed', 10, 2 );

/**
 * Allow Html
 */
if ( !function_exists( 'tronix_allow_html' ) ) {
	function tronix_allow_html(){
		return array(
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'title'  => array(),
				'rel'    => array(),
			),
			'strong' => array(),
			'small'  => array(),
			'span'   => array(
			        'style' => array(),
            ),
			'p'      => array(),
			'br'     => array(),
			'img'    => array(
				'src'    => array(),
				'title'  => array(),
				'alt'    => array(),
				'width'  => array(),
				'height' => array(),
				'class'  => array(),
			),
			'h1'     => array(),
			'h2'     => array(),
			'h3'     => array(),
			'h4'     => array(),
			'h5'     => array(),
			'h6'     => array(),
		);
    }
}

/**
 * Next - Prev Post Link
 */
if ( !function_exists( 'tronix_next_prev_post_link' ) ) {
	function tronix_next_prev_post_link() {
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		if ( ! $prev_post && ! $next_post ) {
			return;
		}
		?>
		<nav class="tronix-post-navication-thum" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'tronix' ); ?></h2>
			<div class="nav-links">
				<?php
				if ( $prev_post ) :
					$prev_post_thumb = get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
					?>
					<div class="nav-previous post-thum-nav">
	
						<div class="nav-holder">
							<?php if ( $prev_post_thumb ) : ?>
								<div class="nav-thumb">
									<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>"><?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?></a>
								</div>
							<?php endif; ?>
							<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>" class="nav-label">
								<span class="nav-subtitle"><?php esc_html_e( 'Previous Post', 'tronix' ); ?></span>
							</a>
						</div>
	
					</div>
				<?php endif; ?>
				<?php
				if ( $next_post ) :
					$next_post_thumb = get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
					?>
					<div class="nav-next post-thum-nav">
	
						<div class="nav-holder">
							<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" class="nav-label">
								<span class="nav-subtitle"><?php esc_html_e( 'Next Post', 'tronix' ); ?></span>
							</a>
							<?php if ( $next_post_thumb ) : ?>
								<div class="nav-thumb">
									<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"><?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?></a>
								</div>
							<?php endif; ?>
						</div>
	
					</div>
	
				<?php endif; ?>
			</div>
		</nav>
		<?php
	} 
}

/**
 * Check if a post is a custom post type.
 *
 * @param mixed $post Post object or ID
 *
 * @return boolean
 */
function tronix_custom_post_types( $post = null ) {
	$custom_post_list = get_post_types( array( '_builtin' => false ) );

	// there are no custom post types
	if ( empty ( $custom_post_list ) ) {
		return false;
	}

	$custom_types     = array_keys( $custom_post_list );
	$current_post_type = get_post_type( $post );

	// could not detect current type
	if ( ! $current_post_type ) {
		return false;
	}

	return in_array( $current_post_type, $custom_types );
}


/**
 * Add span tag in archive list count number
 */
function tronix_add_span_archive_count($links) {
	$links = str_replace('</a>&nbsp;(', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'tronix_add_span_archive_count');


/**
 * Add span tag in category list count number
 */

function tronix_add_span_category_count($links) {
	$links = str_replace('</a> (', '</a> <span class="post-count-number">(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

add_filter('wp_list_categories', 'tronix_add_span_category_count');

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'tronix_posted_on' ) ) :

	function tronix_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'tronix' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-check"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'tronix_posted_by' ) ) :

	function tronix_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'tronix' ),
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline"><i class="far fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the tags.
 */
if ( ! function_exists( 'tronix_post_tags' ) ) :

	function tronix_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'tronix'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links"><span class="tag-title">' .esc_html__('Tags:','tronix').'</span>' .esc_html__(' %1$s', 'tronix') . '</span>', $tags_list); // WPCS: XSS OK.


			}

		}
	}
endif;

/**
 * Prints HTML with meta information for the categories.
 */

if ( ! function_exists( 'tronix_post_categories' ) ) :

	function tronix_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'tronix'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'tronix') . '</span>', $categories_list); // WPCS: XSS OK.
			}

		}
	}
endif;

/**
 * Prints post's first category
 */

if ( ! function_exists( 'tronix_post_first_category' ) ) :

	function tronix_post_first_category(){

		$post_category_list = get_the_terms(get_the_ID(), 'category');

		$post_first_category = $post_category_list[0];
		if ( ! empty( $post_first_category->slug )) {
			echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
		}

	}
endif;

/**
 * Prints HTML with meta information for the comments.
 */
if ( ! function_exists( 'tronix_comment_count' ) ) :

	function tronix_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
			echo '<span class="comments-link"><i class="far fa-comments"></i>';
			comments_popup_link('', ''.esc_html__('1', 'tronix').' <span class="comment-count-text">'.esc_html__('Comment', 'tronix').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'tronix').'</span>');
			echo '</span>';
		}
	}
endif;


/*--------------------------------
COMMENT PAGINATION
----------------------------------*/

if ( !function_exists( 'Tronix_comments_pagination' ) ) {
    function Tronix_comments_pagination() {
        the_comments_pagination( array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ) );
    }
}


/*--------------------------------
Allode Megamenu
----------------------------------*/
add_filter( 'nav_menu_css_class', 'tronix_megamenu_class', 10, 2 );
function tronix_megamenu_class( $classes, $item ) {
	$navmega = get_post_meta( $item->ID, 'Tronix_navmeta', true );
	if ( in_array( 'menu-item-has-children', $classes ) && !empty( $navmega ) ) {
		if ( !empty( $navmega['Tronix_nav_megamenu_show'] == true ) ) {
			$megamenu = 'mega ';
		} else {
			$megamenu = 'no-mega ';
		}
		$classes[] = $megamenu . $navmega['Tronix_nav_mmenu_column'];
	}
	return $classes;
}