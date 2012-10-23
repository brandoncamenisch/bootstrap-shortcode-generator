<?php

/*-----------------------------------------------------------------------------------*/
/*  Alerts Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_alert')) {
  function pluginchief_alert( $atts, $content = null ) {
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
  add_shortcode('pluginchief_alert', 'pluginchief_alert');
}

/*-----------------------------------------------------------------------------------*/
/*  Button Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_button')) {
  function pluginchief_button( $atts, $content = null ) {
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
  add_shortcode('pluginchief_button', 'pluginchief_button');
}

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_buttons_group')) {
  function pluginchief_buttons_group( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    
    return '<div class="btn-group">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginchief_buttons_group', 'pluginchief_buttons_group' );
}

/*-----------------------------------------------------------------------------------*/
/*  Label Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_label')) {
  function pluginchief_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="label label-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('pluginchief_label', 'pluginchief_label');
}

/*-----------------------------------------------------------------------------------*/
/*  Badges Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_badge')) {
  function pluginchief_badge( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="badge badge-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('pluginchief_badge', 'pluginchief_badge');
}

/*-----------------------------------------------------------------------------------*/
/*  Tabs Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_tabs')) {
  function pluginchief_tabs( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    
    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
    
    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
    
    // Add active attribute to first tab content
    $content = preg_replace('/(pluginchief_tab)/', '${1} first="true" ', $content, 1);

    $output = '<div class="tabable">';
    
    if( count($tab_titles) ){
      $output .= '<ul class="nav nav-tabs">';

      $i = 0;
      foreach( $tab_titles as $tab ){
        $activeClass = ($i == 0) ? 'active' : '';
        $output .= '<li class="'.$activeClass.'"><a href="#pluginchief-tab-'. sanitize_title( $tab[0] ) .'" data-toggle="tab">' . $tab[0] . '</a></li>';
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
  add_shortcode( 'pluginchief_tabs', 'pluginchief_tabs' );
}

if (!function_exists('pluginchief_tab')) {
  function pluginchief_tab( $atts, $content = null ) {
    $defaults = array( 
      'title' => 'Tab',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );
    
    // Check if this is first tab, and give it an active class
    $activeClass = ( $first === 'true' ) ? 'active in' : '';

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div id="pluginchief-tab-'. sanitize_title( $title ) .'" class="tab-pane fade '. $activeClass .'">'. do_shortcode( $content ) .'</div>';
  }
  add_shortcode( 'pluginchief_tab', 'pluginchief_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*  Accordion Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_accordions')) {
  function pluginchief_accordions( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    
    // Add active attribute to first accordion content
    $content = preg_replace('/(pluginchief_accordion)/', '${1} first="true" ', $content, 1);

    return '<div class="accordion">'. do_shortcode($content) .'</div><!-- End Accordion -->';
  }
  add_shortcode( 'pluginchief_accordions', 'pluginchief_accordions' );
}

if (!function_exists('pluginchief_accordion')) {
  function pluginchief_accordion( $atts, $content = null ) {
    $defaults = array( 
      'title' => 'Accordion Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#pluginchief-accordion-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="pluginchief-accordion-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'pluginchief_accordion', 'pluginchief_accordion');
}

/*-----------------------------------------------------------------------------------*/
/*  Toggle Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_toggle')) {
  function pluginchief_toggle( $atts, $content = null ) {
    $defaults = array( 
      'title' => 'Toggle Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#pluginchief-toggle-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="pluginchief-toggle-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'pluginchief_toggle', 'pluginchief_toggle');
}

/*-----------------------------------------------------------------------------------*/
/*  Columns Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pluginchief_rows')) {
  function pluginchief_rows( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );
    
    wp_enqueue_style('shortcode-style');

    return '<div class="row-fluid">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginchief_rows', 'pluginchief_rows' );
}

if (!function_exists('pluginchief_column')) {
  function pluginchief_column( $atts, $content = null ) {
    $defaults = array( 'column' => '12' );
    extract( shortcode_atts( $defaults, $atts) );

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div class="span'. $column .'">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'pluginchief_column', 'pluginchief_column');
}


/*-----------------------------------------------------------------------------------*/
/*  Horizontal Rule Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('hr')) {
  function nesis_horizontal_rule( $atts, $content = null ) {
    return '<hr class="pluginchief_divider">';
  }
  add_shortcode('hr', 'nesis_horizontal_rule');
}

/**
 * Remove auto formating inside shortcodes
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);