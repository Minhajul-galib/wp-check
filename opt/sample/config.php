<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'globaMaindData';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Data Settings', 'your-textdomain-here' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Data Settings', 'your-textdomain-here' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => false,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => false,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => false,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => false,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => false,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => false,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => false,
);


Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */


/*
 * ---> START SECTIONS
 */
Redux::set_section($opt_name,[
	'title'							=>'Website Customization',
	'fields'						=>[
		[
			'title'					=> 'Logo',
			'id'					=> 'Logo_id',
			'type'					=>'media'
		],
		[
			'title'					=> 'Banner img',
			'id'					=> 'Banner_img',
			'type'					=>'media'
		]
	]
]);

Redux::set_section($opt_name,[
	'title'							=>'Custom Code',
	'icon'							=>'el el-star-empty',
	'fields'						=>[
		[
			'title'					=>'Custom CSS',
			'id'					=>'cus-css',
			'type'					=>'ace_editor',
			'theme'					=>'gob',
			'mode'					=>'css'
		],
		[
			'title'					=>'Custom js',
			'id'					=>'cus-js',
			'type'					=>'ace_editor',
			'theme'					=>'gob',
			'mode'					=>'javascript'
		]
	]
]);

// February Commitment-----------------------------------

Redux::set_section($opt_name,[
	'title'						=>'February Commitment',
	'fields'					=>[
		[
			'title'					=>'COM NAME',
			'id'					=>'COM_NO',
			'type'					=>'text'
		]
	]
]);
// -----------------------------------END February Commitment


//  MATERIAL & PRODUCTION TRACKING--------------------------

	Redux::set_section($opt_name,[
		'title'						=>'MATERIAL & PRODUCTION TRACKING',
		'subsection'				=>true,
		'fields'					=>[
			[
				'title'					=>'COM NAME',
				'id'					=>'COM_NO',
				'type'					=>'text'
			]
		]
	]);
	
	
// END MATERIAL & PRODUCTION TRACKING----------------------------



// COMMITMENT QUANTITY (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"COMMITMENT QUANTITY (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'COMMITMENT_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'COMMITMENT_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'COMMITMENT_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'COMMITMENT_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'COMMITMENT_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'COMMITMENT_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'COMMITMENT_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'COMMITMENT_NOTE',
			'type'  					=>'text',
		]
	]
	
]);
// END COMMITMENT QUANTITY (PCS) -------------------------------------



// GREIGE FABRIC ALLOCATED FOR (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'GREIGE_FABRIC_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'GREIGE_FABRIC_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'GREIGE_FABRIC_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'GREIGE_FABRIC_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'GREIGE_FABRIC_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'GREIGE_FABRIC_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'GREIGE_FABRIC_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'GREIGE_FABRIC_NOTE',
			'type'  					=>'text',
		]
	
	]
		]);
// END GREIGE FABRIC ALLOCATED FOR (PCS)	 -------------------------------------


// DYED FABRIC ALLOCATED FOR (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'DYED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END DYED FABRIC ALLOCATED FOR (PCS) ------------------------------------------


// RFID ALLOCATED FOR (PCS)	--------------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"RFID ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'RFID_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END RFID ALLOCATED FOR (PCS)-----------------------------------------------


// POLY ALLOCATED FOR (PCS)	-----------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"POLY FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'POLY_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END POLY ALLOCATED FOR (PCS)--------------------------------------	


// 2nd GREIGE FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'Sec_GREIGE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Sec_GREIGE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Sec_GREIGE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Sec_GREIGE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'Sec_GREIGE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'Sec_GREIGE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Sec_GREIGE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Sec_GREIGE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd GREIGE FABRIC AVAILABLE (PCS)-------------------------------------------

// 2nd DYED FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'Sec_DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Sec_DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Sec_DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Sec_DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'Sec_DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'Sec_DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Sec_DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Sec_DYED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd DYED FABRIC AVAILABLE (PCS)------------------------------------------

// 2nd RFID AVAILABLE (PCS)		------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"RFID AVAILABLE (PCS)	",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'Sec_RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Sec_RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Sec_RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Sec_RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXL',
			'id'						=>'Sec_RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'Sec_RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Sec_RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Sec_RFID_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd RFID AVAILABLE (PCS)	------------------------------------------

// 2nd POLY AVAILABLE (PCS)	------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"POLY AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'Sec_POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Sec_POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Sec_POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Sec_POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'Sec_POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'Sec_POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Sec_POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Sec_POLY_NOTE',
			'type'  					=>'text',
		]
	]
]);		
// 2nd POLY AVAILABLE (PCS)	End --------------------------------------


// CUTTING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'CUTTING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'CUTTING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'CUTTING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'CUTTING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'CUTTING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'CUTTING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'CUTTING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'CUTTING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
	]);
// CUTTING COMPLETED (PCS) END------------------------------------

// CUTTING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'CUTTING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'CUTTING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'CUTTING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'CUTTING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'CUTTING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'CUTTING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'CUTTING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'CUTTING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// SEWING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'SEWING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'SEWING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'SEWING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'SEWING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'SEWING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'SEWING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'SEWING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'SEWING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// SEWING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'SEWING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'SEWING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'SEWING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'SEWING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'SEWING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'SEWING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'SEWING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'SEWING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// PO ALLOCATION		---------------------------------------

Redux::set_section($opt_name,[
	'title'							=>'PO ALLOCATION',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'PO NO',
			'id'						=>'PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'PO_ALLOCATION_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'PO_ALLOCATION_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'PO_ALLOCATION_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'PO_ALLOCATION_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'PO_ALLOCATION_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'PO_ALLOCATION_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'PO_ALLOCATION_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'PO_ALLOCATION_NOTE',
			'type'  					=>'text',
		]

	]
]);
// END PO ALLOCATION -----------------------------------------------------
		


// Total Allocated To PO Qnty (Pcs) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'Total Allocated To PO Qnty (Pcs)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'Total_Allocated_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Total_Allocated_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Total_Allocated_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Total_Allocated_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'Total_Allocated_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'Total_Allocated_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Total_Allocated_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Total_Allocated_NOTE',
			'type'  					=>'text',
		]
	]
]);
// Total Allocated To PO Qnty (Pcs) END------------------------------------



// PACKING PARTICULARS------------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"PACKING PARTICULARS",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'PO NO',
			'id'						=>'PACKING_PARTICULARS_PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'PACKING_PARTICULARS_Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'PACKING_PARTICULARS_Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'PACKING_PARTICULARS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'PACKING_PARTICULARS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'PACKING_PARTICULARS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'PACKING_PARTICULARS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'PACKING_PARTICULARS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'PACKING_PARTICULARS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'PACKING_PARTICULARS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'PACKING_PARTICULARS_NOTE',
			'type'  					=>'text',
		]
	]
]);
// PACKING PARTICULARS---------------------------------------------------------------


// Total Packed Quantity (Pcs)	------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"Total Packed Quantity (Pcs)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'Total_Packed_Quantity_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'Total_Packed_Quantity_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'Total_Packed_Quantity_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'Total_Packed_Quantity_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'Total_Packed_Quantity_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXXL',
			'id'						=>'Total_Packed_Quantity_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'Total_Packed_Quantity_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'Total_Packed_Quantity_NOTE',
			'type'  					=>'text',
		]
	]
]);
// End  Total Packed Quantity (Pcs)----------------------------------------------



// AVAILABLE GMTS TO ISSUE PO (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"AVAILABLE GMTS TO ISSUE PO (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'AVAILABLE_GMTS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'AVAILABLE_GMTS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'AVAILABLE_GMTS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'AVAILABLE_GMTS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'AVAILABLE_GMTS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'AVAILABLE_GMTS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'AVAILABLE_GMTS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'AVAILABLE_GMTS_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END AVAILABLE GMTS TO ISSUE PO (PCS)	--------------------------------------






// March Commitment-----------------------------------
Redux::set_section($opt_name,[
	'title'						=>'March Commitment',
	'fields'					=>[
		[
			'title'					=>'COM NAME',
			'id'					=>'March_COM_NO',
			'type'					=>'text'
		]
	]
]);
// -----------------------------------END March Commitment


//  MATERIAL & PRODUCTION TRACKING--------------------------

	Redux::set_section($opt_name,[
		'title'						=>'MATERIAL & PRODUCTION TRACKING',
		'subsection'				=>true,
		'fields'					=>[
			[
				'title'					=>'COM NAME',
				'id'					=>'March_COM_NO',
				'type'					=>'text'
			]
		]
	]);
	
	
// END MATERIAL & PRODUCTION TRACKING----------------------------



// COMMITMENT QUANTITY (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"COMMITMENT QUANTITY (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_COMMITMENT_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'March_COMMITMENT_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_COMMITMENT_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_COMMITMENT_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_COMMITMENT_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_COMMITMENT_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_COMMITMENT_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_COMMITMENT_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END COMMITMENT QUANTITY (PCS) -------------------------------------

// GREIGE FABRIC ALLOCATED FOR (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_GREIGE_FABRIC_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'March_GREIGE_FABRIC_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_GREIGE_FABRIC_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_GREIGE_FABRIC_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_GREIGE_FABRIC_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_GREIGE_FABRIC_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_GREIGE_FABRIC_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_GREIGE_FABRIC_NOTE',
			'type'  					=>'text',
		]
	
	]
]);
// END GREIGE FABRIC ALLOCATED FOR (PCS)	 -------------------------------------


// DYED FABRIC ALLOCATED FOR (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_DYED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END DYED FABRIC ALLOCATED FOR (PCS) ------------------------------------------


// RFID ALLOCATED FOR (PCS)	--------------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"RFID ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_RFID_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END RFID ALLOCATED FOR (PCS)-----------------------------------------------


// POLY ALLOCATED FOR (PCS)	-----------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"POLY FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_POLY_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END POLY ALLOCATED FOR (PCS)--------------------------------------	


// 2nd GREIGE FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_Sec_GREIGE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Sec_GREIGE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Sec_GREIGE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Sec_GREIGE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_Sec_GREIGE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_Sec_GREIGE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Sec_GREIGE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Sec_GREIGE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd GREIGE FABRIC AVAILABLE (PCS)-------------------------------------------

// 2nd DYED FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_Sec_DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Sec_DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Sec_DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Sec_DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_Sec_DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_Sec_DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Sec_DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Sec_DYED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd DYED FABRIC AVAILABLE (PCS)------------------------------------------

// 2nd RFID AVAILABLE (PCS)		------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"RFID AVAILABLE (PCS)	",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_Sec_RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Sec_RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Sec_RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Sec_RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXL',
			'id'						=>'March_Sec_RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_Sec_RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Sec_RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Sec_RFID_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd RFID AVAILABLE (PCS)	------------------------------------------

// 2nd POLY AVAILABLE (PCS)	------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"POLY AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_Sec_POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Sec_POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Sec_POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Sec_POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_Sec_POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_Sec_POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Sec_POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Sec_POLY_NOTE',
			'type'  					=>'text',
		]
	]
]);	
// 2nd POLY AVAILABLE (PCS)	End --------------------------------------


// CUTTING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'March_CUTTING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_CUTTING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_CUTTING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_CUTTING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_CUTTING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_CUTTING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_CUTTING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_CUTTING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
	]);
// CUTTING COMPLETED (PCS) END------------------------------------

// CUTTING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_CUTTING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_CUTTING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_CUTTING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_CUTTING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_CUTTING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_CUTTING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_CUTTING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_CUTTING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// SEWING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'March_SEWING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_SEWING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_SEWING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_SEWING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_SEWING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_SEWING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_SEWING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_SEWING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
]);

// CUTTING BALANCE (PCS) END------------------------------------


// SEWING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'March_SEWING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_SEWING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_SEWING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_SEWING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_SEWING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_SEWING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_SEWING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_SEWING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// PO ALLOCATION		---------------------------------------

Redux::set_section($opt_name,[
	'title'							=>'PO ALLOCATION',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'PO NO',
			'id'						=>'March_PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'March_Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'March_Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'March_PO_ALLOCATION_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_PO_ALLOCATION_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_PO_ALLOCATION_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_PO_ALLOCATION_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_PO_ALLOCATION_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_PO_ALLOCATION_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_PO_ALLOCATION_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_PO_ALLOCATION_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END PO ALLOCATION -----------------------------------------------------
		


// Total Allocated To PO Qnty (Pcs) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'Total Allocated To PO Qnty (Pcs)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'March_Total_Allocated_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Total_Allocated_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Total_Allocated_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Total_Allocated_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_Total_Allocated_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_Total_Allocated_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Total_Allocated_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Total_Allocated_NOTE',
			'type'  					=>'text',
		]
	]
]);
// Total Allocated To PO Qnty (Pcs) END------------------------------------



// PACKING PARTICULARS------------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"PACKING PARTICULARS",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'PO NO',
			'id'						=>'March_PACKING_PARTICULARS_PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'March_PACKING_PARTICULARS_Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'March_PACKING_PARTICULARS_Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'March_PACKING_PARTICULARS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_PACKING_PARTICULARS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_PACKING_PARTICULARS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_PACKING_PARTICULARS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_PACKING_PARTICULARS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_PACKING_PARTICULARS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_PACKING_PARTICULARS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_PACKING_PARTICULARS_NOTE',
			'type'  					=>'text',
		]
	]
]);
// PACKING PARTICULARS---------------------------------------------------------------


// Total Packed Quantity (Pcs)	------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"Total Packed Quantity (Pcs)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_Total_Packed_Quantity_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_Total_Packed_Quantity_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_Total_Packed_Quantity_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_Total_Packed_Quantity_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_Total_Packed_Quantity_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXXL',
			'id'						=>'March_Total_Packed_Quantity_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_Total_Packed_Quantity_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_Total_Packed_Quantity_NOTE',
			'type'  					=>'text',
		]
	]
]);
// End  Total Packed Quantity (Pcs)----------------------------------------------



// AVAILABLE GMTS TO ISSUE PO (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"AVAILABLE GMTS TO ISSUE PO (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'March_AVAILABLE_GMTS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'March_AVAILABLE_GMTS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'March_AVAILABLE_GMTS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'March_AVAILABLE_GMTS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'March_AVAILABLE_GMTS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'March_AVAILABLE_GMTS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'March_AVAILABLE_GMTS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'March_AVAILABLE_GMTS_NOTE',
			'type'  					=>'text',
		]
	]
]);
// MARCH END 


// APRIL START ............................


// April Commitment-----------------------------------

Redux::set_section($opt_name,[
	'title'						=>'April Commitment',
	'fields'					=>[
		[
			'title'					=>'COM NAME',
			'id'					=>'April_COM_NO',
			'type'					=>'text'
		]
	]
]);
// -----------------------------------END April Commitment


//  MATERIAL & PRODUCTION TRACKING--------------------------

	Redux::set_section($opt_name,[
		'title'						=>'MATERIAL & PRODUCTION TRACKING',
		'subsection'				=>true,
		'fields'					=>[
			[
				'title'					=>'COM NAME',
				'id'					=>'April_COM_NO',
				'type'					=>'text'
			]
		]
	]);
	
// END MATERIAL & PRODUCTION TRACKING----------------------------



// COMMITMENT QUANTITY (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"COMMITMENT QUANTITY (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_COMMITMENT_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'April_COMMITMENT_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_COMMITMENT_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_COMMITMENT_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_COMMITMENT_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_COMMITMENT_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_COMMITMENT_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_COMMITMENT_NOTE',
			'type'  					=>'text',
		],

	]
]);
// END COMMITMENT QUANTITY (PCS) -------------------------------------

// GREIGE FABRIC ALLOCATED FOR (PCS)	-------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_GREIGE_FABRIC_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		
		],
		[
			'title'						=>'M',
			'id'						=>'April_GREIGE_FABRIC_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_GREIGE_FABRIC_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_GREIGE_FABRIC_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_GREIGE_FABRIC_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_GREIGE_FABRIC_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_GREIGE_FABRIC_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_GREIGE_FABRIC_NOTE',
			'type'  					=>'text',
		],
	
	]
]);
// END GREIGE FABRIC ALLOCATED FOR (PCS)	 -------------------------------------


// DYED FABRIC ALLOCATED FOR (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_DYED_NOTE',
			'type'  					=>'text',
		],

	]
]);
// END DYED FABRIC ALLOCATED FOR (PCS) ------------------------------------------


// RFID ALLOCATED FOR (PCS)	--------------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"RFID ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_RFID_NOTE',
			'type'  					=>'text',
		],
	]
]);
// END RFID ALLOCATED FOR (PCS)-----------------------------------------------


// POLY ALLOCATED FOR (PCS)	-----------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"POLY FABRIC ALLOCATED FOR (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_POLY_NOTE',
			'type'  					=>'text',
		],
	]
]);
// END POLY ALLOCATED FOR (PCS)--------------------------------------	


// 2nd GREIGE FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"GREIGE FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_Sec_GREIGE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Sec_GREIGE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Sec_GREIGE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Sec_GREIGE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_Sec_GREIGE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_Sec_GREIGE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Sec_GREIGE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Sec_GREIGE_NOTE',
			'type'  					=>'text',
		],
	]
]);
// END 2nd GREIGE FABRIC AVAILABLE (PCS)-------------------------------------------

// 2nd DYED FABRIC AVAILABLE (PCS)	-----------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"DYED FABRIC AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_Sec_DYED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Sec_DYED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Sec_DYED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Sec_DYED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_Sec_DYED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_Sec_DYED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Sec_DYED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Sec_DYED_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd DYED FABRIC AVAILABLE (PCS)------------------------------------------

// 2nd RFID AVAILABLE (PCS)		------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"RFID AVAILABLE (PCS)	",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_Sec_RFID_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Sec_RFID_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Sec_RFID_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Sec_RFID_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXL',
			'id'						=>'April_Sec_RFID_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_Sec_RFID_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Sec_RFID_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Sec_RFID_NOTE',
			'type'  					=>'text',
		]
	]
]);
// END 2nd RFID AVAILABLE (PCS)	------------------------------------------

// 2nd POLY AVAILABLE (PCS)	------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"POLY AVAILABLE (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_Sec_POLY_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Sec_POLY_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Sec_POLY_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Sec_POLY_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_Sec_POLY_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_Sec_POLY_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Sec_POLY_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Sec_POLY_NOTE',
			'type'  					=>'text',
		]
	]
]);	
// 2nd POLY AVAILABLE (PCS)	End --------------------------------------


// CUTTING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'April_CUTTING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_CUTTING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_CUTTING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_CUTTING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_CUTTING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_CUTTING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_CUTTING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_CUTTING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
	]);
// CUTTING COMPLETED (PCS) END------------------------------------

// CUTTING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'CUTTING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_CUTTING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_CUTTING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_CUTTING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_CUTTING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_CUTTING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_CUTTING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_CUTTING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_CUTTING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// SEWING COMPLETED (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING COMPLETED (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'April_SEWING_COMPLETED_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_SEWING_COMPLETED_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_SEWING_COMPLETED_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_SEWING_COMPLETED_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_SEWING_COMPLETED_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_SEWING_COMPLETED_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_SEWING_COMPLETED_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_SEWING_COMPLETED_NOTE',
			'type'  					=>'text',
		]
	]
]);

// CUTTING BALANCE (PCS) END------------------------------------


// SEWING BALANCE (PCS) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'SEWING BALANCE (PCS)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'April_SEWING_BALANCE_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_SEWING_BALANCE_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_SEWING_BALANCE_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_SEWING_BALANCE_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_SEWING_BALANCE_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_SEWING_BALANCE_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_SEWING_BALANCE_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_SEWING_BALANCE_NOTE',
			'type'  					=>'text',
		]
	]
]);
// CUTTING BALANCE (PCS) END------------------------------------


// PO ALLOCATION		---------------------------------------

Redux::set_section($opt_name,[
	'title'							=>'PO ALLOCATION',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'PO NO',
			'id'						=>'April_PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'April_Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'April_Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'April_PO_ALLOCATION_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_PO_ALLOCATION_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_PO_ALLOCATION_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_PO_ALLOCATION_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_PO_ALLOCATION_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_PO_ALLOCATION_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_PO_ALLOCATION_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_PO_ALLOCATION_NOTE',
			'type'  					=>'text',
		]

	]
]);
// END PO ALLOCATION -----------------------------------------------------
		


// Total Allocated To PO Qnty (Pcs) Start ---------------------------------
Redux::set_section($opt_name,[
	'title'							=>'Total Allocated To PO Qnty (Pcs)',
	'subsection'				=>true,
	'fields'						=>[
		[
			'title'						=>'S',
			'id'						=>'April_Total_Allocated_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Total_Allocated_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Total_Allocated_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Total_Allocated_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_Total_Allocated_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_Total_Allocated_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Total_Allocated_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Total_Allocated_NOTE',
			'type'  					=>'text',
		]
	]
]);
// Total Allocated To PO Qnty (Pcs) END------------------------------------



// PACKING PARTICULARS------------------------------------------------
Redux::set_section($opt_name,[
	'title'						=>"PACKING PARTICULARS",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'PO NO',
			'id'						=>'April_PACKING_PARTICULARS_PO_NO_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Style No',
			'id'						=>'April_PACKING_PARTICULARS_Style_No_id',
			'type'						=>'text',
		],
		[
			'title'						=>'Colour',
			'id'						=>'April_PACKING_PARTICULARS_Colour_id',
			'type'						=>'text',
		],
		[
			'title'						=>'S',
			'id'						=>'April_PACKING_PARTICULARS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_PACKING_PARTICULARS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_PACKING_PARTICULARS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_PACKING_PARTICULARS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_PACKING_PARTICULARS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_PACKING_PARTICULARS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_PACKING_PARTICULARS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_PACKING_PARTICULARS_NOTE',
			'type'  					=>'text',
		]
	]
]);
// PACKING PARTICULARS---------------------------------------------------------------


// Total Packed Quantity (Pcs)	------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"Total Packed Quantity (Pcs)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_Total_Packed_Quantity_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_Total_Packed_Quantity_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_Total_Packed_Quantity_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_Total_Packed_Quantity_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_Total_Packed_Quantity_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[	
			'title'						=>'XXXL',
			'id'						=>'April_Total_Packed_Quantity_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_Total_Packed_Quantity_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_Total_Packed_Quantity_NOTE',
			'type'  					=>'text',
		]
	]
]);
// End  Total Packed Quantity (Pcs)----------------------------------------------



// AVAILABLE GMTS TO ISSUE PO (PCS)	---------------------------------------------

Redux::set_section($opt_name,[
	'title'						=>"AVAILABLE GMTS TO ISSUE PO (PCS)",
	'subsection'				=>true,
	'fields'					=>[
		[
			'title'						=>'S',
			'id'						=>'April_AVAILABLE_GMTS_S',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'M',
			'id'						=>'April_AVAILABLE_GMTS_M',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'L',
			'id'						=>'April_AVAILABLE_GMTS_L',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XL',
			'id'						=>'April_AVAILABLE_GMTS_XL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXL',
			'id'						=>'April_AVAILABLE_GMTS_XXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'XXXL',
			'id'						=>'April_AVAILABLE_GMTS_XXXL',
			'type'  					=>'text',
			'validate' 					=>'numeric'
		],
		[
			'title'						=>'DATE',
			'id'						=>'April_AVAILABLE_GMTS_DATE',
			'type'  					=>'date',
 
		],
		[
			'title'						=>'NOTE',
			'id'						=>'April_AVAILABLE_GMTS_NOTE',
			'type'  					=>'text',
		],
		
	]
]);

// END APRIL .........................................


Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'your-textdomain-here' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'your-textdomain-here' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'your-textdomain-here' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'your-textdomain-here' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'your-textdomain-here' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'your-textdomain-here' ),
					'2' => esc_html__( 'Opt 2', 'your-textdomain-here' ),
					'3' => esc_html__( 'Opt 3', 'your-textdomain-here' ),
				),
				'default'         => '2',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'your-textdomain-here' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'your-textdomain-here' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'your-textdomain-here' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
