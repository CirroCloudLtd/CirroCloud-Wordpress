<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'tronixcore_contact_info_widget', array(
    'title'       => esc_html__( 'Tronix Contact Info', 'tronixcore' ),
    'classname'   => 'contact-widget eco-custom-widget',
    'description' => esc_html__( 'Add Your Contact Info', 'tronixcore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'tronixcore' ),
        ),
        array(
            'id'      => 'tronixcore_contact_info_group',
            'type'    => 'group',
            'title'   => esc_html__( 'Add Information', 'tronixcore' ),
            'fields'  => array(
                array(
                    'id'    => 'tronixcore_contact_info_editor',
                    'type'  => 'wp_editor',
                    'title' => esc_html__( 'Content', 'tronixcore' ),
                ),
                array(
                    'id'    => 'tronixcore_contact_info_icons',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Icon', 'tronixcore' ),
                ),
            ),
            'default' => array(
                array(
                    'tronixcore_contact_info_editor' => esc_html__( '1791 Yorkshire Circle Kitty Hawk, NC 27949', 'tronixcore' ),
                    'tronixcore_contact_info_icons'  => 'fas fa-map-marker-alt',
                ),
                array(
                    'tronixcore_contact_info_editor' => esc_html__( 'Mon-Sat 9:00 - 7:00', 'tronixcore' ),
                    'tronixcore_contact_info_icons'  => 'fas fa-clock',
                ),
                array(
                    'tronixcore_contact_info_editor' => esc_html__( '+012-345-6789', 'tronixcore' ),
                    'tronixcore_contact_info_icons'  => 'fas fa-phone-alt',
                ),
                array(
                    'tronixcore_contact_info_editor' => esc_html__( 'info@example.com', 'tronixcore' ),
                    'tronixcore_contact_info_icons'  => 'fas fa-envelope',
                ),
            ),
        ),
    ),
) );
// OutPut

if ( !function_exists( 'tronixcore_contact_info_widget' ) ) {
    function tronixcore_contact_info_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
        <?php
if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
        <div class="company-contact-widget">
            <ul>
            <?php foreach ( $instance['tronixcore_contact_info_group'] as $tronixcore_contact_info ): ?>
                <li>
                    <div class="icon"><i class="<?php echo esc_attr( $tronixcore_contact_info['tronixcore_contact_info_icons'] ); ?>"></i></div>
                    <div class="info"><?php echo wp_kses_post( $tronixcore_contact_info['tronixcore_contact_info_editor'] ); ?></div>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}