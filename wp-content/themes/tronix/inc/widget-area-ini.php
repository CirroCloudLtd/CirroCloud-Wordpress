<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Tronix_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'tronix' ),
            'id'            => 'sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ),
    );

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Shop Sidebar', 'tronix' ),
                'id'            => 'tronix-shop',
                'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
                'before_widget' => '<section id="%1$s" class="woo-widgets widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ),
        );
    }

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'tronix' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'tronix' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'tronix' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );
    
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'tronix' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'tronix' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'Tronix_widgets_init' );
?>