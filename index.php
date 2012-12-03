<?php
/*
Plugin Name: PluginChief Twitter Bootstrap Shortcode Generator
Plugin URI: http://pluginchief.com
Description: Implement Twitter Bootstrap into your website with our shortcode generator
Version: 1.0
Author: PluginChief, Jason Bahl, Brandon Camenisch
Author URI: http://pluginchief.com/

 ___ _           _      ___ _    _      __
| _ \ |_  _ __ _(_)_ _ / __| |_ (_)___ / _|
|  _/ | || / _` | | ' \ (__| ' \| / -_)  _|
|_| |_|\_,_\__, |_|_||_\___|_||_|_\___|_|
           |___/*/

// -------------------------------------------------------------------- //
//	Set Up Plugin Constants
// -------------------------------------------------------------------- //

	// NOTE: PLUGINCHIEFTBSC = PluginChief Twitter Bootstrap Shortcodes
	define('PLUGINCHIEFTBSC_URL', plugin_dir_url(__FILE__));
	define('PLUGINCHIEFTBSC_PATH', plugin_dir_path(__FILE__));

// -------------------------------------------------------------------- //
//	Includes
// -------------------------------------------------------------------- //
	if (is_admin()) {

		#updater
		require_once PLUGINCHIEFTBSC_PATH . 'inc/plugin-update-checker.php';
		require_once PLUGINCHIEFTBSC_PATH . 'inc/pluginchief-shortcode-generator.php';

	}
	#require on front-end
	require_once PLUGINCHIEFTBSC_PATH . 'inc/pluginchief-shortcodes.php';

// -------------------------------------------------------------------- //
//	Init the updater
// -------------------------------------------------------------------- //
	function pluginchieftbsc_plugin_updater() {
		if (class_exists('PluginUpdateChecker')) {

			$PluginChieftwitterbootstrap = new PluginUpdateChecker( 'https://pluginchief.com/wp-content/plugins/pluginchief-updatechief/json/pluginchief-twitter-bootstrap-shortcodes.json', __FILE__,'pluginchief-twitter-bootstrap-shortcodes');
		}
	}
	add_action('plugins_loaded','pluginchieftbsc_plugin_updater');

// -------------------------------------------------------------------- //
//	Register | Enqueue : Styles | Scripts DEVELOPMENT ONLY!!!
// -------------------------------------------------------------------- //
	function pluginchieftbsc_scripts_styles() {
		if ( 1 < 2 ){
			wp_register_style('bootstrap_css', PLUGINCHIEFTBSC_URL . 'inc/styles/bootstrap.combined.min.css');
			wp_register_script('bootstrap_js', PLUGINCHIEFTBSC_URL . 'inc/scripts/bootstrap.min.js');
			wp_register_script( 'jquery', '//code.jquery.com/jquery-latest.min.js');

			#wp_register_style('bootstrap_css', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css');
			#wp_register_script('bootstrap_js', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/js/bootstrap.min.js');

			# Enqueue
			#wp_enqueue_style('bootstrap_css');
			#wp_enqueue_script( 'jquery' );
			#wp_enqueue_script('bootstrap_js');
		}
	}
	add_action('wp_enqueue_scripts', 'pluginchieftbsc_scripts_styles');