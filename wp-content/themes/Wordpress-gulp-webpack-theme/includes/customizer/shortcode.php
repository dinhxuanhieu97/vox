<?php
Kirki::add_section( 'single_form', array(
    'title'          => esc_html__( 'Thay đổi shortcode form', 'vox' ),
    'description'    => esc_html__( 'Thay đổi shortcode form tại đây', 'vox' ),
    'panel'          => 'theme_options',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
/**
 * Default behaviour (saves data as a URL).
 */

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'single_form_shortcode',
	'label'    => esc_html__( 'Thêm đoạn short code vô đây', 'kirki' ),
	'section'  => 'section_id',
	'default'  => esc_html__( '', 'kirki' ),
    'priority' => 20,
    'section'     => 'single_form',
] );
