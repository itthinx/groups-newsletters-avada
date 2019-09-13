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

function theme_enqueue_styles() {
	wp_enqueue_style( 'groups-newsletters-avada', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
