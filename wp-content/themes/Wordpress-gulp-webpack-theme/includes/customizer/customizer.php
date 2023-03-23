<?php
Kirki::add_panel( 'theme_option', array(
    'priority'    => 1,
    'title'       => esc_html__( 'Theme Option', 'vox' ),
) );
/* This is information website*/
Kirki::add_section( 'info_config', array(
    'title'          => esc_html__( 'Cấu hình chung trang web', 'vox' ),
    'description'    => esc_html__( 'Cấu hình chung trang web tại đây', 'vox' ),
    'panel'          => 'theme_option',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'footer_home_heading', [
	'type'        => 'custom',
	'settings'    => 'footer_home_heading_setting',
	'section'     => 'info_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Title Footer Home', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'footer_home_title', [
	'type'     => 'text',
	'settings' => 'footer_home_title_text',
	'label'    => esc_html__( 'Title cho footer Home', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'HO CHI MINH CITY', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_info', [
	'type'        => 'custom',
	'settings'    => 'general_info_headding',
	'section'     => 'info_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Thông tin trang web', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'general_address', [
	'type'     => 'textarea',
	'settings' => 'general_address_text',
	'label'    => esc_html__( 'Địa chỉ', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( '428 Cach Mang Thang 8, Ward 11, Dist 3, Ho Chi Minh city', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_phone', [
	'type'     => 'text',
	'settings' => 'general_phone_text',
	'label'    => esc_html__( 'Số điện thoại', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( '428 Cach Mang Thang 8, Ward 11, Dist 3, Ho Chi Minh city', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_email', [
	'type'     => 'text',
	'settings' => 'general_email_text',
	'label'    => esc_html__( 'Email', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'Contact@voxagency.asia', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_social', [
	'type'        => 'custom',
	'settings'    => 'general_social_headding',
	'section'     => 'info_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Cấu hình mạng xã hội', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'general_fb_link', [
	'type'     => 'text',
	'settings' => 'general_fb_link_text',
	'label'    => esc_html__( 'Facebook Link', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'https://facebook.com/', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_insta_link', [
	'type'     => 'text',
	'settings' => 'general_insta_link_text',
	'label'    => esc_html__( 'instagram Link', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'https://instagram.com/', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_pinterest_link', [
	'type'     => 'text',
	'settings' => 'general_pinterest_link_text',
	'label'    => esc_html__( 'Pinterest Link', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'https://pinterest.com/', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'general_twitter_link', [
	'type'     => 'text',
	'settings' => 'general_twitter_link_text',
	'label'    => esc_html__( 'twitter Link', 'vox' ),
	'section'  => 'info_config',
	'default'  => esc_html__( 'https://twitter.com/', 'vox' ),
	'priority' => 10,
] );
/** This is field setup url */
Kirki::add_section( 'url_config', array(
    'title'          => esc_html__( 'Cấu hình Url', 'vox' ),
    'description'    => esc_html__( 'Cấu hình Url tại đây', 'vox' ),
    'panel'          => 'theme_option',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
Kirki::add_field( 'url_contact', [
	'type'        => 'select',
	'settings'    => 'url_contact_setting',
	'label'       => esc_html__( 'Chọn Url cho trang contact', 'kirki' ),
	'section'     => 'url_config',
	'default'     => '',
	'placeholder' => esc_html__( 'Chọn Trang', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'  	  => Kirki_Helper::get_posts(
			array(
				'posts_per_page' => -1,
				'post_type'      => 'page'
			) ,
	),
] );
/* This is fields vox for home page */
Kirki::add_section( 'home_config', array(
    'title'          => esc_html__( 'Cấu hình trang chủ', 'vox' ),
    'description'    => esc_html__( 'Cấu hình trang chủ tại đây', 'vox' ),
    'panel'          => 'theme_option',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
// Carousel 
Kirki::add_field( 'carousel_heading', [
	'type'        => 'custom',
	'settings'    => 'carousel_heading_setting',
	'section'     => 'home_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Carousel', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'vox_section_one_services_control', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Caoursel', 'vox' ),
    'section'     => 'home_config',
    'priority'    => 10,
    'choices' => array(
        'limit' => 4
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Carousel', 'vox' ),
        'field' => 'link_text',
    ),
    'settings'    => 'carousel_list_setting',
    // Defining Pre-Made Repeater Fields
    'default'     => array(
        array(  
            //Default Image/Fields
            'carousel_image' =>  home_url() . '/dist/images/Artboard 9.png',
            'type_option' => 'image',
        ),
    ),
    'fields' => array(
        'carousel_image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Carousel Image', 'vox' ),
            'default'     =>  '',
            'choices'     => [
                'save_as' => 'id',
            ],
        ),
        'type_option' => array(
            'type'        => 'radio',
            'label'       => esc_attr__( 'Đây là:', 'vox' ),
            'description' => esc_attr__( 'Chọn dạng file upload', 'vox' ),
            'default'     => 'image',
            'choices'     => [
                'image'   => esc_html__( 'Image', 'vox' ),
                'video' => esc_html__( 'Video', 'vox' ),
            ],
        ),
    )
));
// About us
Kirki::add_field( 'about_heading', [
	'type'        => 'custom',
	'settings'    => 'about_heading_setting',
	'section'     => 'home_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'About Us', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'about_home_subtitle', [
	'type'     => 'text',
	'settings' => 'about__home_subtitle_text',
	'label'    => esc_html__( 'About Sub Title', 'vox' ),
	'section'  => 'home_config',
	'default'  => esc_html__( 'We are', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'about_home_title', [
	'type'     => 'text',
	'settings' => 'about__home_title_text',
	'label'    => esc_html__( 'About Title', 'vox' ),
	'section'  => 'home_config',
	'default'  => esc_html__( 'vox', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'about_home_des', [
	'type'        => 'editor',
	'settings'    => 'about_home_description',
	'label'       => esc_html__( 'Description About', 'kirki' ),
	'description' => esc_html__( 'Mô tả cho about', 'kirki' ),
	'section'     => 'home_config',
	'default'     => 'We are a group of communication practitioners whose expertise',
] );
// About us
Kirki::add_field( 'blog_home_heading', [
	'type'        => 'custom',
	'settings'    => 'blog_home_heading_setting',
	'section'     => 'home_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Blog', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'blog_home_title', [
	'type'     => 'text',
	'settings' => 'blog_home_title_text',
	'label'    => esc_html__( 'Title', 'vox' ),
	'section'  => 'home_config',
	'default'  => esc_html__( 'Blog', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'blog_cat', array(
    'type'        => 'select',
    'settings'    => 'blog_cat_select',
    'label'       => __( 'Chọn chuyên mục', 'vox' ),
    'section'     => 'home_config',
    'default'     => 'option-1',
    'priority'    => 10,
    'multiple'    => 999,
    'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
// Services
Kirki::add_field( 'services_home_heading', [
	'type'        => 'custom',
	'settings'    => 'services_home_heading_setting',
	'section'     => 'home_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Our Service', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'services_home_title', [
	'type'     => 'text',
	'settings' => 'services_home_title_text',
	'label'    => esc_html__( 'Title', 'vox' ),
	'section'  => 'home_config',
	'default'  => esc_html__( 'OUR SERVICES', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'vox_services_contro', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Service List', 'vox' ),
    'section'     => 'home_config',
    'priority'    => 10,
    'choices' => array(
        'limit' => 6
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Service', 'vox' ),
        'field' => 'link_text',
    ),
    'settings'    => 'services_list_settin',
    // Defining Pre-Made Repeater Fields
    'default'     => array(
        array(  
			'title_left' => '',
			'title_right' => 'design',
			'description' => 'We will help your business to be professional , clear,  engaging, diferent and  immediately regconize by the customers',
			'image_filter' => home_url() . '/dist/images/design.png',
            'image' =>  home_url() . '/dist/images/design.png',
        ),
    ),
    'fields' => array(
		'title_left' => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Title Left', 'vox' ),
			'default'  => esc_html__( '', 'vox' ),
		),
		'title_right' => array(
			'type'     => 'text',
			'label'    => esc_html__( 'Title Right', 'vox' ),
			'default'  => esc_html__( '', 'vox' ),
		),
		'description' => array(
			'type'     => 'textarea',
			'label'    => esc_html__( 'Description', 'vox' ),
			'default'  => esc_html__( '', 'vox' ),
		),
		'link' => array(
			'type'     => 'radio',
			'label'    => esc_html__( 'Choose Link', 'kirki' ),
			'multiple' => 0,
			'choices'  => Kirki_Helper::get_posts(
				array(
					'posts_per_page' => -1,
					'post_type'      => 'page'
				) ,
			),
		),
        'image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Servies Image', 'vox' ),
            'default'     =>  '',             
		),
		
		// 'image_filter' => array(
        //     'type'        => 'image',
        //     'label'       => esc_attr__( 'Servies Image Filter', 'vox' ),
        //     'default'     =>  '',             
        // ),
    )
));
// Client
Kirki::add_field( 'client_home_heading', [
	'type'        => 'custom',
	'settings'    => 'client_home_heading_setting',
	'section'     => 'home_config',
	'default'         => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Client', 'vox' ) . '</h3>',
	'priority'    => 10,
]);
Kirki::add_field( 'client_home_title', [
	'type'     => 'text',
	'settings' => 'client_home_title_text',
	'label'    => esc_html__( 'Title', 'vox' ),
	'section'  => 'home_config',
	'default'  => esc_html__( 'OUR CLIENTS', 'vox' ),
	'priority' => 10,
] );
Kirki::add_field( 'vox_client_control', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Carousel', 'vox' ),
    'section'     => 'home_config',
    'priority'    => 10,
    'choices' => array(
        'limit' => 8
    ),
    'row_label' => array(
        'type'  => 'field',
        'value' => esc_attr__('Client', 'vox' ),
        'field' => 'link_text',
    ),
    'settings'    => 'client_list_setting',
    // Defining Pre-Made Repeater Fields
    'default'     => array(
        array(  
            //Default Image/Fields
            'image' =>  home_url() . '/dist/images/client-1.png',
            'type_option' => 'image',
        ),
    ),
    'fields' => array(
        'image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Client Logo', 'vox' ),
            'default'     =>  '',
            'choices'     => [
                'save_as' => 'id',
            ],
        ),
    )
));
/*This is fields vox for single product */

Kirki::add_section( 'single_config', array(
    'title'          => esc_html__( 'Thay đổi banner ads', 'vox' ),
    'description'    => esc_html__( 'Thay đổi banner ads tại đây', 'vox' ),
    'panel'          => 'theme_option',
    'priority'       => 160,
    'capability'    => 'edit_theme_options',
) );
/**
 * Default behaviour (saves data as a URL).
 */
Kirki::add_field( 'image_single', [
	'type'        => 'image',
	'settings'    => 'image_single_url',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'single_config',
	'default'     => '',
] );
/*
* Normal customizer for footer image
*/
function diwp_theme_customizer_options($wp_customize){

    $wp_customize->add_setting( 'custom_logo_footer', array(
        'default' => home_url().'/dist/images/logo-header.png', // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer', array(
        'label' => 'Upload Logo Footer',
        'priority' => 10,
        'section' => 'title_tagline',
        'settings' => 'custom_logo_footer',
        'button_labels' => array(// All These labels are optional
            'select' => 'Select Logo',
            'remove' => 'Remove Logo',
            'change' => 'Change Logo',
        )
    )));
	$wp_customize->add_setting( 'custom_logo_footer_child_page', array(
        'default' => home_url().'/dist/images/logo-header.png', // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer_child', array(
        'label' => 'Upload Logo Footer Child',
        'priority' => 10,
        'section' => 'title_tagline',
        'settings' => 'custom_logo_footer_child_page',
        'button_labels' => array(// All These labels are optional
            'select' => 'Select Logo',
            'remove' => 'Remove Logo',
            'change' => 'Change Logo',
        )
    )));

} 
add_action( 'customize_register', 'diwp_theme_customizer_options' );

