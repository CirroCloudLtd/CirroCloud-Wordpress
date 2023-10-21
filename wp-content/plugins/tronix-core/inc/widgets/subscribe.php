<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'tronixcore_newsletter_widget', array(
    'title'       => esc_html__( 'Tronix Newletter Widget', 'tronixcore' ),
    'classname'   => 'tronixcore-subscribe-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Newsletter Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'default' => esc_html__( 'Newsletter', 'tronixcore' ),
            'title'   => esc_html__( 'Title', 'tronixcore' ),
        ),
        array(
            'id'      => 'newsletter_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Sort Description', 'tronixcore' ),
            'desc'    => esc_html__( 'Add Sort Description', 'tronixcore' ),
            'default' => esc_html__( 'Our service has the upper hand in overcoming', 'tronixcore' ),
        ),
        array(
            'id'          => 'select_newsletter',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Type', 'tronixcore' ),
            'placeholder' => esc_html__( 'Select an option', 'tronixcore' ),
            'options'     => array(
                '1' => esc_html__( 'Shortcode form Plugin', 'tronixcore' ),
                '2' => esc_html__( 'Add Link', 'tronixcore' ),
            ),
            'default'     => '2',
        ),
        array(
            'id'         => 'newsletter_shortcode',
            'type'       => 'textarea',
            'title'      => esc_html__( 'Add Shortcode', 'tronixcore' ),
            'desc'       => esc_html__( 'Add Shortcode from Mailchip wordpress Plugin', 'tronixcore' ),
            'dependency' => array( 'select_newsletter', '==', '1' ),
        ),
        array(
            'id'         => 'newsletter_link',
            'type'       => 'textarea',
            'title'      => esc_html__( 'Add Link', 'tronixcore' ),
            'desc'       => esc_html__( 'Add Newsletter Link from your Account', 'tronixcore' ),
            'dependency' => array( 'select_newsletter', '==', '2' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'CSS Options', 'tronixcore' ),
        ),
        array(
            'id'          => 'newsletter_bg',
            'type'        => 'color',
            'title'       => esc_html__( 'Background', 'tronixcore' ),
            'output_mode' => 'background-color',
        ),
    ),
) );

// OutPut
if ( !function_exists( 'tronixcore_newsletter_widget' ) ) {
    function tronixcore_newsletter_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        echo '<div class="subscribe-widget" style="background:' . $instance['newsletter_bg'] . '">';
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
        <div class="company-subscribe-widget">
            <?php if ( !empty( $instance['newsletter_dec'] ) ): ?>
                <p>
                    <?php echo esc_html( $instance['newsletter_dec'] ); ?>
                </p>
            <?php endif;?>
            <?php
            if ( $instance['select_newsletter'] == '1' ) {
            ?>
                <div class="subscribe-form">
                    <?php echo do_shortcode( $instance['newsletter_shortcode'] ); ?>
                </div>
            <?php
            } else {
            ?>
            <div class="subscribe-form">
                <form action="<?php echo esc_url( $instance['newsletter_link'] ) ?>" method="post">
                    <div class="mc4wp-form-fields">
                        <input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Your Email Address', 'tronixcore' );?>" required="" />
                        <button value="submit"> <i class="fa fa-location-arrow"></i> </button>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
        <?php
    echo '</div>';
        echo wp_kses_post( $args['after_widget'] );
    }
}