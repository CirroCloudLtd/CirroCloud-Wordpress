<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$teammeta = 'Tronix_teammeta';

//
// Create a metabox
//
CSF::createMetabox( $teammeta, array(
    'title'        => esc_html__( 'Team Options', 'tronix' ),
    'post_type'    => array( 'tronix_team' ),
    'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $teammeta, array(
    'title'  => esc_html__( 'Team Member Options', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'Tronix_team_stitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Designation', 'tronix' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'tronix' ),
            'default'  => esc_html__( 'Network Engineer', 'tronix' ),
        ),
         array(
            'id'       => 'tronix_team_description',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Designation', 'tronix' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'tronix' ),
            'default'  => esc_html__( 'Milano is a certified network engineer with over 10 years of experience in designing and deploying network solutions.', 'tronix' ),
        ),
        
         //------- Eco Team Details Info ----------
        
        array(
            'id'       => 'Tronix_team_info',
            'type'     => 'group',
            'title'    => esc_html__( 'Team Info Box', 'tronix' ),
            'subtitle' => esc_html__( 'Add Team Members Info here', 'tronix' ),
            'fields'   => array(
                array(
                    'id'       => 'Tronix_team_info_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'tronix' ),
                    'subtitle' => esc_html__( 'Add Social Icon', 'tronix' ),
                    'default'  => 'fas fa-user-alt',
                ),
                array(
                    'id'       => 'Tronix_team_info_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'tronix' ),
                    'subtitle' => esc_html__( 'Add info Label Here', 'tronix' ),
                    'default'  => esc_html__( 'Experience', 'tronix' ),
                ),
                array(
                    'id'       => 'Tronix_team_info_content',
                    'type'     => 'wp_editor',
                    'title'    => esc_html__( 'Content', 'tronix' ),
                    'subtitle' => esc_html__( 'Add Team Content Here', 'tronix' ),
                    'default'  => esc_html__( 'More Than 10 Years', 'tronix' ),
                ),
            ),
            'default'  => array(
                array(
                    'Tronix_team_info_label'   => esc_html__( 'Experience', 'tronix' ),
                    'Tronix_team_info_content' => esc_html__( 'More Than 10 Years', 'tronix' ),
                    'Tronix_teams_social_icon' => 'fas fa-user-alt',
                ),
                array(
                    'Tronix_team_info_label'   => esc_html__( 'Phone', 'tronix' ),
                    'Tronix_team_info_content' => esc_html__( '+90 122 456 78', 'tronix' ),
                    'Tronix_teams_social_icon' => 'fas fa-phone-alt',
                ),
                 array(
                    'Tronix_team_info_label'   => esc_html__( 'Email', 'tronix' ),
                    'Tronix_team_info_content' => esc_html__( 'info@tronix.com', 'tronix' ),
                    'Tronix_teams_social_icon' => 'fas fa-envelope',
                ),
                 array(
                    'Tronix_team_info_label'   => esc_html__( 'Fax', 'tronix' ),
                    'Tronix_team_info_content' => esc_html__( '+90 122 456 78', 'tronix' ),
                    'Tronix_teams_social_icon' => 'fas fa-fax',
                ),
            ),
        ),
    
        //------- Social Inpul ----------
        
        array(
            'id'        => 'Tronix_team_socials',
            'type'      => 'group',
            'title'     => esc_html__( 'Social Links', 'tronix' ),
            'subtitle'     => esc_html__( 'Social Options Groups', 'tronix' ),
            'fields'    => array(
                array(
                    'id'       => 'Tronix_team_social_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'tronix' ),
                    'subtitle' => esc_html__( 'Add Social label Name', 'tronix' ),
                ),
                array(
                    'id'       => 'Tronix_teams_social_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'tronix' ),
                    'subtitle' => esc_html__( 'Add Social Icon', 'tronix' ),
                    'default'  => 'fa fa-facebook',
                ),
                array(
                    'id'       => 'Tronix_teams_social_url',
                    'type'     => 'link',
                    'title'    => 'Link',
                    'default'  => array(
                      'url'    => 'facebook.com',
                      'target' => '_blank'
                    ),
                ),
            ),
            'default'   => array(
              array(
                'Tronix_team_social_label' => esc_html__( 'Facebook', 'tronix' ),
                'Tronix_teams_social_icon' => 'fab fa-facebook-f',
                'Tronix_teams_social_url' => 'facebook.com',
              ),
              array(
                'Tronix_team_social_label' => esc_html__( 'Twitter', 'tronix' ),
                'Tronix_teams_social_icon' => 'fab fa-twitter',
                'Tronix_teams_social_url' => 'twotter.com',
              ),
              array(
                'Tronix_team_social_label' => esc_html__( 'Linkedin', 'tronix' ),
                'Tronix_teams_social_icon' => 'fab fa-linkedin-in',
                'Tronix_teams_social_url' => 'twotter.com',
              ),
              array(
                'Tronix_team_social_label' => esc_html__( 'instagram ', 'tronix' ),
                'Tronix_teams_social_icon' => 'fab fa-instagram',
                'Tronix_teams_social_url' => 'instagram.com',
              ),
            ),
        ),
    ),
) );