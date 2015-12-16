<?php

// Register Custom Taxonomy
function audience_taxonomy()  {

	$labels = array(
		'name'                       => 'Audiences',
		'singular_name'              => 'Audience',
		'menu_name'                  => 'Audience',
		'all_items'                  => 'All Audiences',
		'parent_item'                => 'Parent Audience',
		'parent_item_colon'          => 'Parent Audience:',
		'new_item_name'              => 'New Audience Name',
		'add_new_item'               => 'Add New Audience',
		'edit_item'                  => 'Edit Audience',
		'update_item'                => 'Update Audience',
		'separate_items_with_commas' => 'Separate Audiences with commas',
		'search_items'               => 'Search Audience',
		'add_or_remove_items'        => 'Add or remove Audiences',
		'choose_from_most_used'      => 'Choose from the most used genres',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'audience', 'event', $args );

}

function theme_taxonomy()  {

	$labels = array(
		'name'                       => 'Themes',
		'singular_name'              => 'Theme',
		'menu_name'                  => 'Theme',
		'all_items'                  => 'All Themes',
		'parent_item'                => 'Parent Theme',
		'parent_item_colon'          => 'Parent Theme:',
		'new_item_name'              => 'New Theme Name',
		'add_new_item'               => 'Add New Theme',
		'edit_item'                  => 'Edit Theme',
		'update_item'                => 'Update Theme',
		'separate_items_with_commas' => 'Separate Themes with commas',
		'search_items'               => 'Search Themes',
		'add_or_remove_items'        => 'Add or remove Themes',
		'choose_from_most_used'      => 'Choose from the most used genres',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'theme', 'event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'audience_taxonomy', 0 );
add_action( 'init', 'theme_taxonomy', 0 );