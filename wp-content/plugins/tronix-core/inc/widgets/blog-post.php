<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

// Blog Post

CSF::createWidget( 'tronixcore_blog_post_widget', array(
    'title'       => esc_html__( 'Tronix Post With Thumbnail', 'tronixcore' ),
    'classname'   => 'footer-widget-post-with-thum eco-custom-widget',
    'description' => esc_html__( 'Add your Contact Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_widget_blog_position',
            'type'    => 'select',
            'title'   => esc_html__( 'Select Options', 'tronixcore' ),
            'options' => array(
                'ASC'  => esc_html__( 'ASC', 'tronixcore' ),
                'DESC' => esc_html__( 'DESC', 'tronixcore' ),
            ),
            'default' => 'ASC',
        ),
        array(
            'id'      => 'tronixcore_widget_blog_number',
            'type'    => 'number',
            'title'   => esc_html__( 'Show Post', 'tronixcore' ),
            'default' => 2,
        ),
        array(
            'id'      => 'tronixcore_widget_blog_show_meta',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Meta', 'tronixcore' ),
            'default' => true,
        ),
        array(
            'id'      => 'tronixcore_widget_blog_show_image',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Image', 'tronixcore' ),
            'default' => true,
        ),
        array(
            'id'      => 'tronixcore_widget_blog_text_limit',
            'type'    => 'number',
            'title'   => esc_html__( 'Title Text Limit', 'tronixcore' ),
            'default' => 5,
        ),
    ),
) );

// OutPut

if ( !function_exists( 'tronixcore_blog_post_widget' ) ) {
    function tronixcore_blog_post_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
        <ul class="tronixcore-widget-post-thum">
            <?php
            $post_q = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => $instance['tronixcore_widget_blog_number'],
            'order'          => $instance['tronixcore_widget_blog_position'],
            ) );
            if ( $post_q->have_posts() ):
                    while ( $post_q->have_posts() ):
                    $post_q->the_post();?>
				<li>
                    <?php if ( !empty( $instance['tronixcore_widget_blog_show_image'] == true ) ) {
                        the_post_thumbnail( 'thumbnail' );
                    }?>
                    <div class="tronixcore-widget-post-thum-content">
                        <a class="recent-post-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_trim_words( get_the_title(), $instance['tronixcore_widget_blog_text_limit'] ); ?></a>
                        <?php if ( !empty( $instance['tronixcore_widget_blog_show_meta'] == true ) ): ?>
                        <div class="recent-widget-date">
                            <i class="far fa-calendar-alt"></i><?php echo get_the_date() ?>
                        </div>
                        <?php endif;?>
                    </div>
			    </li>
			<?php endwhile;endif;?>
        </ul>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}
