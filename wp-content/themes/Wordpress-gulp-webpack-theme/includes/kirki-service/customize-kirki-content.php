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

Kirki::add_panel( 'service_page_config_ct', array(
    'priority'    => 1,
    'title'       => esc_html__( 'Service Page Content Config', 'kirki' ),
    'description' => esc_html__( 'Service Page Design description', 'kirki' ),
) );
Kirki::add_section( 'section_one_ct', array(
    'title'          => esc_html__( 'Section 1 - Content Page', 'kirki' ),
    'description'    => esc_html__( 'Section 1 - Content Page description.', 'kirki' ),
    'panel'          => 'service_page_config_ct',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );

Kirki::add_field( 'big_title_page_ct', [
	'type'     => 'text',
	'settings' => 'big_title_design_page_setting_ct',
	'label'    => esc_html__( 'Big Title Page', 'kirki' ),
	'section'  => 'section_one_ct',
	'default'  => esc_html__( 'design', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'design_text_desc_left_ct', [
	'type'     => 'textarea',
	'settings' => 'design_text_desc_left_setting_ct',
	'label'    => esc_html__( 'Description Left', 'kirki' ),
	'section'  => 'section_one_ct',
	'default'  => esc_html__( 'We will help your business <br> to be professional , mmedi- <br> ately regconize by the cus- <br> tomLorem ipsum dolor sit', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'design_text_desc_right_ct', [
	'type'     => 'textarea',
	'settings' => 'design_text_desc_right_setting_ct',
	'label'    => esc_html__( 'Description Right', 'kirki' ),
	'section'  => 'section_one_ct',
	'default'  => esc_html__( 'We will help your business to be professional , clear,  en- <br> gaging, diferent and  immediately regconize by the custom- <br> ers Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_section( 'section_two_ct', array(
    'title'          => esc_html__( 'Section 2 - Content Page', 'kirki' ),
    'description'    => esc_html__( 'Section 2 - Content Page description.', 'kirki' ),
    'panel'          => 'service_page_config_ct',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'mc_project_repeater_ct', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_two_ct',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'mc_project_repeater_setting_ct',
	'fields' => [
		'mc_title_custom_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title No Background', 'kirki' ),
			'description' => esc_attr__( 'Title', 'kirki' ),
		],
		'mc_title_bg_custom_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title Background White', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'mc_desc_custom_ct' => [
			'type'        => 'textarea',
			'label'       => esc_attr__( 'Description Workflow', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
		'mc_img_project_ct' => [
			'type'        => 'image',
			'label'       => esc_attr__( 'Image Project', 'kirki' ),
			'description' => esc_attr__( 'Image', 'kirki' ),
		],
		'mc_link_custom_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Link Project', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
	],
	'default'     => [
		[
			'mc_title_custom_ct' => esc_attr__( 'Logo', 'kirki' ),
			'mc_title_bg_custom_ct' => esc_attr__( 'Landing page', 'kirki' ),
			'mc_desc_custom_ct' => esc_attr__( 'Lorem Ipsum Dolor Sit Amet, Consectetuer Adipiscing Elit, Sed Diam Nonummy Nibh Euismod Tincidunt Ut Laoreet Dolore Magna Aliquam Erat Volutpat.', 'kirki' ),
			'mc_img_project_ct' => '',
			'mc_link_custom_ct' => '',
		],
	],
] );

Kirki::add_section( 'section_three_ct', array(
    'title'          => esc_html__( 'Section 3 - Content Page', 'kirki' ),
    'description'    => esc_html__( 'Section 3 - Content Page description.', 'kirki' ),
    'panel'          => 'service_page_config_ct',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'img_bg_sec_3_ct', [
	'type'        => 'image',
	'settings'    => 'img_bg_sec_3_setting_ct',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Top Light.', 'kirki' ),
	'section'     => 'section_three_ct',
	'default'     => '',
] );
Kirki::add_field( 'bd_reater_ct', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_three_ct',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'bd_reater_setting_ct',
	'fields' => [
		'bd_immg_light_ct' => [
			'type'        => 'image',
			'label'       => esc_attr__( 'Image', 'kirki' ),
			'description' => esc_attr__( 'image', 'kirki' ),
		],
		'bd_name_page_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title ', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'bd_link_light_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Link', 'kirki' ),
			'description' => esc_attr__( 'link', 'kirki' ),
		],
		'bd_check_active_light_ct' => [
			'type'        => 'checkbox',
			'label'       => esc_attr__( 'Check active', 'kirki' ),
			'description' => esc_attr__( 'active', 'kirki' ),
		],
		'bd_text_check_active_light_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Check active', 'kirki' ),
			'description' => esc_attr__( 'active', 'kirki' ),
		],
	],
	'default'     => [
		[
			'bd_immg_light_ct' => '',
			'bd_name_page_ct' => esc_attr__( 'Design', 'kirki' ),
			'bd_link_light_ct' => '#',
			'bd_check_active_light_ct' => '',
			'bd_text_check_active_light_ct' => esc_attr__( 'active', 'kirki' ),

		],
	],
] );

Kirki::add_section( 'section_four_ct', array(
    'title'          => esc_html__( 'Section 4 - Content Page', 'kirki' ),
    'description'    => esc_html__( 'Section 4 - Content Page description.', 'kirki' ),
    'panel'          => 'service_page_config_ct',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'background_workflow_ct', [
	'type'        => 'image',
	'settings'    => 'background_workflow_setting_url_ct',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Workflow.', 'kirki' ),
	'section'     => 'section_four_ct',
	'default'     => '',
] );
Kirki::add_field( 'workflow_repeater_ct', [
	'type'        => 'repeater',
	'label'       => esc_attr__( 'WorkFlow Repeater', 'kirki' ),
	'section'     => 'section_four_ct',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Your Custom Value.', 'kirki' ),
		'field' => 'link_text',
	],
	'settings'    => 'workflow_repeater_setting_ct',
	'fields' => [
		'number_workflow_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Number Workflow', 'kirki' ),
			'description' => esc_attr__( 'number', 'kirki' ),
		],
		'small_title_workflow_ct' => [
			'type'        => 'text',
			'label'       => esc_attr__( 'Title Workflow', 'kirki' ),
			'description' => esc_attr__( 'title', 'kirki' ),
		],
		'description_workflow_ct' => [
			'type'        => 'textarea',
			'label'       => esc_attr__( 'Description Workflow', 'kirki' ),
			'description' => esc_attr__( 'Description', 'kirki' ),
		],
	],
	'default'     => [
		[
			'number_workflow_ct' => esc_attr__( '1', 'kirki' ),
			'small_title_workflow_ct' => esc_attr__( 'listen to the customers', 'kirki' ),
			'description_workflow_ct' => esc_attr__( 'We always willing to learn the brands desire to help your brand achieve the goals.', 'kirki' ),
		],
	],
	'choices' => [
		'limit' => 5
	],
] );
Kirki::add_field( 'background_workflow_bottom_ct', [
	'type'        => 'image',
	'settings'    => 'background_workflow_bottom_setting_url_ct',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Bakcground Workflow Bottom.', 'kirki' ),
	'section'     => 'section_four_ct',
	'default'     => '',
] );

Kirki::add_section( 'section_five_ct', array(
    'title'          => esc_html__( 'Section 5 - Content Page', 'kirki' ),
    'description'    => esc_html__( 'Section 5 - Content Page description.', 'kirki' ),
    'panel'          => 'service_page_config_ct',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'title_gvus_ct', [
	'type'     => 'text',
	'settings' => 'title_gvus_setting_ct',
	'label'    => esc_html__( 'Title Give Us', 'kirki' ),
	'section'  => 'section_five_ct',
	'default'  => esc_html__( 'Give Us', 'kirki' ),
	'priority' => 10,
] );
Kirki::add_field( 'small_title_yd_ct', [
	'type'     => 'text',
	'settings' => 'small_title_yd_setting_ct',
	'label'    => esc_html__( 'Title Your Damn', 'kirki' ),
	'section'  => 'section_five_ct',
	'default'  => esc_html__( 'Your Damn', 'kirki' ),
	'priority' => 10,
] );