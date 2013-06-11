<?php
// load wordpress
require_once('get_wp.php');

class pluginninja_shortcodes
{
  var $conf;
  var $popup;
  var $params;
  var $description;
  var $shortcode;
  var $cparams;
  var $cshortcode;
  var $popup_title;
  var $no_preview;
  var $has_child;
  var $output;
  var $errors;
  var $icon_list;

  // --------------------------------------------------------------------------

  function __construct( $popup )
  {
    if( file_exists( dirname(__FILE__) . '/config.php' ) )
    {

      $this->conf = dirname(__FILE__) . '/config.php';
      $this->popup = $popup;

      $this->generate_icon_list();

      $this->formate_shortcode();
    }
    else
    {
      $this->append_error('Config file does not exist');
    }
  }

  // --------------------------------------------------------------------------

  function formate_shortcode()
  {
    #get config file
    require_once( $this->conf );

    if( isset( $pluginninja_shortcodes[$this->popup]['child_shortcode'] ) )
      $this->has_child = true;

    if( isset( $pluginninja_shortcodes ) && is_array( $pluginninja_shortcodes ) )
    {
      #get shortcode config stuff
      $this->params 		 =& $pluginninja_shortcodes[$this->popup]['params'];
      $this->shortcode   =& $pluginninja_shortcodes[$this->popup]['shortcode'];
      $this->popup_title =& $pluginninja_shortcodes[$this->popup]['popup_title'];
      $this->description =& $pluginninja_shortcodes[$this->popup]['description'];

      // adds stuff for js use
      $this->append_output( "\n" . '<div id="_pluginninja_shortcode" class="hidden">' . $this->shortcode . '</div>' );
      $this->append_output( "\n" . '<div id="_pluginninja_popup" class="hidden">' . $this->popup . '</div>' );

      if( isset( $pluginninja_shortcodes[$this->popup]['no_preview'] ) && $pluginninja_shortcodes[$this->popup]['no_preview'] )
      {
        $this->no_preview = true;
      }

      #Build description row
      if( $this->description ) {
        $desc_output  = '<tbody>' . "\n";
        $desc_output .= '<tr class="form-row row-description">' . "\n";
        $desc_output .= '<td colspan="2">' . "\n";
        $desc_output .= '<h3>' . $this->description['title'] . '</h3>' . "\n";
        $desc_output .= '<p>' . $this->description['desc'] . '</p>' . "\n";
        $desc_output .= '</td>' . "\n";

        #If description have thumbnail
        if( $this->description['thumb'] ) {
          $desc_output .= '<td><img src="' . PLUGINNINJATBSC_URL . 'js/shortcode/images/' . $this->description['thumb'] . '" alt="Description thumbnail"></td>' . "\n";
        }

        $desc_output .= '</tr>' . "\n";
        $desc_output .= '</tbody>' . "\n";

        $this->append_output( $desc_output );
      }

      #filters and excutes params
      foreach( $this->params as $pkey => $param )
      {
        #prefix the fields names and ids with pluginninja_
        $pkey = 'pluginninja_' . $pkey;

        #popup form row start
        $param['collapsible'] =& $param['collapsible'];
        $param['label']				=& $param['label'];
        $param['desc']				=& $param['desc'];
        $param['type']				=& $param['type'];
        $param['std']					=& $param['std'];
        $param['show_opt']		=& $param['show_opt'];

        $row_start  = '<tbody class="'. ( $param['collapsible'] ? 'pluginninja-collapsible' : '' ) .'">' . "\n";
        $row_start .= '<tr class="form-row">' . "\n";
        $row_start .= '<td class="label">' . $param['label'] . '</td>' . "\n";
        $row_start .= '<td class="field">' . "\n";

        #popup form row end
        $row_end    = '<span class="pluginninja-form-desc">' . $param['desc'] . '</span>' . "\n";
        $row_end   .= '</td>' . "\n";
        $row_end   .= '</tr>' . "\n";
        $row_end   .= '</tbody>' . "\n";

        switch( $param['type'] )
        {
          case 'text' :

            #prepare
            $output  =& $row_start;
            $output .= '<input type="text" class="pluginninja-form-text pluginninja-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
            $output .= $row_end;

            #append
            $this->append_output( $output );

            break;

          case 'textarea' :

            #prepare
            $output  =& $row_start;
            $output .= '<textarea rows="10" cols="30" name="' . $pkey . '" id="' . $pkey . '" class="pluginninja-form-textarea pluginninja-input">' . $param['std'] . '</textarea>' . "\n";
            $output .= $row_end;

            #append
            $this->append_output( $output );

            break;

          case 'select' :

            #prepare
            $output  =& $row_start;
            $output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="pluginninja-form-select pluginninja-input">' . "\n";

            foreach( $param['options'] as $value => $option )
            {
              $output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
            }

            $output .= '</select>' . "\n";
            $output .= $row_end;

            #append
            $this->append_output( $output );

            break;

          case 'checkbox' :

            #prepare
            $output  =& $row_start;
            $output .= '<label for="' . $pkey . '" class="pluginninja-form-checkbox '. ( $param['show_opt'] ? 'pluginninja-collapse-button' : '' ) .'">' . "\n";
            $output .= '<input type="checkbox" class="pluginninja-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' rel="pluginninja_'.  $param['show_opt'] .'" />' . "\n";
            $output .= ' ' . @$param['checkbox_text'] . '</label>' . "\n";
            $output .= $row_end;

            #append
            $this->append_output( $output );

            break;

          case 'icon' :

            #prepare
            $output  =& $row_start;
            $output .= '<ul class="the-icons '. $pkey .'">' . "\n";
            foreach( $this->icon_list as $icon ) {
              $output .= '<li><span class="' . $icon . '"></span></li>';
            }
            $output .= '</ul>';
            $output .= '<input type="hidden" class="pluginninja-input" id="'. $pkey .'" value="">';
            $output .= $row_end;

            #append
            $this->append_output( $output );

            break;
        }
      }

      #checks if has a child shortcode
      if( isset( $pluginninja_shortcodes[$this->popup]['child_shortcode'] ) )
      {
        #set child shortcode
        $this->cparams = $pluginninja_shortcodes[$this->popup]['child_shortcode']['params'];
        $this->cshortcode = $pluginninja_shortcodes[$this->popup]['child_shortcode']['shortcode'];

        #popup parent form row start
        $prow_start  = '<tbody>' . "\n";
        $prow_start .= '<tr class="form-row has-child">' . "\n";
        $prow_start .= '<td><a href="#" id="form-child-add" class="button-secondary">' . $pluginninja_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . "\n";
        $prow_start .= '<div class="child-clone-rows">' . "\n";

        // for js use
        $prow_start .= '<div id="_pluginninja_cshortcode" class="hidden">' . $this->cshortcode . '</div>' . "\n";

        // start the default row
        $prow_start .= '<div class="child-clone-row">' . "\n";
        $prow_start .= '<div class="handlediv" title="Click to toggle"></div>' . "\n";
        $prow_start .= '<h3 class="handle">Options</h3>' . "\n";
        $prow_start .= '<div class="child-clone-row-inside">' . "\n";
        $prow_start .= '<ul class="child-clone-row-form">' . "\n";

        // add $prow_start to output
        $this->append_output( $prow_start );

        foreach( $this->cparams as $cpkey => $cparam )
        {

          #prefix the fields names and ids with pluginninja_
          $cpkey = 'pluginninja_' . $cpkey;
          $cparam['collapsible'] =& $cparam['collapsible'];
          $cparam['label']			 =& $cparam['label'];
          $cparam['desc']				 =& $cparam['desc'];
          #popup form row start
          $crow_start  = '<li class="child-clone-row-form-row '. ( $cparam['collapsible'] ? 'pluginninja-collapsible' : '' ) .'">' . "\n";
          $crow_start .= '<div class="child-clone-row-label">' . "\n";
          $crow_start .= '<label>' . $cparam['label'] . '</label>' . "\n";
          $crow_start .= '</div>' . "\n";
          $crow_start .= '<div class="child-clone-row-field">' . "\n";

          #popup form row end
          $crow_end    = '<span class="child-clone-row-desc">' . $cparam['desc'] . '</span>' . "\n";
          $crow_end   .= '</div>' . "\n";
          $crow_end   .= '</li>' . "\n";

          switch( $cparam['type'] )
          {
            case 'text' :

              #prepare
              $coutput  =& $crow_start;
              $coutput .= '<input type="text" class="pluginninja-form-text pluginninja-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
              $coutput .= $crow_end;

              #append
              $this->append_output( $coutput );

              break;

            case 'textarea' :

              #prepare
              $coutput  = $crow_start;
              $coutput .= '<textarea rows="10" cols="30" name="' . $cpkey . '" id="' . $cpkey . '" class="pluginninja-form-textarea pluginninja-cinput">' . $cparam['std'] . '</textarea>' . "\n";
              $coutput .= $crow_end;

              #append
              $this->append_output( $coutput );

              break;

            case 'select' :

              #prepare
              $coutput  =& $crow_start;
              $coutput .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="pluginninja-form-select pluginninja-cinput">' . "\n";

              foreach( $cparam['options'] as $value => $option )
              {
                $coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
              }

              $coutput .= '</select>' . "\n";
              $coutput .= $crow_end;

              #append
              $this->append_output( $coutput );

              break;

            case 'checkbox' :

              #prepare
              $coutput  =& $crow_start;
              $cparam['show_opt'] 		 =& $cparam['show_opt'];
              $cparam['std']					 =& $cparam['std'];
              $cparam['checkbox_text'] =& $cparam['checkbox_text'];

              $coutput .= '<label for="' . $cpkey . '" class="pluginninja-form-checkbox '. ( $cparam['show_opt'] ? 'pluginninja-collapse-button' : '' ) .'">' . "\n";
              $coutput .= '<input type="checkbox" class="pluginninja-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . ' rel="pluginninja_'.  $cparam['show_opt'] .'" />' . "\n";
              $coutput .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
              $coutput .= $crow_end;

              #append
              $this->append_output( $coutput );

              break;

            case 'icon' :

              #prepare
              $coutput  =& $crow_start;
              $coutput .= '<ul class="the-icons '. $cpkey .'">' . "\n";
              foreach( $this->icon_list as $icon ) {
                $coutput .= '<li><span class="' . $icon . '"></span></li>';
              }
              $coutput .= '</ul>';
              $coutput .= '<input type="hidden" class="pluginninja-cinput" id="'. $cpkey .'" value="">';
              $coutput .= $crow_end;

              #append
              $this->append_output( $coutput );

              break;

          }
        }

        #popup parent form row end
        $prow_end    = '</ul>' . "\n";    #end .child-clone-row-form
        $prow_end   .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
        $prow_end   .= '</div>' . "\n";   #end .child-clone-row-inside
        $prow_end   .= '</div>' . "\n";   #end .child-clone-row

        $prow_end   .= '</div>' . "\n";   #end .child-clone-rows
        $prow_end   .= '</td>' . "\n";
        $prow_end   .= '</tr>' . "\n";
        $prow_end   .= '</tbody>' . "\n";

        #add $prow_end to output
        $this->append_output( $prow_end );
      }
    }
  }

  // --------------------------------------------------------------------------

  function append_output( $output )
  {
    $this->output = $this->output . "\n" . $output;
  }

  // --------------------------------------------------------------------------

  function reset_output( $output )
  {
    $this->output = '';
  }

  // --------------------------------------------------------------------------

  function append_error( $error )
  {
    $this->errors = $this->errors . "\n" . $error;
  }

  // --------------------------------------------------------------------------

  function generate_icon_list()
  {
    $this->icon_list = array(
      'icon-glass',
      'icon-music',
      'icon-search',
      'icon-envelope',
      'icon-heart',
      'icon-star',
      'icon-star-empty',
      'icon-user',
      'icon-film',
      'icon-th-large',
      'icon-th',
      'icon-th-list',
      'icon-ok',
      'icon-remove',
      'icon-zoom-in',

      'icon-zoom-out',
      'icon-off',
      'icon-signal',
      'icon-cog',
      'icon-trash',
      'icon-home',
      'icon-file',
      'icon-time',
      'icon-road',
      'icon-download-alt',
      'icon-download',
      'icon-upload',
      'icon-inbox',
      'icon-play-circle',
      'icon-repeat',

      'icon-refresh',
      'icon-list-alt',
      'icon-lock',
      'icon-flag',
      'icon-headphones',
      'icon-volume-off',
      'icon-volume-down',
      'icon-volume-up',
      'icon-qrcode',
      'icon-barcode',
      'icon-tag',
      'icon-tags',
      'icon-book',
      'icon-bookmark',
      'icon-print',

      'icon-camera',
      'icon-font',
      'icon-bold',
      'icon-italic',
      'icon-text-height',
      'icon-text-width',
      'icon-align-left',
      'icon-align-center',
      'icon-align-right',
      'icon-align-justify',
      'icon-list',
      'icon-indent-left',
      'icon-indent-right',
      'icon-facetime-video',
      'icon-picture',

      'icon-pencil',
      'icon-map-marker',
      'icon-adjust',
      'icon-tint',
      'icon-edit',
      'icon-share',
      'icon-check',
      'icon-move',
      'icon-step-backward',
      'icon-fast-backward',
      'icon-backward',
      'icon-play',
      'icon-pause',
      'icon-stop',
      'icon-forward',

      'icon-fast-forward',
      'icon-step-forward',
      'icon-eject',
      'icon-chevron-left',
      'icon-chevron-right',
      'icon-plus-sign',
      'icon-minus-sign',
      'icon-remove-sign',
      'icon-ok-sign',
      'icon-question-sign',
      'icon-info-sign',
      'icon-screenshot',
      'icon-remove-circle',
      'icon-ok-circle',
      'icon-ban-circle',

      'icon-arrow-left',
      'icon-arrow-right',
      'icon-arrow-up',
      'icon-arrow-down',
      'icon-share-alt',
      'icon-resize-full',
      'icon-resize-small',
      'icon-plus',
      'icon-minus',
      'icon-asterisk',
      'icon-exclamation-sign',
      'icon-gift',
      'icon-leaf',
      'icon-fire',
      'icon-eye-open',

      'icon-eye-close',
      'icon-warning-sign',
      'icon-plane',
      'icon-calendar',
      'icon-random',
      'icon-comment',
      'icon-magnet',
      'icon-chevron-up',
      'icon-chevron-down',
      'icon-retweet',
      'icon-shopping-cart',
      'icon-folder-close',
      'icon-folder-open',
      'icon-resize-vertical',
      'icon-resize-horizontal',

      'icon-bar-chart',
      'icon-twitter-sign',
      'icon-facebook-sign',
      'icon-camera-retro',
      'icon-key',
      'icon-cogs',
      'icon-comments',
      'icon-thumbs-up',
      'icon-thumbs-down',
      'icon-star-half',
      'icon-heart-empty',
      'icon-signout',
      'icon-linkedin-sign',
      'icon-pushpin',
      'icon-external-link',

      'icon-signin',
      'icon-trophy',
      'icon-github-sign',
      'icon-upload-alt',
      'icon-lemon',
      'icon-phone',
      'icon-check-empty',
      'icon-bookmark-empty',
      'icon-phone-sign',
      'icon-twitter',
      'icon-facebook',
      'icon-github',
      'icon-unlock',
      'icon-credit-card',
      'icon-rss',

      'icon-hdd',
      'icon-bullhorn',
      'icon-bell',
      'icon-certificate',
      'icon-hand-right',
      'icon-hand-left',
      'icon-hand-up',
      'icon-hand-down',
      'icon-circle-arrow-left',
      'icon-circle-arrow-right',
      'icon-circle-arrow-up',
      'icon-circle-arrow-down',
      'icon-globe',
      'icon-wrench',
      'icon-tasks',

      'icon-filter',
      'icon-briefcase',
      'icon-fullscreen',

      'icon-group',
      'icon-link',
      'icon-cloud',
      'icon-beaker',
      'icon-cut',
      'icon-copy',
      'icon-paper-clip',
      'icon-save',
      'icon-sign-blank',
      'icon-reorder',
      'icon-list-ul',
      'icon-list-ol',
      'icon-strikethrough',
      'icon-underline',
      'icon-table',

      'icon-magic',
      'icon-truck',
      'icon-pinterest',
      'icon-pinterest-sign',
      'icon-google-plus-sign',
      'icon-google-plus',
      'icon-money',
      'icon-caret-down',
      'icon-caret-up',
      'icon-caret-left',
      'icon-caret-right',
      'icon-columns',
      'icon-sort',
      'icon-sort-down',
      'icon-sort-up',

      'icon-envelope-alt',
      'icon-linkedin',
      'icon-undo',
      'icon-legal',
      'icon-dashboard',
      'icon-comment-alt',
      'icon-comments-alt',
      'icon-bolt',
      'icon-sitemap',
      'icon-umbrella',
      'icon-paste',

      'icon-user-md'
    );
  }

}
?>