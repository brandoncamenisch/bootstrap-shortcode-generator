<?php
/*
Plugin Name: MountaiNinja Twitter Bootstrap Shortcode Generator
Plugin URI: http://mountaininja.com
Description: Implement Twitter Bootstrap into your website with our shortcode generator
Version: 1.0
Author: MountaiNinja, Brandon Camenisch
Author URI: http://brandoncamenisch.com/

 ___ _           _      ___ _    _      __
| _ \ |_  _ __ _(_)_ _ / __| |_ (_)___ / _|
|  _/ | || / _` | | ' \ (__| ' \| / -_)  _|
|_| |_|\_,_\__, |_|_||_\___|_||_|_\___|_|
           |___/*/

// -------------------------------------------------------------------- //
//	Set Up Plugin Constants
// -------------------------------------------------------------------- //

	// NOTE: MOUNTAININJATBSC = MountaiNinja Twitter Bootstrap Shortcodes
	define('MOUNTAININJATBSC_URL', plugin_dir_url(__FILE__));
	define('MOUNTAININJATBSC_PATH', plugin_dir_path(__FILE__));

// -------------------------------------------------------------------- //
//	Includes
// -------------------------------------------------------------------- //
	if (is_admin()) {

		#updater
		require_once MOUNTAININJATBSC_PATH . 'inc/mountaininja-shortcode-generator.php';

	}
	#require on front-end
	require_once MOUNTAININJATBSC_PATH . 'inc/mountaininja-shortcodes.php';

// -------------------------------------------------------------------- //
//	Init the updater
// -------------------------------------------------------------------- //
	function mountaininjatbsc_plugin_updater() {
		if (class_exists('PluginUpdateChecker')) {

			$MountaiNinjatwitterbootstrap = new PluginUpdateChecker( 'https://mountaininja.com/wp-content/plugins/mountaininja-updatechief/json/mountaininja-twitter-bootstrap-shortcodes.json', __FILE__,'mountaininja-twitter-bootstrap-shortcodes');
		}
	}
	add_action('plugins_loaded','mountaininjatbsc_plugin_updater');

// -------------------------------------------------------------------- //
//	Register | Enqueue : Styles | Scripts DEVELOPMENT ONLY!!!
// -------------------------------------------------------------------- //
	function mountaininjatbsc_scripts_styles() {
		if ( 1 < 2 ){
			wp_register_style('bootstrap_css', MOUNTAININJATBSC_URL . 'inc/styles/bootstrap.combined.min.css');
			wp_register_script('bootstrap_js', MOUNTAININJATBSC_URL . 'inc/scripts/bootstrap.min.js');
			wp_register_script( 'jquery', '//code.jquery.com/jquery-latest.min.js');

			#wp_register_style('bootstrap_css', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css');
			#wp_register_script('bootstrap_js', '//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/js/bootstrap.min.js');

			# Enqueue
			#wp_enqueue_style('bootstrap_css');
			#wp_enqueue_script( 'jquery' );
			#wp_enqueue_script('bootstrap_js');
		}
	}
	add_action('wp_enqueue_scripts', 'mountaininjatbsc_scripts_styles');