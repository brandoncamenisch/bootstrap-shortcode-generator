<?php

class thmchf_tinymce
{
	function __construct()
	{
		add_action('admin_init', array( &$this, 'thmchf_head' ));
		add_action('init', array( &$this, 'thmchf_tinymce_rich_buttons' ));
		add_action('admin_print_scripts', array( &$this, 'thmchf_quicktags' ));
	}

	// --------------------------------------------------------------------------

	function thmchf_head()
	{
		// css
		wp_enqueue_style( 'thmchf-popup', PLUGINCHIEFTBSC_PATH_ABC . '/css/popup.css', false, '1.0', 'all' );

		// js
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script( 'jquery-livequery', PLUGINCHIEFTBSC_PATH_ABC . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', PLUGINCHIEFTBSC_PATH_ABC . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', PLUGINCHIEFTBSC_PATH_ABC . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'thmchf-popup', PLUGINCHIEFTBSC_PATH_ABC . '/js/popup.js', false, '1.0', false );
	}

	// --------------------------------------------------------------------------

	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function thmchf_tinymce_rich_buttons()
	{
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;

		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array( &$this, 'thmchf_add_rich_plugins' ) );
			add_filter( 'mce_buttons', array( &$this, 'thmchf_register_rich_buttons' ) );
		}
	}

	// --------------------------------------------------------------------------

	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function thmchf_add_rich_plugins( $plugin_array )
	{
		$plugin_array['tzShortcodes'] = PLUGINCHIEFTBSC_PATH_ABC . '/plugin.js';
		return $plugin_array;
	}

	// --------------------------------------------------------------------------

	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function thmchf_register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'thmchf_button' );
		return $buttons;
	}

	// --------------------------------------------------------------------------

	/**
	 * Registers TinyMCE HTML editor quicktags buttons
	 *
	 * @return	void
	 */
	function thmchf_quicktags() {
		// wp_enqueue_script( 'thmchf_quicktags', PLUGINCHIEFTBSC_PATH_ABC . '/plugins/wizylabs_quicktags.js', array('quicktags') );
	}
}

?>