<?php
/**
 * Plugin Name:     Vacationvillas
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     vacationvillas
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Vacationvillas
 */

// Your code starts here.
require_once plugin_dir_path(__FILE__) . 'post-types/villa.php';

add_action( 'init', 'vacationvillas_register_meta' );
function vacationvillas_register_meta() {
	register_meta(
		'post',
		'vacationvillas_rated',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_reviews',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_location',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_guests',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_bedrooms',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_beds',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
	register_meta(
		'post',
		'vacationvillas_bathrooms',
		array(
            'object_subtype'    => 'villa',
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string',
			'sanitize_callback' => 'wp_strip_all_tags'
		)
	);
}