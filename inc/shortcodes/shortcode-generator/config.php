<?php

// Buttons shortcode config
$thmchf_shortcodes['button'] = array(
	'params' => array(
		'text' => array(
			'std' 	=> 'Button Text',
			'type' 	=> 'text',
			'label' => __('Button Text', 'textdomain'),
		),
		'url' => array(
			'std' 	=> 'http://themechief.com',
			'type' 	=> 'text',
			'label' => __('Button\'s URL', 'textdomain'),
		),
		'target' => array(
			'type' 		=> 'select',
			'label' 	=> __('Link Target', 'textdomain'),
			'options' 	=> array(
				'_self' 	=> 'Same Window',
				'_blank' 	=> 'New Window'
			)
		),
		'size' => array(
			'type' 		=> 'select',
			'label' 	=> __('Button\'s Size', 'textdomain'),
			'options' 	=> array(
				'btn-mini' 	=> 'Mini',
				'btn-small' => 'Small',
				'btn-large'	=> 'Large'
			)
		),
		'style' => array(
			'type' 		=> 'select',
			'label' 	=> __('Button\'s Style', 'textdomain'),
			'options' 	=> array(
				'' 				=> 'Default',
				'btn-primary' 	=> 'Primary',
				'btn-info' 		=> 'Info',
				'btn-success'	=> 'Success',
				'btn-warning' 	=> 'Warning',
				'btn-danger'	=> 'Danger',
				'btn-inverse'	=> 'Inverse'
			)
		),
		'align' => array(
			'type' 		=> 'select',
			'label' 	=> __('Button\'s Alignment', 'textdomain'),
			'options' 	=> array(
				'pull-left' 	=> 'Left',
				'pull-right' 	=> 'Right',
				'pull-center'	=> 'Center'
			)
		),
		'icon' => array(
			'type' 		=> 'select',
			'label' 	=> __('Button\'s Icon', 'textdomain'),
			'options' 	=> array(
				'icon-glass' => 'Glass',
				'icon-music' => 'Music',
				'icon-search' => 'Search',
				'icon-envelope' => 'Envelope',
				'icon-heart' => 'Heart',
				'icon-star' => 'Star',
				'icon-star-empty' => 'Star Empty',
				'icon-user' => 'User',
				'icon-film' => 'Film',
				'icon-th-large' => 'Th Large',
				'icon-th' => 'Th',
				'icon-th-list' => 'Th List',
				'icon-ok' => 'OK',
				'icon-remove' => 'Remove',
				'icon-zoom-in' => 'Zoom In',
				'icon-zoom-out' => 'Zoom Out',
				'icon-off' => 'Off',
				'icon-signal' => 'Signal',
				'icon-cog' => 'Cog',
				'icon-trash' => 'Trash',
				'icon-home' => 'Home',
				'icon-file' => 'File',
				'icon-time' => 'Time',
				'icon-road' => 'Road',
				'icon-download-alt' => 'Download Alt.',
				'icon-download' => 'Download',
				'icon-upload' => 'Upload',
				'icon-inbox' => 'Inbox',
				'icon-play-circle' => 'Play Circle',
				'icon-repeat' => 'Repeat',
				'icon-refresh' => 'Refresh',
				'icon-list-alt' => 'List Alt.',
				'icon-lock' => 'Lock',
				'icon-flag' => 'Flag',
				'icon-headphones' => 'headphones',
				'icon-volume-off' => 'Volume Off',
				'icon-volume-down' => 'Volume Down',
				'icon-volume-up' => 'Volume Up',
				'icon-qrcode' => 'QR Code',
				'icon-barcode' => 'Barcode',
				'icon-tag' => 'Tag',
				'icon-tags' => 'Tags',
				'icon-book' => 'Book',
				'icon-bookmark' => 'Bookmark',
				'icon-print' => 'Print',
				'icon-camera' => 'Camera',
				'icon-font' => 'Font',
				'icon-bold' => 'Bold',
				'icon-italic' => 'Italic',
				'icon-text-height' => 'Text Height',
				'icon-text-width' => 'Text Width',
				'icon-align-left' => 'Align Left',
				'icon-align-center' => 'Align Center',
				'icon-align-right' => 'Align Right',
				'icon-align-justify' => 'Align Justify',
				'icon-list' => 'List',
				'icon-indent-left' => 'Indent Left',
				'icon-indent-right' => 'Indent Right',
				'icon-facetime-video' => 'Facetime Video',
				'icon-picture' => 'Picture',
				'icon-pencil' => 'Pencil',
				'icon-map-marker' => 'Map Marker',
				'icon-adjust' => 'Adjust',
				'icon-tint' => 'Tint',
				'icon-edit' => 'Edit',
				'icon-share' => 'Share',
				'icon-check' => 'Check',
				'icon-move' => 'Move',
				'icon-step-backward' => 'Step Backward',
				'icon-fast-backward' => 'Fast Forward',
				'icon-backward' => 'Backward',
				'icon-play' => 'Play',
				'icon-pause' => 'Pause',
				'icon-stop' => 'Stop',
				'icon-forward' => 'Forward',
				'icon-fast-forward' => 'Fast Forward',
				'icon-step-forward' => 'Step Forward',
				'icon-eject' => 'Eject',
				'icon-chevron-left' => 'Chevron Left',
				'icon-chevron-right' => 'Chevron Right',
				'icon-plus-sign' => 'Plus Sign',
				'icon-minus-sign' => 'Minus Sign',
				'icon-remove-sign' => 'Remove Sign',
				'icon-ok-sign' => 'OK Sign',
				'icon-question-sign' => 'Question Sign',
				'icon-info-sign' => 'Info Sign',
				'icon-screenshot' => 'Screenshot',
				'icon-remove-circle' => 'Remove Circle',
				'icon-ok-circle' => 'OK Circle',
				'icon-ban-circle' => 'Ban Circle',
				'icon-arrow-left' => 'Arrow Left',
				'icon-arrow-right' => 'Arrow Right',
				'icon-arrow-up' => 'Arrow Up',
				'icon-arrow-down' => 'Arrow Down',
				'icon-share-alt' => 'Share Alt',
				'icon-resize-full' => 'Resize Full',
				'icon-resize-small' => 'Resize Small',
				'icon-plus' => 'Plus',
				'icon-minus' => 'Minus',
				'icon-asterisk' => 'Asterisk',
				'icon-exclamation-sign' => 'Exclamation Sign',
				'icon-gift' => 'Gift',
				'icon-leaf' => 'Leaf',
				'icon-fire' => 'Fire',
				'icon-eye-open' => 'Eye Open',
				'icon-eye-close' => 'Eye Close',
				'icon-warning-sign' => 'Warning sign',
				'icon-plane' => 'Plane',
				'icon-calendar' => 'Calendar',
				'icon-random' => 'Random',
				'icon-comment' => 'Comment',
				'icon-magnet' => 'Magnent',
				'icon-chevron-up' => 'Chevron Up',
				'icon-chevron-down' => 'Chevron Down',
				'icon-retweet' => 'Retweet',
				'icon-shopping-cart' => 'Shopping Cart',
				'icon-folder-close' => 'Folder Close',
				'icon-folder-open' => 'Folder Open',
				'icon-resize-vertical' => 'Resize Vertical',
				'icon-resize-horizontal' => 'Resize Horizontal',
				'icon-hdd' => 'HDD',
				'icon-bullhorn' => 'Bullhorn',
				'icon-bell' => 'Bell',
				'icon-certificate' => 'Certificate',
				'icon-thumbs-up' => 'Thumbs Up',
				'icon-thumbs-down' => 'Thumbs Down',
				'icon-hand-right' => 'Hand Right',
				'icon-hand-left' => 'Hand Left',
				'icon-hand-up' => 'Hand Up',
				'icon-hand-down' => 'Hand Down',
				'icon-circle-arrow-right' => 'Arrow Right',
				'icon-circle-arrow-left' => 'Arrow Left',
				'icon-circle-arrow-up' => 'Arrow Up',
				'icon-circle-arrow-down' => 'Arrow Down',
				'icon-globe' => 'Globe',
				'icon-wrench' => 'Wrench',
				'icon-tasks' => 'Tasks',
				'icon-filter' => 'Filter',
				'icon-briefcase' => 'Briefcase',
				'icon-fullscreen' => 'Fullscreen'

			)
		),
		'iconcolor' => array(
			'type' 		=> 'select',
			'label' 	=> __('Icon Color', 'textdomain'),
			'options' 	=> array(
				'#006699' 	=> 'Blue',
				'#ffcc00' 	=> 'Yellow',
				'#000000' 	=> 'Black',
				'#ffffff' 	=> 'White',
				'#cc3333' 	=> 'Red'
			)
		),
	),
	'shortcode' 	=> '[thm_chf_button text="{{text}}" url="{{url}}" target="{{target}}" size="{{size}}" style="{{style}}" align="{{align}}" icon="{{icon}}" iconcolor="{{iconcolor}}"]',
	'popup_title' 	=> __('Insert Button Shortcode', 'textdomain')
);

// Buttons shortcode config
$thmchf_shortcodes['icon'] = array(
	'params' => array(
		'border' => array(
			'std' 	=> 'border',
			'type' 	=> 'select',
			'label' => __('Icon Border', 'textdomain'),
			'options' 	=> array(
				'border-' 	=> 'Border',
				'' 			=> 'No Border',
			)
		),
		'size' => array(
			'std' 	=> 'medium',
			'type' 	=> 'select',
			'label' => __('Icon\'s Size', 'textdomain'),
			'options' 	=> array(
				'small' 	=> 'Small',
				'medium' 	=> 'Medium',
				'large' 	=> 'Large',
			)
		),
		'align' => array(
			'std' 		=> '_self',
			'type' 		=> 'select',
			'label' 	=> __('Align', 'textdomain'),
			'desc' 		=> __('Open the link in the same window or a new window', 'textdomain'),
			'options' 	=> array(
				'pull-left' 	=> 'Left',
				'pull-right' 	=> 'Right',
				'pull-center'	=> 'Center'
			)
		),
		'icon' => array(
			'std' 		=> 'icon-heart',
			'type' 		=> 'select',
			'label' 	=> __('Button\'s Icon', 'textdomain'),
			'options' 	=> array(
				'icon-glass' => 'Glass',
				'icon-music' => 'Music',
				'icon-search' => 'Search',
				'icon-envelope' => 'Envelope',
				'icon-heart' => 'Heart',
				'icon-star' => 'Star',
				'icon-star-empty' => 'Star Empty',
				'icon-user' => 'User',
				'icon-film' => 'Film',
				'icon-th-large' => 'Th Large',
				'icon-th' => 'Th',
				'icon-th-list' => 'Th List',
				'icon-ok' => 'OK',
				'icon-remove' => 'Remove',
				'icon-zoom-in' => 'Zoom In',
				'icon-zoom-out' => 'Zoom Out',
				'icon-off' => 'Off',
				'icon-signal' => 'Signal',
				'icon-cog' => 'Cog',
				'icon-trash' => 'Trash',
				'icon-home' => 'Home',
				'icon-file' => 'File',
				'icon-time' => 'Time',
				'icon-road' => 'Road',
				'icon-download-alt' => 'Download Alt.',
				'icon-download' => 'Download',
				'icon-upload' => 'Upload',
				'icon-inbox' => 'Inbox',
				'icon-play-circle' => 'Play Circle',
				'icon-repeat' => 'Repeat',
				'icon-refresh' => 'Refresh',
				'icon-list-alt' => 'List Alt.',
				'icon-lock' => 'Lock',
				'icon-flag' => 'Flag',
				'icon-headphones' => 'headphones',
				'icon-volume-off' => 'Volume Off',
				'icon-volume-down' => 'Volume Down',
				'icon-volume-up' => 'Volume Up',
				'icon-qrcode' => 'QR Code',
				'icon-barcode' => 'Barcode',
				'icon-tag' => 'Tag',
				'icon-tags' => 'Tags',
				'icon-book' => 'Book',
				'icon-bookmark' => 'Bookmark',
				'icon-print' => 'Print',
				'icon-camera' => 'Camera',
				'icon-font' => 'Font',
				'icon-bold' => 'Bold',
				'icon-italic' => 'Italic',
				'icon-text-height' => 'Text Height',
				'icon-text-width' => 'Text Width',
				'icon-align-left' => 'Align Left',
				'icon-align-center' => 'Align Center',
				'icon-align-right' => 'Align Right',
				'icon-align-justify' => 'Align Justify',
				'icon-list' => 'List',
				'icon-indent-left' => 'Indent Left',
				'icon-indent-right' => 'Indent Right',
				'icon-facetime-video' => 'Facetime Video',
				'icon-picture' => 'Picture',
				'icon-pencil' => 'Pencil',
				'icon-map-marker' => 'Map Marker',
				'icon-adjust' => 'Adjust',
				'icon-tint' => 'Tint',
				'icon-edit' => 'Edit',
				'icon-share' => 'Share',
				'icon-check' => 'Check',
				'icon-move' => 'Move',
				'icon-step-backward' => 'Step Backward',
				'icon-fast-backward' => 'Fast Forward',
				'icon-backward' => 'Backward',
				'icon-play' => 'Play',
				'icon-pause' => 'Pause',
				'icon-stop' => 'Stop',
				'icon-forward' => 'Forward',
				'icon-fast-forward' => 'Fast Forward',
				'icon-step-forward' => 'Step Forward',
				'icon-eject' => 'Eject',
				'icon-chevron-left' => 'Chevron Left',
				'icon-chevron-right' => 'Chevron Right',
				'icon-plus-sign' => 'Plus Sign',
				'icon-minus-sign' => 'Minus Sign',
				'icon-remove-sign' => 'Remove Sign',
				'icon-ok-sign' => 'OK Sign',
				'icon-question-sign' => 'Question Sign',
				'icon-info-sign' => 'Info Sign',
				'icon-screenshot' => 'Screenshot',
				'icon-remove-circle' => 'Remove Circle',
				'icon-ok-circle' => 'OK Circle',
				'icon-ban-circle' => 'Ban Circle',
				'icon-arrow-left' => 'Arrow Left',
				'icon-arrow-right' => 'Arrow Right',
				'icon-arrow-up' => 'Arrow Up',
				'icon-arrow-down' => 'Arrow Down',
				'icon-share-alt' => 'Share Alt',
				'icon-resize-full' => 'Resize Full',
				'icon-resize-small' => 'Resize Small',
				'icon-plus' => 'Plus',
				'icon-minus' => 'Minus',
				'icon-asterisk' => 'Asterisk',
				'icon-exclamation-sign' => 'Exclamation Sign',
				'icon-gift' => 'Gift',
				'icon-leaf' => 'Leaf',
				'icon-fire' => 'Fire',
				'icon-eye-open' => 'Eye Open',
				'icon-eye-close' => 'Eye Close',
				'icon-warning-sign' => 'Warning sign',
				'icon-plane' => 'Plane',
				'icon-calendar' => 'Calendar',
				'icon-random' => 'Random',
				'icon-comment' => 'Comment',
				'icon-magnet' => 'Magnent',
				'icon-chevron-up' => 'Chevron Up',
				'icon-chevron-down' => 'Chevron Down',
				'icon-retweet' => 'Retweet',
				'icon-shopping-cart' => 'Shopping Cart',
				'icon-folder-close' => 'Folder Close',
				'icon-folder-open' => 'Folder Open',
				'icon-resize-vertical' => 'Resize Vertical',
				'icon-resize-horizontal' => 'Resize Horizontal',
				'icon-hdd' => 'HDD',
				'icon-bullhorn' => 'Bullhorn',
				'icon-bell' => 'Bell',
				'icon-certificate' => 'Certificate',
				'icon-thumbs-up' => 'Thumbs Up',
				'icon-thumbs-down' => 'Thumbs Down',
				'icon-hand-right' => 'Hand Right',
				'icon-hand-left' => 'Hand Left',
				'icon-hand-up' => 'Hand Up',
				'icon-hand-down' => 'Hand Down',
				'icon-circle-arrow-right' => 'Arrow Right',
				'icon-circle-arrow-left' => 'Arrow Left',
				'icon-circle-arrow-up' => 'Arrow Up',
				'icon-circle-arrow-down' => 'Arrow Down',
				'icon-globe' => 'Globe',
				'icon-wrench' => 'Wrench',
				'icon-tasks' => 'Tasks',
				'icon-filter' => 'Filter',
				'icon-briefcase' => 'Briefcase',
				'icon-fullscreen' => 'Fullscreen'

			)
		),
		'iconcolor' => array(
			'type' 		=> 'select',
			'label' 	=> __('Icon Color', 'textdomain'),
			'options' 	=> array(
				'#ffffff' 	=> 'White',
				'#006699' 	=> 'Blue',
				'#ffcc00' 	=> 'Yellow',
				'#000000' 	=> 'Black',
				'#cc3333' 	=> 'Red'
			)
		),
		'bordercolor' => array(
			'type' 		=> 'select',
			'label' 	=> __('Border Color', 'textdomain'),
			'options' 	=> array(
				'#ffffff' 	=> 'White',
				'#006699' 	=> 'Blue',
				'#ffcc00' 	=> 'Yellow',
				'#000000' 	=> 'Black',
				'#cc3333' 	=> 'Red'
			)
		),
	),
	'shortcode' => '[thm_chf_icon border="{{border}}" size="{{size}}" align="{{align}}" icon="{{icon}}" iconcolor="{{iconcolor}}" bordercolor="{{bordercolor}}"]',
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);

// Alerts shortcode config
$thmchf_shortcodes['alert'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert\'s Style', 'textdomain'),
			'desc' => __('Select the slter\'s style, ie the alert colour', 'textdomain'),
			'options' => array(
				'white' => 'White',
				'red' => 'Red',
				'orange' => 'Orange',
				'green' => 'Green'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert\'s Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		)
		
	),
	'shortcode' => '[alert style="{{style}}"] {{content}} [/alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

// Toggle content shortcode config
$thmchf_shortcodes['toggle'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content.', 'textdomain'),
		)
		
	),
	'shortcode' => '[toggle title="{{title}}"] {{content}} [/toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);

// Tabs
$thmchf_shortcodes['tabs'] = array(
    'params' => array(
        'tabs' => array(
            'type' => 'text',
            'label' => __('Tab Titles', 'eandc'),
            'desc' => __('Please enter the tab titles here, seperating each by a comma. They must match the tabs that are created below.', 'eandc')
        )
    ),
    'no_preview' => true,
    'shortcode' => '[tabs tabs="{{tabs}}"] {{child_shortcode}}  [/tabs]',
    'popup_title' => __('Insert Column Shortcode', 'eandc'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'eandc'),
                'desc' => __('Title of the tab', 'eandc'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'eandc'),
                'desc' => __('Add the tabs content', 'eandc')
            )
        ),
        'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
        'clone_button' => __('Add Tab', 'eandc')
    )
);

// Column Row
$thmchf_shortcodes['column_row'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'half' 			=> 'One Half',
					'third' 		=> 'One Third',
					'two-third' 	=> 'Two Third',
					'fourth' 		=> 'One Fourth Last',
					'three-fourth' 	=> 'Three Fourth',
				)
			),
			'content' => array(
				'std' 	=> '',
				'type' 	=> 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' 	=> __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' 	=> '[thm_chf_column size="{{column}}"] {{content}} [/thm_chf_column]',
		'clone_button' 	=> __('Add Column', 'textdomain')
	)
);

// Columns
$thmchf_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'half' 			=> 'One Half',
					'third' 		=> 'One Third',
					'two-third' 	=> 'Two Third',
					'fourth' 		=> 'One Fourth Last',
					'three-fourth' 	=> 'Three Fourth',
				)
			),
			'content' => array(
				'std' 	=> '',
				'type' 	=> 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' 	=> __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' 	=> '[thm_chf_column size="{{column}}"] {{content}} [/thm_chf_column]',
		'clone_button' 	=> __('Add Column', 'textdomain')
	)
);

?>