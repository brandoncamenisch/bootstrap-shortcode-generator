<?php

/* ---------------------------------------------------------------------------
Button Shortcode

[thm_chf_alert title="Alert Title" style="alert-warning" dismiss="show"] Alert Content Goes Here [/alert]

--------------------------------------------------------------------------- */

	function thm_chf_alert_shortcode( $atts, $content ){

		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'title' 	=> 'Alert Title',		// Title
			'style' 	=> 'alert-error',		// blank, alert-success, alert-error or alert-info
			'dismiss' 	=> 'show',				// hide or show
			), $atts )
		);

		// Get the Values
		$style		= ' '.$style; // Add a space before the style for formatting

		// Output a Paragraph with the Alert
		$output = '<div class="alert alert-block'.$style.'">';

			// Show Dismiss Button
			if ($dismiss == 'show') {
				$output .= '<a class="close" data-dismiss="alert" href="#">×</a>';
			} else { }

			// Alert Title
			$output .= '<h4 class="alert-heading">'.$title.'</h4>';

			// Alert Content
			$output .= do_shortcode($content);

		$output .= '</div>';

		return apply_filters('plchf_msb_page_element_output_alert_filter',$output);

	}

	// Register the shortcode
	add_shortcode('thm_chf_alert','thm_chf_alert_shortcode');