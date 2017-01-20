<?php
/**
 * Plugin Name: Wordpress Fingerprint Nuke
 * Plugin URI: http://munir.skilledsoft.com
 * Description: This plugin Does some various modifications to wordpress on the frontend to reduce the fingerprint that you are using wordpress, It does this without you modifying your theme files. The things it does include: 
 - REMOVE wordpress emoji script
 - REMOVE RSD link header 
 - REMOVE feed links
 - REMOVE comments feed
 - REMOVE meta generator
 - REMOVE wordpress version appended in scripts
 - Disables wordpress REST API 
 - Disable wordpress user enumeration
 * Version: 1.0.0
 * Author: Munir Njiru
 * Author URI: http://munir.skilledsoft.com
 * License: GPL2
 */
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );	
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action ('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head','rest_output_link_wp_head');
remove_action( 'wp_head','wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0);
remove_action( 'wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 ); 
add_filter( 'json_enabled', '__return_false' );
add_filter( 'json_jsonp_enabled', '__return_false' );
add_filter('rest_enabled', '_return_false');
add_filter('rest_jsonp_enabled', '_return_false');
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
if (!is_admin()) {
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) wp_redirect( home_url() );
	add_filter('redirect_canonical', 'aliens_check_enumeration', 10, 2);
}
function aliens_check_enumeration($redirect, $request) {
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) wp_redirect( home_url() ); 
	else return $redirect;
}
