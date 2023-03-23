<?php  
/**
 * Register Menu Website
 */
function vox_create_page_menu_web_site() {
    add_menu_page(
        __( 'Menu Hamburger Setting', 'vox' ),
        'Hamburger',
        'manage_options',
        'hamburger-seting',
        'menu_page_content_setting',
        get_theme_file_uri('./includes/vendors/images/apps.svg'),
        2
    );
}
add_action( 'admin_menu', 'vox_create_page_menu_web_site' );

function menu_page_content_setting(){
    include_once(get_template_directory().'/includes/vendors/templates/hamburger.php');
}

add_action( 'admin_enqueue_scripts', 'misha_include_js' );
function misha_include_js() {
	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
    }
}
