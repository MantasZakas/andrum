<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [ 
		'lib/assets.php', // Scripts and stylesheets
		'lib/extras.php', // Custom functions
		'lib/setup.php', // Theme setup
		'lib/titles.php', // Page titles
		'lib/wrapper.php', // Theme wrapper class
		'lib/customizer.php' // Theme customizer
];

foreach ( $sage_includes as $file ) {
	if (! $filepath = locate_template ( $file )) {
		trigger_error ( sprintf ( __ ( 'Error locating %s for inclusion', 'sage' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset ( $file, $filepath );

//Register the main nav menu
add_action ( 'init', function () {
	register_nav_menus ( [ 
			'top_menu' => 'Top menu'
	] );
} );

//add custom classes to menu <li> and <a> tags
add_filter ( 'nav_menu_css_class', function ($classes, $item) {
	$classes [] = 'nav-item d-flex';
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'header__link--active';
	}
	return $classes;
}, 10, 2 );

add_filter ( 'nav_menu_link_attributes', function ($atts) {
	$atts ['class'] = "nav-link align-self-stretch py-0 header__link";
	return $atts;
}, 100, 1 );
