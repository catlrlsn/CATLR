<?php
/*
Author: Eddie Machado
URL: htp://themble.com/functions/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. functions/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('functions/bones.php'); // if you remove this, bones will break
/*
2. functions/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('functions/custom-post-type.php'); // you can disable this if you like
require_once('functions/custom-taxonomy.php'); // you can disable this if you like
/*
3. functions/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('functions/admin.php'); // this comes turned off by default
/*
4. functions/utility.php
	- adding custom utility functions
*/
require_once('functions/utility.php');
/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
