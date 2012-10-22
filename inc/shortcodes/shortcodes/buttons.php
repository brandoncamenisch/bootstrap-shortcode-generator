<?php 

/* ---------------------------------------------------------------------------
Button Shortcode

[thm_chf_button text="Button Text" url="http://jasonbahl.com" target="_blank" size="btn-large" style="btn-primary" align="left" state="disabled" icon="icon-heart" iconcolor="#ffcc00"]
	
--------------------------------------------------------------------------- */

	function thm_chf_button_shortcode( $atts ){
		
		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'text' 		=> 'Button Text',			// Any Button Text
			'url' 		=> 'http://themechief.com',	// Any URL
			'target' 	=> '_self',					// _blank or _self
			'size' 		=> 'btn-large',				// btn-mini, small or large
			'style' 	=> 'btn-primary',			// btn-primary, info, warning, danger, success or inverse
			'align' 	=> 'floatl',				// floatc, floatl, or floatr
			'state' 	=> '',						// blank or disabled
			'icon' 		=> 'icon-star',				// any of the icon values
			'iconcolor' => '#fff',					// any hex value, with the # included
			), $atts ) 
		);
		
		// Modifies the Values for formatting purposes
		$size 		= ' '.$size; 		// Adds a space before the value
		$style 		= ' '.$style; 		// Adds a space before the value
		$align		= ' '.$align;		// Adds a space before the value
		$state		= ' '.$state;		// Adds a space before the value
		$iconcolor	= ' '.$iconcolor;	// Adds a space before the value

		// Check to see if Icon was set
		if ($icon != 'no-icon') {
			
			// Set Icon Color, Default to White
			if ($iconcolor) {
				$iconcolor = $iconcolor;
			} else {
				$iconcolor = '#fff';
			}
						
			$icon = '<i class="'.$icon.'" style="color:'.$iconcolor.'"></i> ';
		
		} else {
			
			// If No Icon is selected, don't output an icon
			$icon = '';
		
		}		

		// Output the Button
		return '
		<a href="'.$url.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
		';
		
	}
	
	// Register the shortcode
	add_shortcode('thm_chf_button','thm_chf_button_shortcode');