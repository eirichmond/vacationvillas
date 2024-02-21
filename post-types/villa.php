<?php

/**
 * Registers the `villa` post type.
 */
function villa_init() {
	register_post_type(
		'villa',
		[
			'labels'                => [
				'name'                  => __( 'Villas', 'vacationvillas' ),
				'singular_name'         => __( 'Villas', 'vacationvillas' ),
				'all_items'             => __( 'All Villas', 'vacationvillas' ),
				'archives'              => __( 'Villas Archives', 'vacationvillas' ),
				'attributes'            => __( 'Villas Attributes', 'vacationvillas' ),
				'insert_into_item'      => __( 'Insert into Villas', 'vacationvillas' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Villas', 'vacationvillas' ),
				'featured_image'        => _x( 'Featured Image', 'villa', 'vacationvillas' ),
				'set_featured_image'    => _x( 'Set featured image', 'villa', 'vacationvillas' ),
				'remove_featured_image' => _x( 'Remove featured image', 'villa', 'vacationvillas' ),
				'use_featured_image'    => _x( 'Use as featured image', 'villa', 'vacationvillas' ),
				'filter_items_list'     => __( 'Filter Villas list', 'vacationvillas' ),
				'items_list_navigation' => __( 'Villas list navigation', 'vacationvillas' ),
				'items_list'            => __( 'Villas list', 'vacationvillas' ),
				'new_item'              => __( 'New Villas', 'vacationvillas' ),
				'add_new'               => __( 'Add New', 'vacationvillas' ),
				'add_new_item'          => __( 'Add New Villas', 'vacationvillas' ),
				'edit_item'             => __( 'Edit Villas', 'vacationvillas' ),
				'view_item'             => __( 'View Villas', 'vacationvillas' ),
				'view_items'            => __( 'View Villas', 'vacationvillas' ),
				'search_items'          => __( 'Search Villas', 'vacationvillas' ),
				'not_found'             => __( 'No Villas found', 'vacationvillas' ),
				'not_found_in_trash'    => __( 'No Villas found in trash', 'vacationvillas' ),
				'parent_item_colon'     => __( 'Parent Villas:', 'vacationvillas' ),
				'menu_name'             => __( 'Villas', 'vacationvillas' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor', 'custom-fields' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-building',
			'show_in_rest'          => true,
			'capability_type'		=> 'post',
			'rest_base'             => 'villa',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'villa_init' );

/**
 * Sets the post updated messages for the `villa` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `villa` post type.
 */
function villa_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['villa'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Villas updated. <a target="_blank" href="%s">View Villas</a>', 'vacationvillas' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'vacationvillas' ),
		3  => __( 'Custom field deleted.', 'vacationvillas' ),
		4  => __( 'Villas updated.', 'vacationvillas' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Villas restored to revision from %s', 'vacationvillas' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Villas published. <a href="%s">View Villas</a>', 'vacationvillas' ), esc_url( $permalink ) ),
		7  => __( 'Villas saved.', 'vacationvillas' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Villas submitted. <a target="_blank" href="%s">Preview Villas</a>', 'vacationvillas' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Villas scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Villas</a>', 'vacationvillas' ), date_i18n( __( 'M j, Y @ G:i', 'vacationvillas' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Villas draft updated. <a target="_blank" href="%s">Preview Villas</a>', 'vacationvillas' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'villa_updated_messages' );

/**
 * Sets the bulk post updated messages for the `villa` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `villa` post type.
 */
function villa_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['villa'] = [
		/* translators: %s: Number of Villas. */
		'updated'   => _n( '%s Villas updated.', '%s Villas updated.', $bulk_counts['updated'], 'vacationvillas' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Villas not updated, somebody is editing it.', 'vacationvillas' ) :
						/* translators: %s: Number of Villas. */
						_n( '%s Villas not updated, somebody is editing it.', '%s Villas not updated, somebody is editing them.', $bulk_counts['locked'], 'vacationvillas' ),
		/* translators: %s: Number of Villas. */
		'deleted'   => _n( '%s Villas permanently deleted.', '%s Villas permanently deleted.', $bulk_counts['deleted'], 'vacationvillas' ),
		/* translators: %s: Number of Villas. */
		'trashed'   => _n( '%s Villas moved to the Trash.', '%s Villas moved to the Trash.', $bulk_counts['trashed'], 'vacationvillas' ),
		/* translators: %s: Number of Villas. */
		'untrashed' => _n( '%s Villas restored from the Trash.', '%s Villas restored from the Trash.', $bulk_counts['untrashed'], 'vacationvillas' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'villa_bulk_updated_messages', 10, 2 );
