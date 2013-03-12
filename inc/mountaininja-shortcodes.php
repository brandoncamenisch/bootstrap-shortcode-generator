<?php

/*-----------------------------------------------------------------------------------*/
/*  Alerts Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_alert')) {
  function mountaininja_alert( $atts, $content = null ) {
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
  add_shortcode('mountaininja_alert', 'mountaininja_alert');
}

/*-----------------------------------------------------------------------------------*/
/*  Well Shortcode
/*-----------------------------------------------------------------------------------*/
if (!function_exists('mountaininja_well')) {
  function mountaininja_well( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style'   => 'default'
    ), $atts));

    $output  = '<div class="well well-'. $style .'">';
    $output .= do_shortcode($content);
    $output .= '</div>';

    return $output;
  }
  add_shortcode('mountaininja_well', 'mountaininja_well');
}

/*-----------------------------------------------------------------------------------*/
/*  Button Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_button')) {
  function mountaininja_button( $atts, $content = null ) {
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
  add_shortcode('mountaininja_button', 'mountaininja_button');
}

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_buttons_group')) {
  function mountaininja_buttons_group( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    return '<div class="btn-group">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'mountaininja_buttons_group', 'mountaininja_buttons_group' );
}

/*-----------------------------------------------------------------------------------*/
/*  Label Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_label')) {
  function mountaininja_label( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="label label-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('mountaininja_label', 'mountaininja_label');
}

/*-----------------------------------------------------------------------------------*/
/*  Badges Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_badge')) {
  function mountaininja_badge( $atts, $content = null ) {
    extract(shortcode_atts(array(
      'style' => 'default',
    ), $atts));

    return '<span class="badge badge-'. $style .'">'. do_shortcode($content) .'</span>';
  }
  add_shortcode('mountaininja_badge', 'mountaininja_badge');
}

/*-----------------------------------------------------------------------------------*/
/*  Tabs Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_tabs')) {
  function mountaininja_tabs( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    // Extract the tab titles for use in the tab widget.
    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

    $tab_titles = array();
    if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

    // Add active attribute to first tab content
    $content = preg_replace('/(mountaininja_tab)/', '${1} first="true" ', $content, 1);

    $output = '<div class="tabable">';

    if( count($tab_titles) ){
      $output .= '<ul class="nav nav-tabs">';

      $i = 0;
      foreach( $tab_titles as $tab ){
        $activeClass = ($i == 0) ? 'active' : '';
        $output .= '<li class="'.$activeClass.'"><a href="#mountaininja-tab-'. sanitize_title( $tab[0] ) .'" data-toggle="tab">' . $tab[0] . '</a></li>';
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
  add_shortcode( 'mountaininja_tabs', 'mountaininja_tabs' );
}

if (!function_exists('mountaininja_tab')) {
  function mountaininja_tab( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Tab',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Check if this is first tab, and give it an active class
    $activeClass = ( $first === 'true' ) ? 'active in' : '';

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div id="mountaininja-tab-'. sanitize_title( $title ) .'" class="tab-pane fade '. $activeClass .'">'. do_shortcode( $content ) .'</div>';
  }
  add_shortcode( 'mountaininja_tab', 'mountaininja_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*  Accordion Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_accordions')) {
  function mountaininja_accordions( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    // Add active attribute to first accordion content
    $content = preg_replace('/(mountaininja_accordion)/', '${1} first="true" ', $content, 1);

    return '<div class="accordion">'. do_shortcode($content) .'</div><!-- End Accordion -->';
  }
  add_shortcode( 'mountaininja_accordions', 'mountaininja_accordions' );
}

if (!function_exists('mountaininja_accordion')) {
  function mountaininja_accordion( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Accordion Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#mountaininja-accordion-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="mountaininja-accordion-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'mountaininja_accordion', 'mountaininja_accordion');
}

/*-----------------------------------------------------------------------------------*/
/*  Toggle Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_toggle')) {
  function mountaininja_toggle( $atts, $content = null ) {
    $defaults = array(
      'title' => 'Toggle Title',
      'first' => ''
    );
    extract( shortcode_atts( $defaults, $atts ) );

    // Open accordion group
    $output  = '<div class="accordion-group">';

      // Accordion heading
      $output .= '<div class="accordion-heading">';
      $output .= '<a class="accordion-toggle" data-toggle="collapse" href="#mountaininja-toggle-'. sanitize_title( $title ) .'">';
      $output .= $title . '</a>';
      $output .= '</div>';

      // Accordion Content
      // Check if this is first tab, and give it an active class
      $activeClass = ( $first === 'true' ) ? 'in' : '';

      // Add auto formating
      $content = wpautop( trim($content) );

      $output .= '<div class="accordion-body collapse '. $activeClass .'" id="mountaininja-toggle-'. sanitize_title( $title ) .'">';
      $output .= '<div class="accordion-inner">'. do_shortcode($content) .'</div>';
      $output .= '</div>';

    // End accordion group
    $output .= '</div>';

    return $output;
  }
  add_shortcode( 'mountaininja_toggle', 'mountaininja_toggle');
}

/*-----------------------------------------------------------------------------------*/
/*  Columns Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mountaininja_rows')) {
  function mountaininja_rows( $atts, $content = null ) {
    $defaults = array();
    extract( shortcode_atts( $defaults, $atts ) );

    wp_enqueue_style('shortcode-style');

    return '<div class="row-fluid">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'mountaininja_rows', 'mountaininja_rows' );
}

if (!function_exists('mountaininja_column')) {
  function mountaininja_column( $atts, $content = null ) {
    $defaults = array( 'column' => '12' );
    extract( shortcode_atts( $defaults, $atts) );

    // Add auto formating
    $content = wpautop( trim($content) );

    return '<div class="span'. $column .'">'. do_shortcode($content) .'</div>';
  }
  add_shortcode( 'mountaininja_column', 'mountaininja_column');
}


/*-----------------------------------------------------------------------------------*/
/*  Horizontal Rule Shortcode
/*-----------------------------------------------------------------------------------*/

if (!function_exists('hr')) {
  function nesis_horizontal_rule( $atts, $content = null ) {
    return '<hr class="mountaininja_divider">';
  }
  add_shortcode('hr', 'nesis_horizontal_rule');
}

/**
 * Remove auto formating inside shortcodes
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);