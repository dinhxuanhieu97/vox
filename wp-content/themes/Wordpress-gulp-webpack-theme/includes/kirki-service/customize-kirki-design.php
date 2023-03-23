<?php
// include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// $plugin = 'kirki/kirki.php';

// function ella_admin_notice_kirki_error() {
//     $class = 'notice notice-error';
//     $message = __( 'You must be active Kirki plugin', 'ella' );
 
//     printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
// }
// if(!is_plugin_active( $plugin )){
//     add_action( 'admin_notices', 'ella_admin_notice_kirki_error' );
//     return false;
// }

Kirki::add_panel( 'service_page_config', array(
    'priority'    => 1,
    'title'       => esc_html__( 'Service Page Design Config', 'kirki' ),
    'description' => esc_html__( 'Service Page Design description', 'kirki' ),
) );
Kirki::add_section( 'section_one', array(
    'title'          => esc_html__( 'Section 1 - Design Page', 'kirki' ),
    'description'    => esc_html__( 'Section 1 - Design Page description.', 'kirki' ),
    'panel'          => 'service_page_config',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );

Kirki::add_field( 'big_title_page', [
	'type'     => 'text',
	'settings' => 'big_title_design_page_setting',
	'label'    => esc_html__( 'Big Title Page', 'kirki' ),
	'section'  => 'section_one',
	'default'  => esc_html__( 'design', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'design_text_desc_left', [
	'type'     => 'textarea',
	'settings' => 'design_text_desc_left_setting',
	'label'    => esc_html__( 'Description Left', 'kirki' ),
	'section'  => 'section_one',
	'default'  => esc_html__( 'We will help your business <br> to be professional , mmedi- <br> ately regconize by the cus- <br> tomLorem ipsum dolor sit', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'design_text_desc_right', [
	'type'     => 'textarea',
	'settings' => 'design_text_desc_right_setting',
	'label'    => esc_html__( 'Description Right', 'kirki' ),
	'section'  => 'section_one',
	'default'  => esc_html__( 'We will help your business to be professional , clear,  en- <br> gaging, diferent and  immediately regconize by the custom- <br> ers Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_section( 'section_two', array(
    'title'          => esc_html__( 'Section 2 - Design Page', 'kirki' ),
    'description'    => esc_html__( 'Section 2 - Design Page description.', 'kirki' ),
    'panel'          => 'service_page_config',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'mc_project_repeater', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_two',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'mc_project_repeater_setting',
	'fields' => [
		'mc_title_custom' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title No Background', 'kirki' ),
			'description' => esc_attr__( 'Title', 'kirki' ),
		],
		'mc_title_bg_custom' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title Background White', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'mc_desc_custom' => [
			'type'        => 'textarea',
			'label'       => esc_attr__( 'Description Workflow', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
		'mc_img_project' => [
			'type'        => 'image',
			'label'       => esc_attr__( 'Image Project', 'kirki' ),
			'description' => esc_attr__( 'Image', 'kirki' ),
		],
		'mc_link_custom' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Link Project', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
	],
	'default'     => [
		[
			'mc_title_custom' => esc_attr__( 'Logo', 'kirki' ),
			'mc_title_bg_custom' => esc_attr__( 'Landing page', 'kirki' ),
			'mc_desc_custom' => esc_attr__( 'Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit, Sed Diam Nonummy Nibh Euismod Tincidunt Ut Laoreet Dolore Magna Aliquam Erat Volutpat.', 'kirki' ),
			'mc_img_project' => '',
			'mc_link_custom' => '',
		],
	],
] );

Kirki::add_section( 'section_three', array(
    'title'          => esc_html__( 'Section 3 - Design Page', 'kirki' ),
    'description'    => esc_html__( 'Section 3 - Design Page description.', 'kirki' ),
    'panel'          => 'service_page_config',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'img_bg_sec_3', [
	'type'        => 'image',
	'settings'    => 'img_bg_sec_3_setting',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Top Light.', 'kirki' ),
	'section'     => 'section_three',
	'default'     => '',
] );
Kirki::add_field( 'bd_reater', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_three',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'bd_reater_setting',
	'fields' => [
		'bd_immg_light' => [
			'type'        => 'image',
			'label'       => esc_attr__( 'Image', 'kirki' ),
			'description' => esc_attr__( 'image', 'kirki' ),
		],
		'bd_name_page' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title ', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'bd_link_light' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Link', 'kirki' ),
			'description' => esc_attr__( 'link', 'kirki' ),
		],
		'bd_check_active_light' => [
			'type'        => 'checkbox',
			'label'       => esc_attr__( 'Check active', 'kirki' ),
			'description' => esc_attr__( 'active', 'kirki' ),
		],
		'bd_text_check_active_light' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Check active', 'kirki' ),
			'description' => esc_attr__( 'active', 'kirki' ),
		],
	],
	'default'     => [
		[
			'bd_immg_light' => '',
			'bd_name_page' => esc_attr__( 'Design', 'kirki' ),
			'bd_link_light' => '#',
			'bd_check_active_light' => '',
			'bd_text_check_active_light' => esc_attr__( 'active', 'kirki' ),

		],
	],
] );

Kirki::add_section( 'section_four', array(
    'title'          => esc_html__( 'Section 4 - Design Page', 'kirki' ),
    'description'    => esc_html__( 'Section 4 - Design Page description.', 'kirki' ),
    'panel'          => 'service_page_config',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'background_workflow', [
	'type'        => 'image',
	'settings'    => 'background_workflow_setting_url',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Workflow.', 'kirki' ),
	'section'     => 'section_four',
	'default'     => '',
] );
Kirki::add_field( 'workflow_repeater', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_four',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'workflow_repeater_setting',
	'fields' => [
		'number_workflow' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Number Workflow', 'kirki' ),
			'description' => esc_attr__( 'number', 'kirki' ),
		],
		'small_title_workflow' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title Workflow', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'description_workflow' => [
			'type'        => 'textarea',
			'label'       => esc_attr__( 'Description Workflow', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
	],
	'default'     => [
		[
			'number_workflow' => esc_attr__( '1', 'kirki' ),
			'small_title_workflow' => esc_attr__( 'listen to the customers', 'kirki' ),
			'description_workflow' => esc_attr__( 'We always willing to learn the brands desire to help your brand achieve the goals.', 'kirki' ),
		],
	],
	'choices' => [
		'limit' => 5
	],
] );
Kirki::add_field( 'background_workflow_bottom', [
	'type'        => 'image',
	'settings'    => 'background_workflow_bottom_setting_url',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Workflow Bottom.', 'kirki' ),
	'section'     => 'section_four',
	'default'     => '',
] );

Kirki::add_section( 'section_five', array(
    'title'          => esc_html__( 'Section 5 - Design Page', 'kirki' ),
    'description'    => esc_html__( 'Section 5 - Design Page description.', 'kirki' ),
    'panel'          => 'service_page_config',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'title_gvus', [
	'type'     => 'text',
	'settings' => 'title_gvus_setting',
	'label'    => esc_html__( 'Title Give Us', 'kirki' ),
	'section'  => 'section_five',
	'default'  => esc_html__( 'Give Us', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'small_title_yd', [
	'type'     => 'text',
	'settings' => 'small_title_yd_setting',
	'label'    => esc_html__( 'Title Your Damn', 'kirki' ),
	'section'  => 'section_five',
	'default'  => esc_html__( 'Your Damn', 'kirki' ),
	'priority' => 10,
] );