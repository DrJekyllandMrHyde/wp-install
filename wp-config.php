<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/local-config.php' );
} else {
    define( 'WP_LOCAL_DEV', false );
    define( 'DB_NAME', '%%DB_NAME%%' );
    define( 'DB_USER', '%%DB_USER%%' );
    define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
    define( 'DB_HOST', '%%DB_HOST%%' ); // Probably 'localhost'
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
if ( file_exists( __DIR__ . '/salt.php' ) ) {
    require __DIR__ . '/salt.php';
}

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
// ini_set( 'display_errors', 1 );
// define( 'WP_DEBUG_DISPLAY', true );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
if (
    !file_exists( dirname( __FILE__ ) . '/local-config.php' ) &&
    !getenv('WP_DEBUG')
) {
    define( 'WP_DEBUG', false );
    define( 'SCRIPT_DEBUG', false );
} else {
    define( 'WP_DEBUG', true );
    define( 'SCRIPT_DEBUG', true );
}

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
    $memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
