<?php
if (class_exists('CSF')) {
    function Tronix_inline_style() {
        wp_enqueue_style('tronix-inline', get_template_directory_uri() . '/assets/css/inline-style.css', array(), TRONIX_VERSION , 'all');
        $Tronix_css_editor = Tronix_options('Tronix_css_editor');
        $Tronix_inline = ''; // Define $Tronix_inline before using it

        if (!empty($Tronix_css_editor)) {
            $Tronix_inline = esc_attr($Tronix_css_editor); // Assign the value
        }

        if (1 == Tronix_options('breadcrumb_shape_enable')) {
            $Tronix_inline .= '
                .breadcroumb-area:before,.breadcroumb-area:after{ content:"" };
            ';
        } else {
            $Tronix_inline .= '
                .breadcroumb-area:before,.breadcroumb-area:after{ content:none };
            ';
        }
        wp_add_inline_style('tronix-inline', $Tronix_inline);
    }
}
add_action('wp_enqueue_scripts', 'Tronix_inline_style');
 