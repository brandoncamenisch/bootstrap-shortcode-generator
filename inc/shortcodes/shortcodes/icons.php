<?php

/* ---------------------------------------------------------------------------
Icon Shortcodes
--------------------------------------------------------------------------- */

	function thm_chf_icon_shortcode( $atts, $content ) {

		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'border' 		=> 'border-',	// border- or blank
			'size' 			=> 'small',		// small, medium or large
			'align' 		=> 'pull-left',	// pull-right, pull-left or pull-center
			'icon' 			=> 'icon-heart',// Icon
			'bordercolor'	=>	'#fff',
			'iconcolor'		=>	'#fff'
			), $atts )
		);

		if ($border) {
			$border = $border;
		} else {
			$border = '';
		}

		if ($bordercolor) {
			$bordercolor = ' style="border-color:'.$bordercolor.'"';
		} else {
			$bordercolor = '';
		}

		if ($iconcolor) {
			$iconcolor = ' style="color:'.$iconcolor.'"';
		} else {
			$iconcolor = '';
		}

		// Generate the Icon
		$output = '<div class="circle-'.$border.'icon-'.$size.' '.$align.'">';
			$output .= '<div'.$bordercolor.'>';
				$output .= '<i class="'.$icon.'"'.$iconcolor.'></i>';
			$output .= '</div>';
		$output .= '</div>';

		// Return the Output
		return $output;
	}

	// Register the Shortcode
	add_shortcode('thm_chf_icon','thm_chf_icon_shortcode');