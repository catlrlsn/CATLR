<?php

/*
| -------------------------------------------------------------------
|  SETUP
| -------------------------------------------------------------------
| theme setup
*/

add_action( 'after_setup_theme', 'setup' );
if ( ! function_exists( 'setup' ) ) {

    function setup() {
        // Enable editor styles:
        // * editor-style.css
        add_editor_style();

    }

} 


/*
| -------------------------------------------------------------------
|  Advanced Custom Fields
| -------------------------------------------------------------------
| Functions related to ACF
*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global',
		'menu_slug' 	=> 'acf-options-global',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Homepage Settings',
		'menu_title'	=> 'Homepage',
		'menu_slug' 	=> 'acf-options-homepage',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


// Hide ACF menu item from the admin menu
function hide_admin_menu()
{
    global $current_user;
    get_currentuserinfo();
 
    if($current_user->user_login != 'admin')
    {
        echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
    }
}
add_action('admin_head', 'hide_admin_menu');


/*
| -------------------------------------------------------------------
|  Shortcodes
| -------------------------------------------------------------------
| 
*/

// Callout Boxes
function callout_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'background' => 'color',
            'position' => 'right',
            'byline' => '',
        ), $atts )
    );

    $background = ($background == 'color' ? 'quote-color' : '');
    $position   = ($position !== '' ? 'pull-'.$position : '');
    $class      = $background .' '. $position;
    $content    = '<p>'. $content .'</p>';
    $byline     = '<small>'. $byline .'</small>';

    // Code
    return '<blockquote class="'. $class .'">
                '. $content .'
                '. $byline .'
            </blockquote>
    ';
}
add_shortcode( 'callout', 'callout_shortcode' );


// Video Embed
function video_shortcode( $atts ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'src' => '',
            'type' => 'vimeo',
        ), $atts )
    );

    // Code
    return '<iframe class="embed-video" src="'. $src .'?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" allowfullscreen></iframe>';
}
add_shortcode( 'video', 'video_shortcode' );



function get_taxonomy_list( $taxonomy, $link = true )
{
    global $post;

    $term_links = array();
    $terms = get_the_terms( $post->ID, $taxonomy );

    if ( is_array($terms) ) { 
        foreach ( $terms as $term ) {
            //$term_links[] = '<a href="' . get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
            $term_links[] = $term->name;
        }
        return join( ", ", $term_links );
    } else  {
        return $terms;
    }
}


/*
| -------------------------------------------------------------------
|  Captions
| -------------------------------------------------------------------
| Function to fix the width applied to captions
*/

class fixImageMargins{
    public $xs = 0; //change this to change the amount of extra spacing
 
    public function __construct(){
        add_filter('img_caption_shortcode', array(&$this, 'fixme'), 10, 3);
    }
    public function fixme($x=null, $attr, $content){
 
        extract(shortcode_atts(array(
                'id'    => '',
                'align'    => 'alignnone',
                'width'    => '',
                'caption' => ''
            ), $attr));
 
        if ( 1 > (int) $width || empty($caption) ) {
            return $content;
        }
 
        if ( $id ) $id = 'id="' . $id . '" ';
 
    return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . ((int) $width + $this->xs) . 'px">'
    . $content . '<p class="wp-caption-text">' . $caption . '</p></div>';
    }
}
$fixImageMargins = new fixImageMargins();


/*
| -------------------------------------------------------------------
|  WYSIWYG buttons
| -------------------------------------------------------------------
| adding some buttons to tinyMCE
*/

function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'styleselect';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");


/*
| -------------------------------------------------------------------
|  PHP include
| -------------------------------------------------------------------
| shortcode for a php include
*/
function PHP_Include($params = array()) {

    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));

    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('phpinclude', 'PHP_Include');


/*
| -------------------------------------------------------------------
|  Optimize Database
| -------------------------------------------------------------------
| functions to optimise wp database
*/

function optimize_database(){
    global $wpdb; // get access to $wpdb object
    $all_tables = $wpdb->get_results('SHOW TABLES',ARRAY_A); // get all table names
    foreach ($all_tables as $tables){ // loop through every table name
        $table = array_values($tables); // get table name out of array
        $wpdb->query("OPTIMIZE TABLE ".$table[0]); // run the optimize SQL command on the table
    }
}
function simple_optimization_cron_on(){
    wp_schedule_event(time(), 'daily', 'optimize_database'); // rdd optimize_database to wp cron events
}
function simple_optimization_cron_off(){
    wp_clear_scheduled_hook('optimize_database'); // remove optimize_database from wp cron events
}
register_activation_hook(__FILE__,'simple_optimization_cron_on'); // run simple_optimization_cron_on at plugin activation
register_deactivation_hook(__FILE__,'simple_optimization_cron_off'); // run simple_optimization_cron_off at plugin deactivation


/*
| -------------------------------------------------------------------
|  Duplicate Posts
| -------------------------------------------------------------------
| function creates post duplicate as a draft and redirects then to the edit post screen
*/

function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }
 
    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );
 
    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
 
    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {
 
        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
 
        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post( $args );
 
        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy);
            for ($i=0; $i<count($post_terms); $i++) {
                wp_set_object_terms($new_post_id, $post_terms[$i]->slug, $taxonomy, true);
            }
        }
 
        /*
         * duplicate all post meta
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
 
 
        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter('events_cpt_row_actions', 'rd_duplicate_post_link', 10, 2);


/**
 * Walker class for subnavigation
 */
class My_Walker extends Walker_Page {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "\n$indent<div class='container'><div class='container2'><ul>\n";
        } else {
            $output .= "\n$indent<ul class='children'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul></div></div>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }
}

/**
 * Get Subnavigation
 */
function get_subnavigation( $display = 'subnavigation', $post_type = 'page' )
{
    global $post;
    $title = '';

    if ( !$post->post_parent ) 
    {
        $title = get_the_title();
        $children = wp_list_pages(array(
        'title_li'   => null,
        'child_of'   => $post->ID,
        'depth'      => 3,
        'post_type'  => $post_type,
        'echo'       => 0,
        'walker'     => new My_Walker()
        ));
    } 
    else 
    {
        if ( $post->ancestors ) {
            // var_dump($post->ancestors);
            $ancestors = end($post->ancestors);
            $title = '<a href="'. get_permalink($ancestors) .'">'. get_the_title($ancestors) .'</a>';
            $children = wp_list_pages("title_li=&child_of=".$ancestors."&depth=3&post_type=".$post_type."&echo=0");
         
        }
    }

    if ( $display == 'subnavigation' ) {
        return $children;
    } else {
        return $title;
    }
}


/**
 * Get Root Parent
 */

function get_top_parent_id($post){
  if ($post->post_parent)   {
    $ancestors=get_post_ancestors($post->ID);
    $root=count($ancestors)-1;
    $parent = $ancestors[$root];
  } else {
    $parent = $post->ID;
  }
  return $parent;
}
