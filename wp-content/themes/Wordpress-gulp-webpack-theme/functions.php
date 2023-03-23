<?php
/*
*  GLOBAL VARIABLES
*/
define( 'THEME_DIR', get_stylesheet_directory() );
define( 'THEME_URL', get_stylesheet_directory_uri() );
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
function admin_notice_kirki_error() {
    $class = 'notice notice-error';
    $message = __( 'Kirki chưa cài. Vui lòng cài Kirki vào để kích hoạt theme', 'vox' );
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}
function admin_notice_kirki_addon_error() {
    $class = 'notice notice-error';
    $message = __( 'Customize Kirki Variants chưa cài. Vui lòng cài Customize Kirki Variants vào để kích hoạt theme', 'vox' );
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}
function admin_notice_kirki_n_addon_error() {
    $class = 'notice notice-error';
    $message = __( 'Customize Kirki Variants và Kirki chưa cài. Vui lòng cài Customize Kirki Variants và Kirki vào để kích hoạt theme', 'vox' );
    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
}

if(!is_plugin_active('kirki/kirki.php') && !is_plugin_active('customize-kirki-variants/customize-kirki-variants.php')){
    add_action( 'admin_notices', 'admin_notice_kirki_n_addon_error' );    
    return false;
}

if(!is_plugin_active('kirki/kirki.php')){
    add_action( 'admin_notices', 'admin_notice_kirki_error' );    
    return false;
}

if(!is_plugin_active('customize-kirki-variants/customize-kirki-variants.php')){
    add_action( 'admin_notices', 'admin_notice_kirki_addon_error' );    
    return false;
}


/*
*  INCLUDED FILES
*/

$file_includes = [
    'includes/init/init.php',
    'includes/setting/theme-setup.php',                         // General theme setting
    'includes/setting/crop-image.php',                           // Resize image
    'includes/widgets/widget-config.php',                        // Widget Config
    'includes/setting/config-style.php',                        // style admin config
    'includes/api/api.php',                                     // Api Config
    'includes/customizer/customizer.php',                       // customizer banner ads
    'includes/customizer/shortcode.php',                       // Form shortcode
    'includes/kirki-service/customize-kirki-design.php',
    'includes/kirki-service/customize-kirki-content.php',
    'includes/kirki-service/customize-kirki-event.php',
    'includes/kirki-service/customize-kirki-strategy.php',
    'includes/kirki-service/customize-kirki-visual.php',
    'includes/kirki-service/customize-kirki-website.php',
    'includes/init/init-menu.php',                              // Create Menu Page Setting
];


foreach ( $file_includes as $file ) {
    if ( !$filePath = locate_template( $file ) ) {
        trigger_error( sprintf( __( 'Missing included file' ), $file ), E_USER_ERROR );
    }

    require_once $filePath;
}
unset( $file, $filePath );
//marcus post views

function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}

function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = ( int ) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}

function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}

function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views' ) {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

/**
 * warning_theme_active
 *
 * @return void
 */
function warning_theme_active(){
    if(!is_plugin_active('kirki/kirki.php') || !is_plugin_active('customize-kirki-variants/customize-kirki-variants.php')){
        echo '<h1 style="text-align:center">Kirki hoặc Customize Kirki Variants chưa cài. Vui lòng cài và kich hoạt để theme hoạt động</h1>';
        echo '<h2 style="text-align:center; color:#1c6182">Trang web được phát triển và duy trì bởi <a href="https://wolfactive.dev/" >WolfActive</a></h2>';
        die;
    }
}
if( !function_exists('redirect_404_to_homepage') ){
    add_action( 'template_redirect', 'redirect_404_to_homepage' );

    function redirect_404_to_homepage(){
        if(is_404()):
            wp_safe_redirect( home_url() );
            exit;
        endif;
    }
}

function remove_footer_admin () {
    echo '<p>Designed by <a href="http://wolfactive.net/" target="_blank" style="font-weight:600">Wolfactive</a></p>';
}

add_filter('admin_footer_text', 'remove_footer_admin');
  // Stop Login by email
remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );
  // Remove Welcome Panel
remove_action('welcome_panel', 'wp_welcome_panel');
/**
   * remove_dashboard_widgets
   *
   * @return void
   */
function remove_dashboard_widgets() {

    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
}
  //
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

  // Add a new widget to the dashboard using a custom function
/**
   * wpmudev_add_dashboard_widgets
   *
   * @return void
   */
function wpmudev_add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'wpmudev_dashboard_widget', // Widget slug
        'Welcome', // Widget title
        'wpmudev_new_dashboard_widget_function' // Function name to display the widget
    );
}
  // Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action( 'wp_dashboard_setup', 'wpmudev_add_dashboard_widgets' );

  // Initialize the function to output the contents of your new dashboard widget
/**
   * wpmudev_new_dashboard_widget_function
   *
   * @return void
   */
function wpmudev_new_dashboard_widget_function() {
    $link =get_bloginfo('template_directory');
    echo '
    <h1>Chào mừng đến với Admin Dashboard của Wolfactive</h1>
    <p>
        <img src="'.$link.'/thumb.jpg" style="max-width:100%" />
    </p>
    ';
}

function get_post_articles($id,$postShow) {
    $args = array(
        'post_status' => 'published',
        'cat' => $id,
        'post_type' => 'post',
        'showposts' => $postShow,
    );
    $the_query = new WP_Query($args);
    $count = 0;
    while ($the_query-> have_posts()):
        $the_query->the_post();
        get_template_part('sections/archive-categories/post-item');
    endwhile;
    wp_reset_postdata();
}

//   add_filter( 'wpseo_sitemap_post_single_change_freq', 'my_custom_post_freq', 10, 2 );
//   /**
//    * my_custom_post_freq
//    *
//    * @param  mixed $default
//    * @param  mixed $url
//    * @return void
//    */
//   function my_custom_post_freq( $default, $url ) {
//   return hourly;
//   }
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
add_filter('xmlrpc_enabled', '__return_false');
remove_action( 'wp_head', 'wp_generator' );
add_action( 'init', 'stop_heartbeat', 1 );