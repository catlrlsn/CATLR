<?php

// Register Custom Taxonomy
function audience_taxonomy()  {

	$labels = array(
		'name'                       => 'Audiences',
		'singular_name'              => 'Audience',
		'menu_name'                  => 'Audience',
		'all_items'                  => 'All Audiencea',
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

// Hook into the 'init' action
add_action( 'init', 'audience_taxonomy', 0 );