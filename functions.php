<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}

add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {
	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles',
		get_stylesheet_directory_uri() . $theme_styles,
		[],
		$the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts',
		get_stylesheet_directory_uri() . $theme_scripts,
		[],
		$the_theme->get( 'Version' ),
		true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child',
		get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 *
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}

add_filter( 'theme_mod_understrap_bootstrap_version',
	'understrap_default_bootstrap_version',
	20 );


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		[ 'customize-preview' ],
		'20130508',
		true
	);
}

add_action( 'customize_controls_enqueue_scripts',
	'understrap_child_customize_controls_js' );

add_filter( 'portfolioposttype_args', 'prefix_change_portfolio_labels' );
/**
 * Change post type labels and arguments for Portfolio Post Type plugin.
 *
 * @param array $args Existing arguments.
 *
 * @return array Amended arguments.
 */
function prefix_change_portfolio_labels( array $args ) {
	$labels         = [
		'name'               => __( 'Doctors', 'portfolioposttype' ),
		'singular_name'      => __( 'Doctor', 'portfolioposttype' ),
		'add_new'            => __( 'Add New Item', 'portfolioposttype' ),
		'add_new_item'       => __( 'Add New Doctor', 'portfolioposttype' ),
		'edit_item'          => __( 'Edit Doctor', 'portfolioposttype' ),
		'new_item'           => __( 'Add New Doctor', 'portfolioposttype' ),
		'view_item'          => __( 'View Item', 'portfolioposttype' ),
		'search_items'       => __( 'Search Doctors', 'portfolioposttype' ),
		'not_found'          => __( 'No doctors found', 'portfolioposttype' ),
		'not_found_in_trash' => __( 'No doctors found in trash',
			'portfolioposttype' ),
	];
	$args['labels'] = $labels;

	// Update Doctor single permalink format, and archive slug as well.
	$args['rewrite']     = [ 'slug' => 'doctor' ];
	$args['has_archive'] = true;

	// Don't forget to visit Settings->Permalinks after changing these to flush the rewrite rules.

	return $args;
}

function ww_load_dashicons() {
	wp_enqueue_style( 'dashicons' );
}

add_action( 'wp_enqueue_scripts', 'ww_load_dashicons', 999 );