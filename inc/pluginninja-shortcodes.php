<?php

/*-----------------------------------------------------------------------------------*/
/*  Alerts Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_alert')) {
  function pluginninja_alert( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style'   => 'warning',
      'dismiss' => 'false'
    ), $atts));

    $output  = '<div class="alert alert-'. $style .'">';

    // If alert dismissable
    if( $dismiss == 'true' ) {
      $output .= '<a class="close" data-dismiss="alert">&times;</a>';
    }

    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
  }
  add_shortcode('pluginninja_alert', 'pluginninja_alert');
}

/*-----------------------------------------------------------------------------------*/
/*  Well Shortcode
/*-----------------------------------------------------------------------------------*/
if (!function_exists('pluginninja_well')) {
  function pluginninja_well( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style'   => 'default'
    ), $atts));

    $output  = '<div class="well well-'. $style .'">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
  }
  add_shortcode('pluginninja_well', 'pluginninja_well');
}

/*-----------------------------------------------------------------------------------*/
/*  Button Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_button')) {
  function pluginninja_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'url'     => '',
      'style'   => 'default',
      'size'    => 'default',
      'target'  => '_self',
      'icon'    => ''
    ), $atts));

    $output  = '<a href="'. $url .'" target="'. $target .'" class="btn btn-'. $style .' btn-'. $size .'" >';
    if( $icon !== '' ) {
      $output .= '<i class="'. $icon .'"></i> ';
    }
    $output .= do_shortcode($content) . '</a>';

    return $output;
  }
  add_shortcode('pluginninja_button', 'pluginninja_button');
}

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_buttons_group')) {
  function pluginninja_buttons_group( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    return '<div class="btn-group">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginninja_buttons_group', 'pluginninja_buttons_group' );
}

/*-----------------------------------------------------------------------------------*/
/*  Label Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_label')) {
  function pluginninja_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="label label-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('pluginninja_label', 'pluginninja_label');
}

/*-----------------------------------------------------------------------------------*/
/*  Badges Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_badge')) {
  function pluginninja_badge( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="badge badge-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('pluginninja_badge', 'pluginninja_badge');
}

/*-----------------------------------------------------------------------------------*/
/*  Tabs Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_tabs')) {
  function pluginninja_tabs( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

    // Add active attribute to first tab content
    $content = preg_replace('/(pluginninja_tab)/', '${1} first="true" ', $content, 1);

    $output = '<div class="tabable">';

    if( count($tab_titles) ){
      $output .= '<ul class="nav nav-tabs">';

      $i = 0;
      foreach( $tab_titles as $tab ){
        $activeClass = ($i == 0) ? 'active' : '';
        $output .= '<li class="'.$activeClass.'"><a href="#pluginninja-tab-'. sanitize_title( $tab[0] ) .'" data-toggle="tab">' . $tab[0] . '</a></li>';
        $i++;
      }

      $output .= '</ul>';
      $output .= '<div class="tab-content">'.do_shortcode( $content ).'</div>';

    } else {
      $output .= do_shortcode( $content );
    }

    $output .= '</div>'; // End tabable

    return $output;
  }
  add_shortcode( 'pluginninja_tabs', 'pluginninja_tabs' );
}

if (!function_exists('pluginninja_tab')) {
  function pluginninja_tab( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Tab',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Check if this is first tab, and give it an active class
    $activeClass = ( $first === 'true' ) ? 'active in' : '';

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div id="pluginninja-tab-'. sanitize_title( $title ) .'" class="tab-pane fade '. $activeClass .'">'. do_shortcode( $content ) .'</div>';
  }
  add_shortcode( 'pluginninja_tab', 'pluginninja_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*  Accordion Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_accordions')) {
  function pluginninja_accordions( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    // Add active attribute to first accordion content
    $content = preg_replace('/(pluginninja_accordion)/', '${1} first="true" ', $content, 1);

    return '<div class="accordion">'. do_shortcode($content) .'</div><!-- End Accordion -->';
  }
  add_shortcode( 'pluginninja_accordions', 'pluginninja_accordions' );
}

if (!function_exists('pluginninja_accordion')) {
  function pluginninja_accordion( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Accordion Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#pluginninja-accordion-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="pluginninja-accordion-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'pluginninja_accordion', 'pluginninja_accordion');
}

/*-----------------------------------------------------------------------------------*/
/*  Toggle Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_toggle')) {
  function pluginninja_toggle( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Toggle Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#pluginninja-toggle-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="pluginninja-toggle-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'pluginninja_toggle', 'pluginninja_toggle');
}

/*-----------------------------------------------------------------------------------*/
/*  Columns Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_rows')) {
  function pluginninja_rows( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    wp_enqueue_style('shortcode-style');

    return '<div class="row-fluid">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginninja_rows', 'pluginninja_rows' );
}

if (!function_exists('pluginninja_column')) {
  function pluginninja_column( $atts, $content = null ) {
    $defaults = array( 'column' => '12' );
    extract( shortcode_atts( $defaults, $atts) );

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div class="span'. $column .'">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginninja_column', 'pluginninja_column');
}


/*-----------------------------------------------------------------------------------*/
/*  Horizontal Rule Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('hr')) {
  function pluginninja_horizontal_rule( $atts, $content = null ) {
    return '<hr/>';
  }
  add_shortcode('hr', 'pluginninja_horizontal_rule');
}

/**
 * Remove auto formating inside shortcodes
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/*-----------------------------------------------------------------------------------*/
/*  Progress Bar Shorcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_progress')) {
  function pluginninja_progress( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style'   => 'defualt',
      'size'    => '50',
      'striped' => 'progress-striped',
      'active'  => 'active',
    ), $atts));

    $output  = "<div class=\"progress $style $striped $active\">
									<div class=\"bar\" style=\"width: $size%;\"></div>
								</div>";

    return $output;

  }
  add_shortcode('pluginninja_progess', 'pluginninja_progress');
}

/*-----------------------------------------------------------------------------------*/
/*  Tooltip Shorcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_tooltip')) {
  function pluginninja_tooltip( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'href'        => '#',
      'placement'   => 'top',
      'title'       => 'title',
      'content'     => 'content',
    ), $atts));

    $output  = "<a href=\"$href\" rel=\"tooltip\" data-toggle=\"tooltip\" data-placement=\"$placement\" title=\"$title\" data-original-title=\"$title\">$content</a>";
    return $output;
  }
  add_shortcode('pluginninja_tooltip', 'pluginninja_tooltip');
}

/*-----------------------------------------------------------------------------------*/
/*  Pre Shorcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginninja_code')) {
  function pluginninja_code( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'content'=> 'coder',
      'ct'     => 'test',
    ), $atts));
		$content = esc_html($content);
    $output  = "<pre>$content</pre>";
    return $output;

  } add_shortcode('pluginninja_code', 'pluginninja_code');
}