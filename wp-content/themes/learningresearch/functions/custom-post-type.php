<?php

// Custom Post Types
// --------------------------------------------------

// Conference Post Type
// -------------------------

function conference_post_type() {

	$labels = array(
		'name'                => 'Conferences',
		'singular_name'       => 'Conference',
		'menu_name'           => 'Conferences',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Items',
		'view_item'           => 'View Item',
		'add_new_item'        => 'Add New Item',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Item',
		'update_item'         => 'Update Item',
		'search_items'        => 'Search Item',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'conferences', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conference_post_type', 0 );



// Events Post Type
// -------------------------

function events_cpt() {

	$labels = array(
		'name'                => 'Events',
		'singular_name'       => 'Event',
		'menu_name'           => 'Events',
		'parent_item_colon'   => 'Parent Event:',
		'all_items'           => 'All Event',
		'view_item'           => 'View Event',
		'add_new_item'        => 'Add New Event',
		'add_new'             => 'New Event',
		'edit_item'           => 'Edit Event',
		'update_item'         => 'Update Event',
		'search_items'        => 'Search Events',
		'not_found'           => 'No Events found',
		'not_found_in_trash'  => 'No Events found in Trash',
	);
	$rewrite = array(
		'slug'                => 'event',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Event',
		'description'         => 'Event information pages',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','excerpt', 'revisions', 'thumbnail' ),
		'taxonomies'          => array( 'category', 'audience' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'events_cpt', 0 );