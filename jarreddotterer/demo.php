<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'jdot_';

global $meta_boxes;

$meta_boxes = array();

//Community Purpose Meta Box
$meta_boxes[] = array(
	//// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'projectdetails',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Project Details', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'project' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXTAREA
		array(
			'name' => __( 'Short Description', 'rwmb' ),
			'desc' => __( 'Short description of the project and your role', 'rwmb' ),
			'id'   => "{$prefix}project_short_desc",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'Project Image', 'rwmb' ),
			'desc' => __( 'Choose an image for this project', 'rwmb' ),
			'id' => "{$prefix}project_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),
		// TEXT
		array(
			'name'  => __( 'Project URL', 'rwmb' ),
			'id'    => "{$prefix}project_url",
			'desc'  => __( 'Enter the URL of the project (optional)', 'rwmb' ),
			'type'  => 'text',
		),
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}project_short_desc" => array(
				'required'  => true,
			),
			"{$prefix}project_image" => array(
				'required'  => true,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}project_short_desc" => array(
				'required'  => __( 'Short Description is needed to publish', 'rwmb' ),
			),
			"{$prefix}project_image" => array(
				'required' => __( 'Image is needed to publish', 'rwmb' ),
			),
		)
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function jdot_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'jdot_register_meta_boxes' );
