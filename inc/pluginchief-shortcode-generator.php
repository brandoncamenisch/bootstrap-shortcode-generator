<?php

/**
 * Pluginchief Shortcodes
 *
 */

class PluginchiefShortcodes {

  function __construct()
  {
    add_action('init', array(&$this, 'init'));
    add_action('admin_init', array(&$this, 'admin_init'));
  }

  /**
   * Registers TinyMCE rich editor buttons
   *
   */
  function init()
  {

    if( !is_admin() )
    {
      wp_enqueue_script( 'shortcode-script', PLUGINCHIEFTBSC_URL . 'inc/scripts/shortcode-script.js', array('jquery') );
      wp_register_style( 'shortcode-style', PLUGINCHIEFTBSC_URL . 'inc/styles/shortcode.css' );
    }

    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
      return;

    if ( get_user_option('rich_editing') == 'true' )
    {
      add_filter('mce_external_plugins', array(&$this, 'add_plugin') );
      add_filter('mce_buttons', array(&$this, 'register_button') );
    }
  }

  // --------------------------------------------------------------------------

  /**
   * Add TinyMCE buttons
   *
   */
  function register_button($buttons)
  {
    array_push($buttons, "|", "pluginchief_button");
    return $buttons;
  }

  // --------------------------------------------------------------------------

  /**
   * Add TinyMCE Plugin
   *
   */
  function add_plugin($plugin_array)
  {
    $plugin_array['pluginchiefShortcodes'] =  PLUGINCHIEFTBSC_URL . 'inc/scripts/pluginchief-shortcodes.js';
    return $plugin_array;
  }

  // --------------------------------------------------------------------------

  /**
   * Enqueue Scripts and Styles
   *
   */
  function admin_init()
  {
    // css
    wp_enqueue_style( 'pluginchief-popup', PLUGINCHIEFTBSC_URL . 'inc/styles/popup.css' );

    // js
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-livequery', PLUGINCHIEFTBSC_URL . 'inc/scripts/jquery.livequery.js' );
    wp_enqueue_script( 'jquery-appendo', PLUGINCHIEFTBSC_URL . 'inc/scripts/jquery.appendo.js' );
    wp_enqueue_script( 'base64', PLUGINCHIEFTBSC_URL . 'inc/scripts/base64.js' );
    wp_enqueue_script( 'pluginchief-popup', PLUGINCHIEFTBSC_URL . 'inc/scripts/popup.js' );

    wp_localize_script( 'jquery', 'pluginchief_helper', array('framework_url' => PLUGINCHIEFTBSC_URL) );
  }

}
$pluginchief_shortcodes = new PluginchiefShortcodes();
