<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

// Social Links
CSF::createWidget( 'tronixcore_social_widget', array(
    'title'       => esc_html__( 'Tronix Social Widget', 'tronixcore' ),
    'classname'   => 'tronixcore-social-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Social Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_socials_widget',
            'type'    => 'group',
            'title'   => esc_html__( 'Add Social Links', 'tronixcore' ),
            'fields'  => array(
                array(
                    'id'    => 'tronixcore_social_label',
                    'type'  => 'text',
                    'title' => esc_html__( 'Name', 'tronixcore' ),
                ),
                array(
                    'id'    => 'tronixcore_social_link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Site Link', 'tronixcore' ),
                ),
                array(
                    'id'    => 'tronixcore_social_icon',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Site Icon', 'tronixcore' ),
                ),
            ),
            'default' => array(
                array(
                    'tronixcore_social_label' => esc_html__( 'Facebook', 'tronixcore' ),
                    'tronixcore_social_link'  => '#',
                    'tronixcore_social_icon'  => 'fab fa-facebook',
                ),
                array(
                    'tronixcore_social_label' => esc_html__( 'Twitter', 'tronixcore' ),
                    'tronixcore_social_link'  => '#',
                    'tronixcore_social_icon'  => 'fab fa-twitter',
                ),
                array(
                    'tronixcore_social_label' => esc_html__( 'Linkedin', 'tronixcore' ),
                    'tronixcore_social_link'  => '#',
                    'tronixcore_social_icon'  => 'fab fa-linkedin',
                ),
                array(
                    'tronixcore_social_label' => esc_html__( 'Instagram', 'tronixcore' ),
                    'tronixcore_social_link'  => '#',
                    'tronixcore_social_icon'  => 'fab fa-instagram',
                ),
            ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'tronixcore_social_widget' ) ) {
    function tronixcore_social_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
            <div class="eco-social-widgets-box">
                <ul>
                    <?php foreach ( $instance['tronixcore_socials_widget'] as $social ) {
                    echo ' <li><a href="' . esc_url( $social['tronixcore_social_link'] ) . '" data-toggle="tooltip" data-placement="top" title="' . esc_attr( $social['tronixcore_social_label'] ) . '"><i class="' . esc_attr( $social['tronixcore_social_icon'] ) . '"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}