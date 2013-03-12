<?php

/*-----------------------------------------------------------------------------------*/
/*  Alert Config
/*-----------------------------------------------------------------------------------*/
$mountaininja_shortcodes['alert'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Alert Style', 'mountaininja'),
      'desc' => __('Select the alert\'s type, ie the alert colour', 'mountaininja'),
      'options' => array(
        'warning' => 'Warning',
        'error' => 'Error',
        'success' => 'Success',
        'info' => 'Information'
      )
    ),
    'dismiss' => array(
      'type' => 'checkbox',
      'label' => __('Dismissable', 'mountaininja'),
      'checkbox_text' => __('Is the allert dismissable? Visitor can close the alert', 'mountaininja')
    ),
    'content' => array(
      'std' => 'Alert text',
      'type' => 'textarea',
      'label' => __('Alert Text', 'mountaininja'),
      'desc' => __('Add the alert\'s text.  You can also insert html tag here.', 'mountaininja'),
    )

  ),
  'shortcode' => '[mountaininja_alert style="{{style}}" dismiss="{{dismiss}}" ] {{content}} [/mountaininja_alert]',
  'popup_title' => __('Insert Alert Shortcode', 'mountaininja')
);
/*-----------------------------------------------------------------------------------*/
/*  Well
/*-----------------------------------------------------------------------------------*/
$mountaininja_shortcodes['well'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Well style', 'mountaininja'),
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
      'label' => __('Well\'s Text', 'mountaininja'),
      'desc' => __('Add the well\'s text', 'mountaininja')
    )
  ),
  'shortcode' => '[mountaininja_well style="{{style}}"] {{content}} [/mountaininja_well]',
  'popup_title' => __('Insert Well Shortcode', 'mountaininja')
);

/*-----------------------------------------------------------------------------------*/
/*  Button Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['button'] = array(
  'no_preview' => true,
  'params' => array(
    'url' => array(
      'std' => '',
      'type' => 'text',
      'label' => __('Button URL', 'mountaininja'),
      'desc' => __('Add the button\'s url eg http://example.com', 'mountaininja')
    ),
    'style' => array(
      'type' => 'select',
      'label' => __('Button Style', 'mountaininja'),
      'desc' => __('Select the button\'s style, ie the button\'s colour', 'mountaininja'),
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
      'label' => __('Button Size', 'mountaininja'),
      'desc' => __('Select the button\'s size', 'mountaininja'),
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
      'label' => __('Button Target', 'mountaininja'),
      'desc' => __('_self = open in same window. _blank = open in new window', 'mountaininja'),
      'options' => array(
        '_self' => '_self',
        '_blank' => '_blank'
      )
    ),
    'content' => array(
      'std' => 'Button Text',
      'type' => 'text',
      'label' => __('Button\'s Text', 'mountaininja'),
      'desc' => __('Add the button\'s text', 'mountaininja'),
    ),
    'enable_icon' => array(
      'type' => 'checkbox',
      'label' => __('Button\'s Icon', 'mountaininja'),
      'checkbox_text' => __('Enable icon for button?', 'mountaininja'),
      'show_opt' => 'icon'
    ),
    'icon' => array(
      'type' => 'icon',
      'collapsible' => true,
      'label' => __('Choose Icon', 'mountaininja')
    )
  ),
  'shortcode' => '[mountaininja_button url="{{url}}" style="{{style}}" size="{{size}}" target="{{target}}" icon="{{icon}}"] {{content}} [/mountaininja_button]',
  'popup_title' => __('Insert Button Shortcode', 'mountaininja')
);

/*-----------------------------------------------------------------------------------*/
/*  Inline Label Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['label'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Label style', 'mountaininja'),
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
      'label' => __('Label\'s Text', 'mountaininja'),
      'desc' => __('Add the label\'s text', 'mountaininja')
    )
  ),
  'shortcode' => '[mountaininja_label style="{{style}}"] {{content}} [/mountaininja_label]',
  'popup_title' => __('Insert Inline Label Shortcode', 'mountaininja')
);

/*-----------------------------------------------------------------------------------*/
/*  Badges Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['badge'] = array(
  'no_preview' => true,
  'params' => array(
    'style' => array(
      'type' => 'select',
      'label' => __('Badge style', 'mountaininja'),
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
      'label' => __('Badge\'s Text', 'mountaininja'),
      'desc' => __('Add the badge\'s text', 'mountaininja')
    )
  ),
  'shortcode' => '[mountaininja_badge style="{{style}}"] {{content}} [/mountaininja_badge]',
  'popup_title' => __('Insert Badge Shortcode', 'mountaininja')
);

/*-----------------------------------------------------------------------------------*/
/*  Tabs Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['tabs'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[mountaininja_tabs] {{child_shortcode}} [/mountaininja_tabs]',
  'popup_title' => __('Insert Tab Shortcode', 'mountaininja'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Tab Title', 'mountaininja'),
          'desc' => __('Title of the tab', 'mountaininja')
      ),
      'content' => array(
          'std' => 'Tab content',
          'type' => 'textarea',
          'label' => __('Tab Content', 'mountaininja'),
          'desc' => __('Add the tabs content, you can also insert html tag.', 'mountaininja')
      )
    ),
    'shortcode' => '[mountaininja_tab title="{{title}}"] {{content}} [/mountaininja_tab]',
    'clone_button' => __('Add Tab', 'mountaininja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Toggle Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['toggle'] = array(
  'no_preview' => true,
  'params' => array(
    'title' => array(
      'std' => 'Toggle Title',
      'type' => 'text',
      'label' => __('Toggle\'s Title', 'mountaininja'),
      'desc' => __('Add the toggle\'s title', 'mountaininja')
    ),
    'content' => array(
      'std' => 'Toggle content',
      'type' => 'textarea',
      'label' => __('Toggle\'s Content', 'mountaininja'),
      'desc' => __('Add the toggle\'s content', 'mountaininja')
    )
  ),
  'shortcode' => '[mountaininja_toggle title="{{title}}"] {{content}} [/mountaininja_toggle]',
  'popup_title' => __('Insert Toggle Shortcode', 'mountaininja')
);

/*-----------------------------------------------------------------------------------*/
/*  Accordion Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['accordion'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[mountaininja_accordions] {{child_shortcode}} [/mountaininja_accordions]',
  'popup_title' => __('Insert Accordion Shortcode', 'mountaininja'),

  'child_shortcode' => array(
    'params' => array(
      'title' => array(
          'std' => 'Title',
          'type' => 'text',
          'label' => __('Accordion Title', 'mountaininja'),
          'desc' => __('Title of the accordion', 'mountaininja')
      ),
      'content' => array(
          'std' => 'Accordion content',
          'type' => 'textarea',
          'label' => __('Accordion Content', 'mountaininja'),
          'desc' => __('Add the accordion content, you can also insert html tag.', 'mountaininja')
      )
    ),
    'shortcode' => '[mountaininja_accordion title="{{title}}"] {{content}} [/mountaininja_accordion]',
    'clone_button' => __('Add Accordion', 'mountaininja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Buttons Group Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['buttons_group'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[mountaininja_buttons_group] {{child_shortcode}} [/mountaininja_buttons_group]',
  'popup_title' => __('Insert Buttons Group Shortcode', 'mountaininja'),

  'child_shortcode' => array(
    'params' => $mountaininja_shortcodes['button']['params'],
    'shortcode' => $mountaininja_shortcodes['button']['shortcode'],
    'clone_button' => __('Add Button', 'mountaininja')
  )
);

/*-----------------------------------------------------------------------------------*/
/*  Columns Config
/*-----------------------------------------------------------------------------------*/

$mountaininja_shortcodes['columns'] = array(
  'params' => array(),
  'no_preview' => true,
  'shortcode' => '[mountaininja_rows] {{child_shortcode}} [/mountaininja_rows]',
  'popup_title' => __('Insert Columns Shortcode', 'mountaininja'),

  'child_shortcode' => array(
    'params' => array(
      'column' => array(
          'type' => 'select',
          'label' => __('Column Width', 'mountaininja'),
          'desc' => __('Choose column width', 'mountaininja'),
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
          'label' => __('Column Content', 'mountaininja'),
          'desc' => __('Add the column content, you can also insert html tag.', 'mountaininja')
      )
    ),
    'shortcode' => '[mountaininja_column column="{{column}}"] {{content}} [/mountaininja_column]',
    'clone_button' => __('Add Column', 'mountaininja')
  )
);

?>