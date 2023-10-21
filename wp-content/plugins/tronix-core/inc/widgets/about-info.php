<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'tronixcore_about_info_widget', array(
    'title'       => esc_html__( 'Tronix About Widget', 'tronixcore' ),
    'classname'   => 'tronixcore-banner-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your About Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__( 'Title', 'tronixcore' ),
            'default' => __( 'Thomah William', 'tronixcore' ),
        ),
        array(
            'id'           => 'tronixcore_about_widget_img',
            'type'         => 'upload',
            'title'        => esc_html__( 'Author Image', 'tronixcore' ),
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => esc_html__( 'Add Image', 'tronixcore' ),
            'remove_title' => esc_html__( 'Remove Image', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_about_widget_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'tronixcore' ),
            'default' => __( 'Protecting biodiversity and natural habitats is crucial for maintaining a healthy and sustainable ecology.', 'tronixcore' ),
        ),
        array(
            'id'      => 'button_enable',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Button', 'tronixcore' ),
            'default' => true,
        ),
        array(
            'id'      => 'tronixcore_about_widget_button',
            'type'    => 'text',
            'title'   => esc_html__( 'Button Text', 'tronixcore' ),
            'default' => __( 'Read More', 'tronixcore' ),
            'dependency'  => array( 'button_enable', '==', 'true' ), // check for true/false by field id
        ),
        array(
            'id'      => 'button_link',
            'type'    => 'link',
            'title'   => esc_html__( 'Button Link', 'tronixcore' ),
            'dependency'  => array( 'button_enable', '==', 'true' ), // check for true/false by field id
            'default' => array(
                'url'    => '#',
                'target' => '_blank',
            ),
        ),
        array(
            'id'      => 'social_area_enable',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Social Area Enable', 'tronixcore' ),
            'default' => true,
        ),
        array(
            'id'     => 'tronixcore_about_socials',
            'type'   => 'group',
            'title'  => esc_html__( 'Social Info', 'tronixcore' ),
            'dependency'  => array( 'social_area_enable', '==', 'true' ), // check for true/false by field id
            'fields' => array(
                array(
                    'id'    => 'tronixcore_about_social_label',
                    'type'  => 'text',
                    'title' => esc_html__( 'label', 'tronixcore' ),
                ),
                array(
                    'id'      => 'tronixcore_about_social_icon',
                    'type'    => 'icon',
                    'title'   => esc_html__( 'Icon', 'tronixcore' ),
                    'default' => 'fab fa-facebook-f',
                ),
                array(
                    'id'      => 'tronixcore_about_social_link',
                    'type'    => 'link',
                    'title'   => esc_html__( 'Link', 'tronixcore' ),
                    'default' => array(
                        'url'    => 'http://facebook.com',
                        'target' => '_blank',
                    ),
                ),
            ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'tronixcore_about_info_widget' ) ) {
    function tronixcore_about_info_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
            <div class="tronixcore-widget-about-wrapper">
                <div class="tronixcore-about-widget-info">
                    <?php if ( !empty( $instance['tronixcore_about_widget_img'] ) ) {
            echo '<div class="tronixcore-about-widget-img"><img src="' . esc_url( $instance['tronixcore_about_widget_img'] ) . '"></div>';
        }?>
                    <?php if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }?>
                    <div class="tronixcore-about-widget-doc">
                        <?php echo wp_kses_post( $instance['tronixcore_about_widget_dec'] ); ?>
                    </div>

                     <!-- Button Area Section -->

                    <?php if (  $instance['button_enable'] == true )  :?>
                        <?php if ( !empty( $instance['tronixcore_about_widget_button'] ) ) :?>
                            <div class="tronixcore-about-button">
                                <a class="theme-btns" href="<?php echo esc_url( $instance['button_link']['url'] ); ?>" target="<?php echo esc_attr( $instance['button_link']['target'] ); ?>"> 
                                    <span> <?php echo esc_html( $instance['tronixcore_about_widget_button'] ); ?> <i class="fas fa-angle-double-right"> </i> </span>
                                </a>
                            </div>
                        <?php endif;?>
                    <?php endif;?>
                     <!-- End Area Section -->

                    <!-- Social Area Section -->

                    <?php if (  $instance['social_area_enable'] == true )  :?>
                        <div class="tronixcore-about-widget-social">
                            <ul>
                                <?php if ( !empty( $instance['tronixcore_about_socials'] ) ) : ?>
                                    <?php foreach ( $instance['tronixcore_about_socials'] as $social ): ?>
                                    <li><a target="<?php echo esc_attr( $social['tronixcore_about_social_link']['target'] ); ?>" href="<?php echo esc_url( $social['tronixcore_about_social_link']['url'] ); ?>" title="<?php echo esc_attr( $social['tronixcore_about_social_label'] ) ?>"><i class="<?php echo esc_attr( $social['tronixcore_about_social_icon'] ); ?>"></i></a></li>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                        </div>
                    <?php endif;?>
                     <!-- End Area Section -->
                </div>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}
