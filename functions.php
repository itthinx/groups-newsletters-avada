<?php
/**
 * functions.php
 *
 * Part of the Avada child theme that integrates with Groups Newsletters https://www.itthinx.com/shop/groups-newsletters/
 *
 * Loads the stylesheet with necessary overrides.
 *
 * @author     itthinx
 * @link       https://www.itthinx.com
 * @package    groups-newsletters-avada
 * @since      1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue styles for the theme.
 */
function groups_newsletters_avada_wp_enqueue_scripts() {
	wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'groups-newsletters-avada', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'groups_newsletters_avada_wp_enqueue_scripts' );

/**
 * Loads the child theme's translations.
 */
function groups_newsletters_avada_after_setup_theme() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'groups-newsletters-avada', $lang );
}
add_action( 'after_setup_theme', 'groups_newsletters_avada_after_setup_theme' );
