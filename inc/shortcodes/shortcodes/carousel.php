<?php

/* ---------------------------------------------------------------------------
Carousel Shortcode

[thm_chf_carousel id="myCarousel"]

[thm_chf_carousel_slide img="http://placehold.it/870x500" show_caption="yes" caption_title="Title One" caption_text="Caption Text"][thm_chf_carousel_slide img="http://placehold.it/870x500" show_caption="yes" caption_title="Title Two" caption_text="Caption Text"][thm_chf_carousel_slide img="http://placehold.it/870x500" show_caption="yes" caption_title="Title Three" caption_text="Caption Text"][thm_chf_carousel_slide img="http://placehold.it/870x500" show_caption="yes" caption_title="Title Four" caption_text="Caption Text"]

[/thm_chf_carousel]

--------------------------------------------------------------------------- */

	// Accordion Group
	function thm_chf_carousel( $atts, $content ){

		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'id' => 'myCarousel', // Any Button Text
			), $atts )
		);

		$content = (substr($content,0,6) =="<br />" ? substr($content,6): $content);
		$content = str_replace("]<br />","]",$content);

		// Output the Button
		$output = '<div id="'.$id.'" class="carousel slide">';

            $output .= '<div class="carousel-inner">';
            	$output .= do_shortcode($content);
			$output .= '</div>'; //carousel inner

			$output .= '<a class="left carousel-control" href="#'.$id.'" data-slide="prev">‹</a>';
			$output .= '<a class="right carousel-control" href="#'.$id.'" data-slide="next">›</a>';

		$output .= '</div>'; // end carousel

		return $output;

	}

	// Register the shortcode
	add_shortcode('thm_chf_carousel','thm_chf_carousel');

	function thm_chf_carousel_slide( $atts ) {

		// Extract the Shortcode Attributes
		extract( shortcode_atts( array(
			'img' 			=> 'http://placehold.it/1200x500', 				// Image Url
			'show_caption'	=> 'yes', 										// yes or no
			'caption_title'	=> 'Caption Title',								// Caption Title
			'caption_text'	=> 'This is a caption for the carousel slide.',	// Caption Text
			'active'		=> 'no'
			), $atts )
		);

		if ($show_caption == 'yes') {

			$caption = '<div class="carousel-caption">';
				$caption .= '<h4>'.$caption_title.'</h4>';
				$caption .= '<p>'.$caption_text.'</p>';
			$caption .= '</div>'; // end item caption

		} else { }

		if ($active == 'yes') {
			$active = ' active';
		} else {
			$active = '';
		}

        $output = '<div class="item'.$active.'">';
			$output .= '<img src="'.$img.'" alt="Carousel Image">';
			$output .= $caption;
		$output .= '</div>'; // end item

		return $output;

	}

	add_shortcode('thm_chf_carousel_slide','thm_chf_carousel_slide');