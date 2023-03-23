<?php 
//  add_action( 'phpmailer_init', function( $phpmailer ) {
//     if ( !is_object( $phpmailer ) )
//     $phpmailer = (object) $phpmailer;
//      $phpmailer->Mailer     = 'smtp';
//      $phpmailer->Host       = 'smtp.gmail.com';
//      $phpmailer->SMTPAuth   = 1;
//      $phpmailer->Port       = 587;
//     $phpmailer->Username   = 'Cskh.mail.stealsneaker@gmail.com';
//     $phpmailer->Password   = 'Stealneaker@2020';
//     $phpmailer->SMTPSecure = 'SSL';
//     $phpmailer->From       = 'cskh.stealsneaker@gmail.com';
//     $phpmailer->FromName   = 'Stealsneaker';
// });
//
// add_action('wp_ajax_Action_Sendmail', 'Action_Sendmail');
// add_action('wp_ajax_nopriv_Action_Sendmail', 'Action_Sendmail');
// function Action_Sendmail() {
//     if(isset($_POST['email']) && $_POST['email']){
//         // $firstName  = $_POST['firstName'];
//         // $lastName  = $_POST['lastName'];
//     	  // $email      = sanitize_email($_POST["email"]);
//         // $phone      = $_POST['phone'];
//         // $company   = $_POST['company'];
//         // $comment  = $_POST['comment'];
//         $headers[]  = 'From: Stealsneaker';
//         $headers[]  = 'Content-Type: text/html; charset=UTF-8';
//         $message    =  "Test thôi";
//         wp_mail( 'Cskh.mail.stealsneaker@gmail.com', 'Stealsneaker', $message, $headers);
//         echo json_encode(array('status' => 1));
//     }
// die(); }

// function itsme_disable_feed() {
//   $homepage = home_url();
//   wp_redirect($homepage);
// }
// add_action('do_feed', 'itsme_disable_feed', 1);
// add_action('do_feed_rdf', 'itsme_disable_feed', 1);
// add_action('do_feed_rss', 'itsme_disable_feed', 1);
// add_action('do_feed_rss2', 'itsme_disable_feed', 1);
// add_action('do_feed_atom', 'itsme_disable_feed', 1);
// add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
// add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
// remove_action( 'wp_head', 'feed_links_extra', 3 );
// remove_action( 'wp_head', 'feed_links', 2 );
// add link video preload head tag
// function add_link_video_preload(){
//     if(is_front_page()):
//       $aboutVideo = the_field('about_video_background','option');
//       $carouselVideo = the_field('carousel_video_background','option');
//       if($aboutVideo):
//        echo '<link rel="preload" href="'.$aboutVideo.'" as="video" type="video/mp4">';
//       elseif ($carouselVideo):
//        echo '<link rel="preload" href="'.$carouselVideo.'" as="video" type="video/mp4">';
//       endif;
//      elseif(is_page('about-us')) :
//        $aboutPageVideo= the_field('carousel_video_background');
//        if($aboutPageVideo):
//        echo'<link rel="preload" href="'.$aboutPageVideo.'" as="video" type="video/mp4">';
//       endif;
//      endif;
// }
// chèn code vào header

// add_action( 'wp_head', 'hk_addcode_header' );
// function hk_addcode_header(){
// 	the_field('google_analytic','option');
// }s




// if( !defined('ACF_LITE') ) define('ACF_LITE',true);
//   if( !function_exists('redirect_404_to_homepage') ){
//
//     add_action( 'template_redirect', 'redirect_404_to_homepage' );
//
//     function redirect_404_to_homepage(){
//        if(is_404()):
//             wp_safe_redirect( site_url('trang-404') );
//             exit;
//         endif;
//     }
// }
// function custom_login_logo() {
// 	echo '<style type="text/css">
// 	body{
// 		background: #f0ebeb2e;
// 		color:#2288a1;
// 	}
// 	#login{
// 		width:450px;
// 	}
// 	.login form{
// 	padding: 60px 50px;
// 	background: #4fb4c624;
//     border: 1px solid #e3f1f4;
//     box-shadow: 0 1px 15px 10px rgba(158, 158, 158, 0.27);
// 	}
// 	.login label{
// 	font-weight: 600;
// 	font-size: 16px;
// 	}
// 	.login h1 a {
// 	background-image: url('.get_bloginfo('template_directory').'/assets/images/Logo.svg);
// 	background-size: cover;
// 	height:250px;
// 	width:80%;
// 	}
// 	.wp-core-ui .button, .wp-core-ui .button-secondary{
// 		color:#267f97;
// 	}
// 	.wp-core-ui .button-primary{
// 	background: #1b6081;
//     border-color: #1f738e;
// 	font-size: 18px;
//     font-weight: 600;
// 	color: #fff;
// 	}
// 	.login .wp-pwd{
// 	margin-bottom: 20px;
// 	}
// 	.login #backtoblog a, .login #nav a{
// 		display:none;
// 	}
// </style>';
// }
// add_action('login_head', 'custom_login_logo');
//
// function change_wp_login_url() {
// 	return "http://wolfactive.net/";
// }
// add_filter('login_headerurl', 'change_wp_login_url');
// function remove_footer_admin () {
//
// echo '<p>Designed by <a href="http://wolfactive.net/" target="_blank" style="font-weight:600">Wolfactive</a></p>';
//
// }
//
// add_filter('admin_footer_text', 'remove_footer_admin');
//
// // Stop Login by email
// remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );
// // Remove Welcome Panel
// remove_action('welcome_panel', 'wp_welcome_panel');
//
// function remove_dashboard_widgets() {
//
//   remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
//   remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
//   remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
//   remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
//   remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
//   remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
//   remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
//   remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
//
// }
// //
// add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
//
// // Add a new widget to the dashboard using a custom function
// function wpmudev_add_dashboard_widgets() {
// wp_add_dashboard_widget(
//   'wpmudev_dashboard_widget', // Widget slug
//   'Welcome', // Widget title
//   'wpmudev_new_dashboard_widget_function' // Function name to display the widget
// );
// }
// // Register the new dashboard widget with the 'wp_dashboard_setup' action
// add_action( 'wp_dashboard_setup', 'wpmudev_add_dashboard_widgets' );
//
// // Initialize the function to output the contents of your new dashboard widget
// function wpmudev_new_dashboard_widget_function() {
// $link =get_bloginfo('template_directory');
// echo '
// <h1>Chào mừng đến với Admin Dashboard của Wolfactive</h1>
// <p>
//   <img src="'.$link.'/assets/images/Logo.svg" style="max-width:100%" />
// </p>
// ';
// }
// add_filter( 'wpseo_sitemap_post_single_change_freq', 'my_custom_post_freq', 10, 2 );
// function my_custom_post_freq( $default, $url ) {
// return hourly;
// }

