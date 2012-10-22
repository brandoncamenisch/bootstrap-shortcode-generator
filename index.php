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

	require_once 'plugin-update-checker.php';
// -------------------------------------------------------------------- //
//	Init the updater
// -------------------------------------------------------------------- //
	function pluginchieftbsc_plugin_updater() {
		if (class_exists('PluginUpdateChecker')) {

			$PluginChieftwitterbootstrap = new PluginUpdateChecker( 'https://pluginchief.com/wp-content/plugins/pluginchief-updatechief/json/pluginchief-twitter-bootstrap-shortcodes.json', __FILE__,'pluginchief-twitter-bootstrap-shortcodes');
		}
	}
	add_action('plugins_loaded','pluginchieftbsc_plugin_updater');