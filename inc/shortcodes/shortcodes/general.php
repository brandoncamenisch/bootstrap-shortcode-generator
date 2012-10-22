<?php

function plchf_html5_audio($atts, $content = null) {
        extract(shortcode_atts(array(
                "src" => '',
                "preload"=> 'true',
                "controls"=> ''
        ), $atts));
        return '<audio src="'.$src.'"preload="'.$preload.'" controls="'.$controls.'"/>';
}
add_shortcode('audio5', 'plchf_html5_audio');


function plchf_plugin_count() {
	global $wpdb;

	$query = "SELECT * FROM wp_posts WHERE post_type = 'product' AND post_status = 'publish';";

	$results = $wpdb->get_results($query);

		if($results === false)
		    return 'error occured'; //wont work or display

		if($results != '')
		    return count($results);
		else
		    return ;


}
add_shortcode('plugin_count', 'plchf_plugin_count');

