<?php
/*
Plugin Name:  Twitter Bootstrap Shortcode Generator
Plugin URI: http://brandoncamenisch.com
Description: Implement Twitter Bootstrap into your website with our shortcode generator
Version: 1.0
Author: Brandon Camenisch
Author URI: http://brandoncamenisch.com/
*/

// -------------------------------------------------------------------- //
//	Set Up Plugin Constants
// -------------------------------------------------------------------- //

	// NOTE: PLUGINNINJATBSC = PluginNinja Twitter Bootstrap Shortcodes
		define('PLUGINNINJATBSC_URL', plugin_dir_url(__FILE__));
		define('PLUGINNINJATBSC_PATH', plugin_dir_path(__FILE__));

// -------------------------------------------------------------------- //
//	Includes
// -------------------------------------------------------------------- //
	if (is_admin()) {
		require_once PLUGINNINJATBSC_PATH . 'inc/pluginninja-shortcode-generator.php';
	}
	#require on front-end
	require_once PLUGINNINJATBSC_PATH . 'inc/pluginninja-shortcodes.php';

// -------------------------------------------------------------------- //
//	Register | Enqueue : Styles | Scripts DEVELOPMENT ONLY!!!
// -------------------------------------------------------------------- //
	function pluginninjatbsc_scripts_styles() {
		if ( 1 < 2 ){
			wp_register_style('bootstrap_css', PLUGINNINJATBSC_URL . 'inc/styles/bootstrap.combined.min.css');
			wp_register_script('bootstrap_js', PLUGINNINJATBSC_URL . 'inc/scripts/bootstrap.min.js');
			wp_register_script( 'jquery', '//code.jquery.com/jquery-latest.min.js');

			#wp_register_style('bootstrap_css', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css');
			#wp_register_script('bootstrap_js', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/js/bootstrap.min.js');

			# Enqueue
			#wp_enqueue_style('bootstrap_css');
			#wp_enqueue_script( 'jquery' );
			#wp_enqueue_script('bootstrap_js');
		}
	}
	add_action('wp_enqueue_scripts', 'pluginninjatbsc_scripts_styles');