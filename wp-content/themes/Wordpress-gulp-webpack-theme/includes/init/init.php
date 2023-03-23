<?php 
class _themname_init{
    function __construct() {
        add_filter('show_admin_bar', '__return_false');
        add_action('wp_head',array( $this, '_themename_enqueue_scripts' ), 100, 0);
        add_action('after_setup_theme', array( $this, 'theme_features' ));
        add_action('wp_enqueue_scripts', array( $this, '__themename_optimize_scripts' ));
        add_filter('jpeg_quality', function($arg){return 70;});
        add_filter('png_quality', function($arg){return 70;});
        add_filter('use_block_editor_for_post', '__return_false');
        add_image_size('new-img',300, 300 ,TRUE);
        add_action( 'init', array( $this, 'disable_emojis' ));
        add_action( 'widgets_init', array( $this, 'my_unregister_widgets' ));
        add_action( 'wp_footer', array( $this, 'my_deregister_scripts' ));
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        add_filter('xmlrpc_enabled', '__return_false');
        remove_action( 'wp_head',array( $this, 'my_deregister_scripts'));
        add_action( 'init', array( $this, 'stop_heartbeat'), 1 );
        add_action('admin_init',array( $this, '_themename_remove_dashboard_widgets'));
        add_action( 'wp_before_admin_bar_render', array( $this, '_themname_remove_admin_bar_links'));
        add_action( 'admin_menu', array( $this, '_themename_remove_menus'), 999 );
        add_action('login_head', array($this,'custom_login_logo'));
        add_filter('login_headerurl', array($this,'change_wp_login_url'));
        add_action( 'wp_loaded', array($this,'redirect_to_truly_admin_page'), 9);        
        add_filter( 'kirki/config', array($this,'kirki_demo_configuration') );
        add_action( 'admin_enqueue_scripts', array($this,'add_css_to_admin') );
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        
    }
     // Import feauture images
    function theme_features() {
        register_nav_menus(
            array(
                'main_nav'           => 'Menu Main',
                'carousel_nav'       => 'Menu Carousel',
                'footer_nav'         => 'Menu Footer',
                'mobile_nav'         => 'Menu Mobile',
                'job_nav'            => 'Job Menu',
                'hambuger_nav'       => 'Hambuger Menu'
            ));
    add_theme_support('title-tag');
    }

    function _themename_enqueue_scripts(){ 
    $script = "var apiObject = " . wp_json_encode(array('homeUrl' => home_url(),'rootapiurl' => rest_url(),'nonce' => wp_create_nonce('wp_rest'))). ';';
    if ( ! empty( $data ) ) {
        $script = "$data\n$script";
    }
    _e("\n<script type=\"text/javascript\">\n $script \n</script>\n",'_themename');
    _e('<script defer type="text/javascript" src="'.home_url()."/dist/js/root.js".'"></script>', '_themename');
    }
    function __themename_optimize_scripts() {
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-migrate');
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style('mc4wp-form-themes');
        wp_deregister_style('mc4wp-form-themes');
        wp_enqueue_style( 'dashicons' );
    }
    
    function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }
    function my_unregister_widgets() {
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_RSS');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Nav_Menu_Widget');
    }
    function my_deregister_scripts(){
        wp_dequeue_script( 'wp-embed' );
    }
    function stop_heartbeat() {
        wp_deregister_script('heartbeat');
    }
    function _themename_remove_dashboard_widgets() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // plugins
        remove_meta_box('dashboard_quick_press', 'dashboard', 'normal'); // quick press
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); // recent drafts
        remove_meta_box('dashboard_primary', 'dashboard', 'normal'); // wordpress blog
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // other wordpress news
    }
    function _themname_remove_admin_bar_links() {
        global $wp_admin_bar;
          $wp_admin_bar->remove_menu('wp-logo');          /** Remove the WordPress logo **/
          $wp_admin_bar->remove_menu('wporg');            /** Remove the WordPress.org link **/
          $wp_admin_bar->remove_menu('documentation');    /** Remove the WordPress documentation link **/
          $wp_admin_bar->remove_menu('support-forums');   /** Remove the support forums link **/
          $wp_admin_bar->remove_menu('feedback');         /** Remove the feedback link **/
          //$wp_admin_bar->remove_menu('view-site');        /** Remove the view site link **/
          //$wp_admin_bar->remove_menu('wpseo-menu');        /** Remove the view site link **/
        //  $wp_admin_bar->remove_menu('updates');          /** Remove the updates link **/
          $wp_admin_bar->remove_menu('comments');         /** Remove the comments link **/
          //$wp_admin_bar->remove_menu('new-content');      /** Remove the content link **/
    }
    function _themename_remove_menus() {
        //remove_menu_page( 'upload.php');
        //remove_menu_page( 'edit-comments.php' );
        //remove_menu_page( 'themes.php');
        //remove_menu_page( 'plugins.php');
        //remove_menu_page( 'users.php');
       // remove_menu_page( 'tools.php');
        //remove_menu_page( 'options-general.php');
       // remove_menu_page( 'wpseo_dashboard');
       //  remove_menu_page( 'wpcf-cpt');
        //remove_submenu_page( 'themes.php', 'theme-editor.php');
       // remove_submenu_page( 'plugins.php', 'plugin-editor.php');
    }

    function kirki_demo_configuration() {
        $args = array(
            'url_path'      => home_url() . '/plugins/kirki',
        );
        return $args;
    
    }

    function custom_login_logo() {
        echo '<style type="text/css">
            body{
            background: #f0ebeb2e;
            color:#2288a1;
            }
            #login{
            width:450px;
            }
            .login form{
            padding: 60px 50px;
            background: #4fb4c624;
            border: 1px solid #e3f1f4;
            box-shadow: 0 1px 15px 10px rgba(158, 158, 158, 0.27);
            }
            .login label{
            font-weight: 600;
            font-size: 16px;
            }
            .login h1 a {
            background-image: url('.get_bloginfo('template_directory').'/thumb.jpg);
            background-size: cover;
            height:250px;
            width:80%;
            }
            .wp-core-ui .button, .wp-core-ui .button-secondary{
            color:#267f97;
            }
            .wp-core-ui .button-primary{
            background: #1b6081;
            border-color: #1f738e;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            }
            .login .wp-pwd{
            margin-bottom: 20px;
            }
            .login #backtoblog a, .login #nav a{
            display:none;
            }
        </style>';
    }
    function change_wp_login_url() {
        return "http://wolfactive.net/";
    }
    function redirect_to_truly_admin_page() {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
        if ( $actual_link == home_url().'/wp-admin' ) {
            wp_redirect( home_url() .'/wordpress/wp-admin' ); 
            exit;
        }	
    }
    function add_css_to_admin(){
        wp_enqueue_style('vox_admin', home_url() . '/dist/css/main.css');
    }
}
new _themname_init();

