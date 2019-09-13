<?php

// Scripts
function jdot_enqueue_scripts() {
	if (!is_admin()) {
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
	  wp_enqueue_script('jquery');
	  wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js');
	  wp_enqueue_script('modernizr');
	  wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', '', '', true);
	  wp_enqueue_script('custom');
	}       
}
add_action('init', 'jdot_enqueue_scripts');

// Other
add_editor_style();
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 80, 80, true ); // Default size
if ( ! isset( $content_width ) ) $content_width = 624;


// Replaces "[...]".
function isabelblog_auto_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'isabelblog_auto_excerpt_more' );

//Add Image Size
add_image_size( 'projectsmall', 200, 100, true);
add_image_size('projectimage', 600, 300, true);

//Add custom image sizes to meida window
function jdot_insert_custom_image_sizes( $sizes ) {
  global $_wp_additional_image_sizes;
  if ( empty($_wp_additional_image_sizes) )
    return $sizes;

  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    if ( !isset($sizes[$id]) )
      $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
  }

  return $sizes;
}
add_filter( 'image_size_names_choose', 'jdot_insert_custom_image_sizes' );

//Register Projects Post Type

add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

    $comlabels = array( 
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x( 'Project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New Project', 'project' ),
        'edit_item' => _x( 'Edit Project', 'project' ),
        'new_item' => _x( 'New Project', 'project' ),
        'view_item' => _x( 'View Project', 'project' ),
        'search_items' => _x( 'Search Projects', 'project' ),
        'not_found' => _x( 'No Projects found', 'project' ),
        'not_found_in_trash' => _x( 'No Projects found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
        'menu_name' => _x( 'Projects', 'project' ),
    );

    $args = array( 
        'labels' => $comlabels,
        'hierarchical' => false,
        
        'supports' => array( 'title' ),
        
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}

//Include Custom MetaBox File
include 'demo.php';

?>