<?php

/*-----------------------------------------------------------------------------------*/
/*  Alert Config
/*-----------------------------------------------------------------------------------*/
$pluginchief_shortcodes['alert'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Alert Style', 'pluginchief'),
      'desc' => __('Select the alert\'s type, ie the alert colour', 'pluginchief'),
      'options' => array(
        'warning' => 'Warning',
        'error' => 'Error',
        'success' => 'Success',
        'info' => 'Information'
      )
    ),
    'dismiss' => array(
      'type' => 'checkbox',
      'label' => __('Dismissable', 'pluginchief'),
      'checkbox_text' => __('Is the allert dismissable? Visitor can close the alert', 'pluginchief')
    ),
    'content' => array(
      'std' => 'Alert text',
      'type' => 'textarea',
      'label' => __('Alert Text', 'pluginchief'),
      'desc' => __('Add the alert\'s text.  You can also insert html tag here.', 'pluginchief'),
    )

  ),
  'shortcode' => '[pluginchief_alert style="{{style}}" dismiss="{{dismiss}}" ] {{content}} [/pluginchief_alert]',
  'popup_title' => __('Insert Alert Shortcode', 'pluginchief')
);
/*-----------------------------------------------------------------------------------*/
/*  Well
/*-----------------------------------------------------------------------------------*/
$pluginchief_shortcodes['well'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Well style', 'pluginchief'),
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
      'label' => __('Well\'s Text', 'pluginchief'),
      'desc' => __('Add the well\'s text', 'pluginchief')
    )
  ),
  'shortcode' => '[pluginchief_well style="{{style}}"] {{content}} [/pluginchief_well]',
  'popup_title' => __('Insert Well Shortcode', 'pluginchief')
);

/*-----------------------------------------------------------------------------------*/
/*  Button Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['button'] = array(
  'no_preview' => true,
  'params' => array(
    'url' => array(
      'std' => '',
      'type' => 'text',
      'label' => __('Button URL', 'pluginchief'),
      'desc' => __('Add the button\'s url eg http://example.com', 'pluginchief')
    ),
    'style' => array(
      'type' => 'select',
      'label' => __('Button Style', 'pluginchief'),
      'desc' => __('Select the button\'s style, ie the button\'s colour', 'pluginchief'),
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
      'label' => __('Button Size', 'pluginchief'),
      'desc' => __('Select the button\'s size', 'pluginchief'),
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
      'label' => __('Button Target', 'pluginchief'),
      'desc' => __('_self = open in same window. _blank = open in new window', 'pluginchief'),
      'options' => array(
        '_self' => '_self',
        '_blank' => '_blank'
      )
    ),
    'content' => array(
      'std' => 'Button Text',
      'type' => 'text',
      'label' => __('Button\'s Text', 'pluginchief'),
      'desc' => __('Add the button\'s text', 'pluginchief'),
    ),
    'enable_icon' => array(
      'type' => 'checkbox',
      'label' => __('Button\'s Icon', 'pluginchief'),
      'checkbox_text' => __('Enable icon for button?', 'pluginchief'),
      'show_opt' => 'icon'
    ),
    'icon' => array(
      'type' => 'icon',
      'collapsible' => true,
      'label' => __('Choose Icon', 'pluginchief')
    )
  ),
  'shortcode' => '[pluginchief_button url="{{url}}" style="{{style}}" size="{{size}}" target="{{target}}" icon="{{icon}}"] {{content}} [/pluginchief_button]',
  'popup_title' => __('Insert Button Shortcode', 'pluginchief')
);

/*-----------------------------------------------------------------------------------*/
/*  Inline Label Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['label'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Label style', 'pluginchief'),
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
      'label' => __('Label\'s Text', 'pluginchief'),
      'desc' => __('Add the label\'s text', 'pluginchief')
    )
  ),
  'shortcode' => '[pluginchief_label style="{{style}}"] {{content}} [/pluginchief_label]',
  'popup_title' => __('Insert Inline Label Shortcode', 'pluginchief')
);

/*-----------------------------------------------------------------------------------*/
/*  Badges Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['badge'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Badge style', 'pluginchief'),
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
      'label' => __('Badge\'s Text', 'pluginchief'),
      'desc' => __('Add the badge\'s text', 'pluginchief')
    )
  ),
  'shortcode' => '[pluginchief_badge style="{{style}}"] {{content}} [/pluginchief_badge]',
  'popup_title' => __('Insert Badge Shortcode', 'pluginchief')
);

/*-----------------------------------------------------------------------------------*/
/*  Tabs Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['tabs'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginchief_tabs] {{child_shortcode}} [/pluginchief_tabs]',
  'popup_title' => __('Insert Tab Shortcode', 'pluginchief'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Tab Title', 'pluginchief'),
          'desc' => __('Title of the tab', 'pluginchief')
      ),
      'content' => array(
          'std' => 'Tab content',
          'type' => 'textarea',
          'label' => __('Tab Content', 'pluginchief'),
          'desc' => __('Add the tabs content, you can also insert html tag.', 'pluginchief')
      )
    ),
    'shortcode' => '[pluginchief_tab title="{{title}}"] {{content}} [/pluginchief_tab]',
    'clone_button' => __('Add Tab', 'pluginchief')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Toggle Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['toggle'] = array(
  'no_preview' => true,
  'params' => array(
    'title' => array(
      'std' => 'Toggle Title',
      'type' => 'text',
      'label' => __('Toggle\'s Title', 'pluginchief'),
      'desc' => __('Add the toggle\'s title', 'pluginchief')
    ),
    'content' => array(
      'std' => 'Toggle content',
      'type' => 'textarea',
      'label' => __('Toggle\'s Content', 'pluginchief'),
      'desc' => __('Add the toggle\'s content', 'pluginchief')
    )
  ),
  'shortcode' => '[pluginchief_toggle title="{{title}}"] {{content}} [/pluginchief_toggle]',
  'popup_title' => __('Insert Toggle Shortcode', 'pluginchief')
);

/*-----------------------------------------------------------------------------------*/
/*  Accordion Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['accordion'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginchief_accordions] {{child_shortcode}} [/pluginchief_accordions]',
  'popup_title' => __('Insert Accordion Shortcode', 'pluginchief'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Accordion Title', 'pluginchief'),
          'desc' => __('Title of the accordion', 'pluginchief')
      ),
      'content' => array(
          'std' => 'Accordion content',
          'type' => 'textarea',
          'label' => __('Accordion Content', 'pluginchief'),
          'desc' => __('Add the accordion content, you can also insert html tag.', 'pluginchief')
      )
    ),
    'shortcode' => '[pluginchief_accordion title="{{title}}"] {{content}} [/pluginchief_accordion]',
    'clone_button' => __('Add Accordion', 'pluginchief')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['buttons_group'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginchief_buttons_group] {{child_shortcode}} [/pluginchief_buttons_group]',
  'popup_title' => __('Insert Buttons Group Shortcode', 'pluginchief'),

  'child_shortcode' => array(
    'params' => $pluginchief_shortcodes['button']['params'],
    'shortcode' => $pluginchief_shortcodes['button']['shortcode'],
    'clone_button' => __('Add Button', 'pluginchief')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Columns Config
/*-----------------------------------------------------------------------------------*/

$pluginchief_shortcodes['columns'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[pluginchief_rows] {{child_shortcode}} [/pluginchief_rows]',
  'popup_title' => __('Insert Columns Shortcode', 'pluginchief'),

  'child_shortcode' => array(
    'params' => array(
      'column' => array(
          'type' => 'select',
          'label' => __('Column Width', 'pluginchief'),
          'desc' => __('Choose column width', 'pluginchief'),
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
          'label' => __('Column Content', 'pluginchief'),
          'desc' => __('Add the column content, you can also insert html tag.', 'pluginchief')
      )
    ),
    'shortcode' => '[pluginchief_column column="{{column}}"] {{content}} [/pluginchief_column]',
    'clone_button' => __('Add Column', 'pluginchief')
  )
);

?>