<?php

/*-----------------------------------------------------------------------------------*/
/*	Paths Defenitions
/*-----------------------------------------------------------------------------------*/

define('THMCHF_TINYMCE_PATH', PLUGINCHIEFTBSC_PATH . 'inc/shortcodes/shortcode-generator/');



/*-----------------------------------------------------------------------------------*/
/*	Load TinyMCE dialog
/*-----------------------------------------------------------------------------------*/

if (is_admin()) {

	require_once( THMCHF_TINYMCE_PATH . 'shortcode-generator.class.php' );		// TinyMCE wrapper class
	new thmchf_tinymce();														// do the magic

}