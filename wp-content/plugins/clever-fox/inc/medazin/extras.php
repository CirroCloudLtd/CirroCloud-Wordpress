<?php
/*
 *
 * Info Default
 */
 function medazin_get_info_default() {
	return apply_filters(
		'medazin_get_info_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Stethoscope', 'clever-fox' ),
					'icon_value'       => 'fa-stethoscope',
					'id'              => 'customizer_repeater_info_001',					
				),
				array(
					'title'           => esc_html__( 'Thermometer', 'clever-fox' ),
					'icon_value'       => 'fa-thermometer-quarter',
					'id'              => 'customizer_repeater_info_002',				
				),
				array(
					'title'           => esc_html__( 'Eyedropper', 'clever-fox' ),
					'icon_value'       => 'fa-eye-dropper',
					'id'              => 'customizer_repeater_info_003',
				),
				array(
					'title'           => esc_html__( 'Transgender', 'clever-fox' ),
					'icon_value'       => 'fa-transgender-alt',
					'id'              => 'customizer_repeater_info_004',
				),
				array(
					'title'           => esc_html__( 'Child', 'clever-fox' ),
					'icon_value'       => 'fa-child',
					'id'              => 'customizer_repeater_info_005',
				),
				array(
					'title'           => esc_html__( 'Heartbeat', 'clever-fox' ),
					'icon_value'       => 'fa-heartbeat',
					'id'              => 'customizer_repeater_info_006',
				),
			)
		)
	);
}


/*
 *
 * Service Default
 */
function medazin_get_service_default() {
	return apply_filters(
		'medazin_get_service_default', json_encode(
			array(
				array(
					'icon_value'   => 'fa-brain',	
					'title'        => esc_html__( 'Neuro Surgery', 'clever-fox' ),
					'text'         => esc_html__( 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, eius!', 'clever-fox' ),
					'text2'        => esc_html__( 'Read More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_001',
				),
				array(
					'icon_value'   => 'fa-tooth',	
					'title'        => esc_html__( 'Dental Surgery', 'clever-fox' ),
					'text'         => esc_html__( 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, eius!', 'clever-fox' ),
					'text2'        => esc_html__( 'Read More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_002',
				),
				array(
					'icon_value'   => 'fa-cut',	
					'title'        => esc_html__( 'Plastic Surgery', 'clever-fox' ),
					'text'         => esc_html__( 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, eius!', 'clever-fox' ),
					'text2'        => esc_html__( 'Read More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_003',
				),
				array(
					'icon_value'   => 'fa-heartbeat',	
					'title'        => esc_html__( 'Heart Surgery', 'clever-fox' ),
					'text'         => esc_html__( 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, eius!', 'clever-fox' ),
					'text2'        => esc_html__( 'Read More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_004',
				)
			)
		)
	);
}

/*
 *
 * Testimonial Default
 */
 function medazin_get_testimonial_default() {
	return apply_filters(
		'medazin_get_testimonial_default', json_encode(
				 array(
				array(
					'image_url'      => esc_url(CLEVERFOX_PLUGIN_URL . 'inc/medazin/images/testimonial/testimonial-img1.jpg'),
					'title'          => esc_html__( 'Jordi Parker', 'clever-fox' ),
					'subtitle'       => esc_html__( 'Hr Manager', 'clever-fox' ),
					'text'           => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit', 'clever-fox' ),
					'id'             => 'customizer_repeater_testimonial_001',
				),
				array(
					'image_url'       => esc_url(CLEVERFOX_PLUGIN_URL . 'inc/medazin/images/testimonial/testimonial-img2.jpg'),
					'title'          => esc_html__( 'Leela Rogers ', 'clever-fox' ),
					'subtitle'       => esc_html__( 'Manager', 'clever-fox' ),
					'text'           => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit', 'clever-fox' ),
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'image_url'       => esc_url(CLEVERFOX_PLUGIN_URL . 'inc/medazin/images/testimonial/testimonial-img3.jpg'),
					'title'          => esc_html__( 'Allie Grater', 'clever-fox' ),
					'subtitle'       => esc_html__( 'Therapist', 'clever-fox' ),
					'text'           => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit', 'clever-fox' ),
					'id'              => 'customizer_repeater_testimonial_003',
				),
			)
		)
	);
}


?>