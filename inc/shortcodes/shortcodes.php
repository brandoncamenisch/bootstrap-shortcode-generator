<?php

/* ---------------------------------------------------------------------------
Set Up the Shortcodes
--------------------------------------------------------------------------- */

	foreach (glob(PLUGINCHIEFTBSC_PATH . "/inc/shortcodes/shortcodes/*.php") as $files){
		require_once $files;
	}