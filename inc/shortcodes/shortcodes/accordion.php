<?php

	/* ---------------------------------------------------------------------------
	Accordion Shortcode

	[thm_chf_accordion_group accordion_id="1"]

	[thm_chf_accordion_panel accordion_id="1" panel_id="1" panel_title="Title One"] Panel Content Goes Here [/thm_chf_accordion_panel]
	[thm_chf_accordion_panel accordion_id="1" panel_id="2" panel_title="Title Two"] Panel Content Goes Here [/thm_chf_accordion_panel]
	[thm_chf_accordion_panel accordion_id="1" panel_id="3" panel_title="Title Three"] Panel Content Goes Here [/thm_chf_accordion_panel]
	[thm_chf_accordion_panel accordion_id="1" panel_id="4" panel_title="Title Four"] Panel Content Goes Here [/thm_chf_accordion_panel]

	[/thm_chf_accordion_group]

	--------------------------------------------------------------------------- */

		// Accordion Group
		function thm_chf_accordion_shortcode( $atts, $content ){

			// Extract the Shortcode Attributes
			extract( shortcode_atts( array(
				'accordion_id' => '1',			// Any Button Text
				), $atts )
			);

			$content = (substr($content,0,6) =="<br />" ? substr($content,6): $content);
			$content = str_replace("]<br />","]",$content);

			// Output the Button
			$output  = '<div class="clearfix"></div>';
			$output .= '<div class="accordion" id="accordion_'.$accordion_id.'">';

				// Display the Nested Accordion Panels
				$output .= do_shortcode($content);

			$output .= '</div>';

			return $output;

		}

		// Register the shortcode
		add_shortcode('thm_chf_accordion_group','thm_chf_accordion_shortcode');

		// Accordion Panel
		function thm_chf_accordion_panel( $atts, $content ) {

			// Extract the Shortcode Attributes
			extract( shortcode_atts( array(
				'accordion_id' 	=> '',				// ID of the Parent Accordion Group
				'parent_id'		=> '',				// Accordion Panel ID
				'title' 		=> 'Panel Title',	// Accordion Panel Title
				), $atts )
			);

			$content = (substr($content,0,6) =="<br />" ? substr($content,6): $content);
			$content = str_replace("]<br />","]",$content);

			$output  = '<div class="accordion-group">';

				$output .= '<div class="accordion-heading">';
					$output .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_'.$parent_id.'" href="#_'.$accordion_id.'">';
						$output .= ''.$title.'';
					$output .= '</a>';
				$output .= '</div>';

				$output .= '<div id="_'.$accordion_id.'" class="accordion-body collapse">';
					$output .= '<div class="accordion-inner">';
						$output .= do_shortcode($content);
					$output .= '</div>';
				$output .= '</div>';

			$output .= '</div>';

			return $output;

		}

		// Register the Shortcode
		add_shortcode('thm_chf_accordion_panel','thm_chf_accordion_panel');