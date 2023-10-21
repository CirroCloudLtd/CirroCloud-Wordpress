<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// No access of directly access

class TronixElementorWidget {
    private static $instance = null;
    public static function get_instance() {
        if ( !self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function init() {
        add_action( 'elementor/widgets/register', array( $this, 'tronixcore_elementor_widgets' ) );
        require_once( __DIR__ . '/control/custom-control.php' );
    }

    public function tronixcore_elementor_widgets() {
        // Check if the Elementor plugin has been installed / activated.
        if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
            require_once 'title.php';
            require_once 'slider.php';
            require_once 'service-one.php';
            require_once 'service-two.php';
            require_once 'about-us.php';
            require_once 'about-us-two.php';
            require_once 'image-one.php';
            require_once 'image-two.php';
            require_once 'counter.php';
            require_once 'testimonial.php';
            require_once 'testimonial-two.php';
	        require_once 'project.php';
            require_once 'project-two.php';
            require_once 'project-details.php';
            require_once 'brand-logo.php';
            require_once 'brand-logo-two.php';
            require_once 'blog-one.php';
            require_once 'blog-two.php';
            require_once 'social-link.php';
            require_once 'customar-service-section.php';
            require_once 'team-one.php';
            require_once 'team-two.php';
            require_once 'team-three.php';
            require_once 'team-details.php';
            require_once 'video-image.php';
            require_once 'priceing-card.php';
            require_once 'priceing-card-two.php';
            require_once 'service-three.php';
            require_once 'service-four.php';
            require_once 'skilbar.php';
            require_once 'best-service.php';
            require_once 'contact-sopport-box.php';
            require_once 'testimonial-three.php';
            require_once 'icon-box.php';
            require_once 'contact-info.php';
            require_once 'faq.php';
            require_once 'working-time.php';
            require_once 'tronix-list.php';
            require_once 'contact-form7.php';
            require_once 'header-template/tronix-header-one.php';
            require_once 'header-template/tronix-header-two.php';
            require_once 'header-template/tronix-header-three.php';
            require_once 'header-template/header-four.php';
            require_once 'footer-template/tronix-footer-one.php';
            require_once 'footer-template/tronix-footer-two.php';
             require_once 'footer-template/tronix-footer-three.php';
             require_once 'footer-template/footer-four.php';
            require_once 'button.php';
            require_once 'brand-logo-three.php';
            require_once 'shape-image2.php';
            require_once 'grid-image.php';
            require_once 'service-five.php';
            require_once 'service-six.php';
            require_once 'icon-box-two.php';
            require_once 'image-three.php';
            require_once 'team-four.php';
            require_once 'project-three.php';
            require_once 'video-button.php';
            require_once 'circle-image.php';
            require_once 'slider-two.php';
          
            
           
        }
    }
}
TronixElementorWidget::get_instance()->init();

function tronixcore_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'tronixcore',
        [
            'title' => __( 'Tronix Elements', 'tronixcore' ),
        ]
    );
    $elements_manager->add_category(
        'tronix_header_template',
        [
            'title' => __( 'Tronix Header Template', 'tronixcore' ),
        ]
    );
    $elements_manager->add_category(
        'tronix_footer_template',
        [
            'title' => __( 'Tronix Footer Template', 'tronixcore' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'tronixcore_elementor_widget_categories' );