<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'tronixcore_nabber_widget', array(
    'title'       => esc_html__( 'Tronix Banner Widget', 'tronixcore' ),
    'classname'   => 'tronixcore-banner-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Banner Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'default' => __( 'Work  Together', 'tronixcore' ),
            'title'   => esc_html__( 'Title', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_banner_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'tronixcore' ),
            'default' => __( 'Bur wemust ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore', 'tronixcore' ),
        ),
        array(
            'id'    => 'tronixcore_banner_link',
            'type'  => 'link',
            'title' => esc_html__( 'Link', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_banner_link_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Link Text', 'tronixcore' ),
            'default' => __( 'Contact Now', 'tronixcore' ),
        ),
        array(
            'id'           => 'tronixcore_banner_widget_bg',
            'type'         => 'upload',
            'title'        => esc_html__( 'Background/Image', 'tronixcore' ),
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => esc_html__( 'Add Image', 'tronixcore' ),
            'remove_title' => esc_html__( 'Remove Image', 'tronixcore' ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'tronixcore_nabber_widget' ) ) {
    function tronixcore_nabber_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
            <div class="tronixcore-widget-banner-wrapper" style="background-image:url(<?php echo esc_url( $instance['tronixcore_banner_widget_bg'] ); ?>)">
                <?php if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }?>
                <div class="tronixcore-banner-dec">
                    <p><?php echo esc_html( $instance['tronixcore_banner_dec'] ); ?></p>
                </div>
                <div class="tronixcore-banner-btn button">
                    <a href="<?php echo esc_url( $instance['tronixcore_banner_link']['url'] ); ?>" class="theme-btns"><span><?php echo esc_html( $instance['tronixcore_banner_link_text'] ); ?><i class="fas fa-angle-double-right"></i></span></a>
                </div>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}