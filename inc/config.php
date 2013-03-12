<?php

/*-----------------------------------------------------------------------------------*/
/*  Alert Config
/*-----------------------------------------------------------------------------------*/
$pluginninja_shortcodes['alert'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Alert Style', 'pluginninja'),
      'desc' => __('Select the alert\'s type, ie the alert colour', 'pluginninja'),
      'options' => array(
        'warning' => 'Warning',
        'error' => 'Error',
        'success' => 'Success',
        'info' => 'Information'
      )
    ),
    'dismiss' => array(
      'type' => 'checkbox',
      'label' => __('Dismissable', 'pluginninja'),
      'checkbox_text' => __('Is the allert dismissable? Visitor can close the alert', 'pluginninja')
    ),
    'content' => array(
      'std' => 'Alert text',
      'type' => 'textarea',
      'label' => __('Alert Text', 'pluginninja'),
      'desc' => __('Add the alert\'s text.  You can also insert html tag here.', 'pluginninja'),
    )

  ),
  'shortcode' => '[pluginninja_alert style="{{style}}" dismiss="{{dismiss}}" ] {{content}} [/pluginninja_alert]',
  'popup_title' => __('Insert Alert Shortcode', 'pluginninja')
);
/*-----------------------------------------------------------------------------------*/
/*  Well
/*-----------------------------------------------------------------------------------*/
$pluginninja_shortcodes['well'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Well style', 'pluginninja'),
      'desc' => __('Select well\'s style, ie the label\'s colour.'),
      'options' => array(
        'default' => 'Default',
        'large' => 'Large',
        'small' => 'Small'
      )
    ),
    'content' => array(
      'std' => 'Well Text',
      'type' => 'textarea',
      'label' => __('Well\'s Text', 'pluginninja'),
      'desc' => __('Add the well\'s text', 'pluginninja')
    )
  ),
  'shortcode' => '[pluginninja_well style="{{style}}"] {{content}} [/pluginninja_well]',
  'popup_title' => __('Insert Well Shortcode', 'pluginninja')
);

/*-----------------------------------------------------------------------------------*/
/*  Button Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['button'] = array(
  'no_preview' => true,
  'params' => array(
    'url' => array(
      'std' => '',
      'type' => 'text',
      'label' => __('Button URL', 'pluginninja'),
      'desc' => __('Add the button\'s url eg http://example.com', 'pluginninja')
    ),
    'style' => array(
      'type' => 'select',
      'label' => __('Button Style', 'pluginninja'),
      'desc' => __('Select the button\'s style, ie the button\'s colour', 'pluginninja'),
      'options' => array(
        'default' => 'Default button',
        'primary' => 'Primary button',
        'info' => 'Info button',
        'success' => 'Success button',
        'warning' => 'Warning button',
        'danger' => 'Danger button',
        'inverse' => 'Inverse button'
      )
    ),
    'size' => array(
      'type' => 'select',
      'label' => __('Button Size', 'pluginninja'),
      'desc' => __('Select the button\'s size', 'pluginninja'),
      'options' => array(
        'default' => 'Default',
        'mini' => 'Mini',
        'small' => 'Small',
        'large' => 'Large',
        'block' => 'Block'
      )
    ),
    'target' => array(
      'type' => 'select',
      'label' => __('Button Target', 'pluginninja'),
      'desc' => __('_self = open in same window. _blank = open in new window', 'pluginninja'),
      'options' => array(
        '_self' => '_self',
        '_blank' => '_blank'
      )
    ),
    'content' => array(
      'std' => 'Button Text',
      'type' => 'text',
      'label' => __('Button\'s Text', 'pluginninja'),
      'desc' => __('Add the button\'s text', 'pluginninja'),
    ),
    'enable_icon' => array(
      'type' => 'checkbox',
      'label' => __('Button\'s Icon', 'pluginninja'),
      'checkbox_text' => __('Enable icon for button?', 'pluginninja'),
      'show_opt' => 'icon'
    ),
    'icon' => array(
      'type' => 'icon',
      'collapsible' => true,
      'label' => __('Choose Icon', 'pluginninja')
    )
  ),
  'shortcode' => '[pluginninja_button url="{{url}}" style="{{style}}" size="{{size}}" target="{{target}}" icon="{{icon}}"] {{content}} [/pluginninja_button]',
  'popup_title' => __('Insert Button Shortcode', 'pluginninja')
);

/*-----------------------------------------------------------------------------------*/
/*  Inline Label Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['label'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Label style', 'pluginninja'),
      'desc' => __('Select label\'s style, ie the label\'s colour.'),
      'options' => array(
        'default' => 'Default',
        'success' => 'Success',
        'warning' => 'Warning',
        'important' => 'Important',
        'info' => 'Info'
      )
    ),
    'content' => array(
      'std' => 'Label Text',
      'type' => 'text',
      'label' => __('Label\'s Text', 'pluginninja'),
      'desc' => __('Add the label\'s text', 'pluginninja')
    )
  ),
  'shortcode' => '[pluginninja_label style="{{style}}"] {{content}} [/pluginninja_label]',
  'popup_title' => __('Insert Inline Label Shortcode', 'pluginninja')
);

/*-----------------------------------------------------------------------------------*/
/*  Badges Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['badge'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Badge style', 'pluginninja'),
      'desc' => __('Select badge\'s style, ie the badge\'s colour.'),
      'options' => array(
        'default' => 'Default',
        'success' => 'Success',
        'warning' => 'Warning',
        'error' => 'Important',
        'info' => 'Info'
      )
    ),
    'content' => array(
      'std' => 'Badge Text',
      'type' => 'text',
      'label' => __('Badge\'s Text', 'pluginninja'),
      'desc' => __('Add the badge\'s text', 'pluginninja')
    )
  ),
  'shortcode' => '[pluginninja_badge style="{{style}}"] {{content}} [/pluginninja_badge]',
  'popup_title' => __('Insert Badge Shortcode', 'pluginninja')
);

/*-----------------------------------------------------------------------------------*/
/*  Tabs Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['tabs'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginninja_tabs] {{child_shortcode}} [/pluginninja_tabs]',
  'popup_title' => __('Insert Tab Shortcode', 'pluginninja'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Tab Title', 'pluginninja'),
          'desc' => __('Title of the tab', 'pluginninja')
      ),
      'content' => array(
          'std' => 'Tab content',
          'type' => 'textarea',
          'label' => __('Tab Content', 'pluginninja'),
          'desc' => __('Add the tabs content, you can also insert html tag.', 'pluginninja')
      )
    ),
    'shortcode' => '[pluginninja_tab title="{{title}}"] {{content}} [/pluginninja_tab]',
    'clone_button' => __('Add Tab', 'pluginninja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Toggle Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['toggle'] = array(
  'no_preview' => true,
  'params' => array(
    'title' => array(
      'std' => 'Toggle Title',
      'type' => 'text',
      'label' => __('Toggle\'s Title', 'pluginninja'),
      'desc' => __('Add the toggle\'s title', 'pluginninja')
    ),
    'content' => array(
      'std' => 'Toggle content',
      'type' => 'textarea',
      'label' => __('Toggle\'s Content', 'pluginninja'),
      'desc' => __('Add the toggle\'s content', 'pluginninja')
    )
  ),
  'shortcode' => '[pluginninja_toggle title="{{title}}"] {{content}} [/pluginninja_toggle]',
  'popup_title' => __('Insert Toggle Shortcode', 'pluginninja')
);

/*-----------------------------------------------------------------------------------*/
/*  Accordion Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['accordion'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginninja_accordions] {{child_shortcode}} [/pluginninja_accordions]',
  'popup_title' => __('Insert Accordion Shortcode', 'pluginninja'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Accordion Title', 'pluginninja'),
          'desc' => __('Title of the accordion', 'pluginninja')
      ),
      'content' => array(
          'std' => 'Accordion content',
          'type' => 'textarea',
          'label' => __('Accordion Content', 'pluginninja'),
          'desc' => __('Add the accordion content, you can also insert html tag.', 'pluginninja')
      )
    ),
    'shortcode' => '[pluginninja_accordion title="{{title}}"] {{content}} [/pluginninja_accordion]',
    'clone_button' => __('Add Accordion', 'pluginninja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['buttons_group'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginninja_buttons_group] {{child_shortcode}} [/pluginninja_buttons_group]',
  'popup_title' => __('Insert Buttons Group Shortcode', 'pluginninja'),

  'child_shortcode' => array(
    'params' => $pluginninja_shortcodes['button']['params'],
    'shortcode' => $pluginninja_shortcodes['button']['shortcode'],
    'clone_button' => __('Add Button', 'pluginninja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Columns Config
/*-----------------------------------------------------------------------------------*/

$pluginninja_shortcodes['columns'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginninja_rows] {{child_shortcode}} [/pluginninja_rows]',
  'popup_title' => __('Insert Columns Shortcode', 'pluginninja'),

  'child_shortcode' => array(
    'params' => array(
      'column' => array(
          'type' => 'select',
          'label' => __('Column Width', 'pluginninja'),
          'desc' => __('Choose column width', 'pluginninja'),
          'options' => array(
            '1' => '1 Column',
            '2' => '2 Column',
            '3' => '3 Column',
            '4' => '4 Column',
            '5' => '5 Column',
            '6' => '6 Column',
            '7' => '7 Column',
            '8' => '8 Column',
            '9' => '9 Column',
            '10' => '10 Column',
            '11' => '11 Column',
            '12' => '12 Column'
          )
      ),
      'content' => array(
          'std' => 'Column content',
          'type' => 'textarea',
          'label' => __('Column Content', 'pluginninja'),
          'desc' => __('Add the column content, you can also insert html tag.', 'pluginninja')
      )
    ),
    'shortcode' => '[pluginninja_column column="{{column}}"] {{content}} [/pluginninja_column]',
    'clone_button' => __('Add Column', 'pluginninja')
  )
);

?>