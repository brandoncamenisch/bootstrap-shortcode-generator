<?php

/* ---------------------------------------------------------------------------
Columns Shortcode

[thm_chf_column] Content [/thm_chf_column]

--------------------------------------------------------------------------- */

	function thm_chf_column_row_shortcode( $atts, $content ){

		$content = (substr($content,0,6) =="<br />" ? substr($content,6): $content);
		$content = str_replace("]<br />","]",$content);

		// Output the Button
		$output = '<div class="row-fluid">';
			$output .= '<div class="span12">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';

		return $output;

	}

	// Register the shortcode
	add_shortcode('thm_chf_column_row','thm_chf_column_row_shortcode');

	function thm_chf_column_shortcode( $atts, $content ) {

		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'size' 		=> 'half',			// Column Size: half, third, two-third, fourth
			), $atts )
		);

		// Convert Column Size to Span #
		if ($size == 'half') {
			$size = '6';
		} elseif ($size == 'third') {
			$size = '4';
		} elseif ($size == 'two-third') {
			$size = '8';
		} elseif ($size == 'fourth') {
			$size = '3';
		} elseif ($size == 'three-fourth') {
			$size = '9';
		}

		$content = (substr($content,0,6) == "<br />" ? substr($content,6): $content);
		$content = str_replace("]<br />","]",$content);

		// Output the Column with the Content
		$output = '<div class="span'.$size.'">';
			$output .= do_shortcode($content);
		$output .='</div>';

		return $output;

	}

	// Register the shortcode
	add_shortcode('thm_chf_column','thm_chf_column_shortcode');