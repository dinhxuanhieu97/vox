<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //

$whitelist = array(
    '127.0.0.1',
    '::1'
);


if ( in_array($_SERVER['REMOTE_ADDR'], $whitelist) ) {
    define( 'WP_ENVIRONMENT_TYPE', 'development' );
}else{
    define( 'WP_ENVIRONMENT_TYPE', 'production' );
}


if ( in_array($_SERVER['REMOTE_ADDR'], $whitelist) ) {
    // setup database connection for local host
    /*----------------------------------------*/ 
    /** The name of the database for WordPress */
    define( 'DB_NAME', 'wp-vox' );
    /** MySQL database username */
    define( 'DB_USER', 'root' );
    /** MySQL database password */
    define( 'DB_PASSWORD', '' );
    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' );

    define( 'DB_CHARSET', 'utf8' );

    define( 'DB_COLLATE', '' );

    define( 'DB_COLLATE', 'utf8_general_ci' );
}else{
    // setup database connection for server
    /*----------------------------------------*/
    /** The name of the database for WordPress */
    define( 'DB_NAME', 'wp_vox' );
    /** MySQL database username */
    define( 'DB_USER', 'vox' );
    /** MySQL database password */
    define( 'DB_PASSWORD', 'Wolfctive@2021' );
    /** MySQL hostname */
    define( 'DB_HOST', 'localhost' ); 

    define( 'DB_CHARSET', 'utf8' );

    define( 'DB_COLLATE', '' );

    define( 'DB_COLLATE', 'utf8_general_ci' );
}


define('AUTH_KEY',         'fSaiDDe$}-C^{L_}GO38d{BDwE`yctSFo_eL5nD:.j-TWP4)VtA5E?x/NdEJR~9A');
define('SECURE_AUTH_KEY',  '*6s||`@`/X+fqlFGBS^ZTRrXY546K9q-Z>n>M-1iAaKk/4CfEPu@mHnOFd)Jp{44');
define('LOGGED_IN_KEY',    '(3;H5p,W-cAVF;#jSnzf:P;nCB8+P+/*@cB(q{SJ1o6e-qa9f0J2#+[~hQrIyJ=m');
define('NONCE_KEY',        'jvsMYRG#N=H(JPI:$|cuBA/Wjq(Z,gC>()gYSC |_oLS{A}Jl+f^4@ LN0zR||o(');
define('AUTH_SALT',        '|im65>mm/H9Aqq-h&jp1/&K){]]UCU(@Up+Hr*i-FrpU0*;6BCDyN4!q79Z+-]q^');
define('SECURE_AUTH_SALT', '#s-PFT>#MOMyM:6?/,BOO-DHN8e|m+5(|{I8*~?Eh=tQmAjK-A)~8{.2-J$YB[ J');
define('LOGGED_IN_SALT',   '4,./J#`JY`*N^?p>k,LEoV?Wi eqtfpf$^^<+M<{*c~Jb~iB|Qd2-gGi%Fty[~ZH');
define('NONCE_SALT',       '-D6sgfcOF&t]DM.5!P}YYgLK1IbHm:K1+]|v$Q;Jq]caj<T+j^x0#~]hV>_ZH|^U');


$table_prefix = 'wp_';

// debug option
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );
define( 'WP_DEBUG', true ); // Or false
if ( WP_DEBUG ) {
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', false );
    @ini_set( 'display_errors', 0 );
}

// folder store project
$folder_storage = 'vox';
// check and setup environment 
if ( in_array($_SERVER['REMOTE_ADDR'], $whitelist) ) {
    $domain = 'localhost/'.$folder_storage;
}else{
    $domain = '';
}

if ( in_array($_SERVER['REMOTE_ADDR'], $whitelist) ) {
    $httpHost =  $domain;
}else{
    $httpHost =  isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $domain;
}
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $httpHost . '/wp-content' );
define( 'UPLOADS', './uploads' );
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/plugins' );
define( 'WP_PLUGIN_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $httpHost . '/plugins' );


// setup cache for environment
if ( in_array($_SERVER['REMOTE_ADDR'], $whitelist) ) {
    define( 'WP_CACHE', false );
}else{
    define( 'WP_CACHE', true );
}
// empty trash in 30 days
define( 'EMPTY_TRASH_DAYS', 30 ); // 30 days
//Automatic Database Optimizing 
define( 'WP_ALLOW_REPAIR', true );


// disable Disable the Plugin and Theme Editor base on environment
define( 'DISALLOW_FILE_EDIT', false );
// Require SSL for Admin and Logins 
define( 'FORCE_SSL_ADMIN', false );

// Block External URL Requests 
define( 'WP_HTTP_BLOCK_EXTERNAL', false );
// hostnames to allow to be Requests 
//define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.github.com' );
//Cleanup Image Edits 
define( 'IMAGE_EDIT_OVERWRITE', true );

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') ) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress');
}
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');