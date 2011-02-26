<?php

/**
 * Create a meta box using the PostMetaBox helper class
 * See the views directory for an example of the form
 *
 * @author Dan de Havilland
 */

new PostMetaBox(
	array(
		'views_root' => dirname(__FILE__)."/views", // views basepath
		'context' => 'page', // 1st level directory in views
		'sub_context' => 'some_meta_information', // 2nd level directory in views
		'meta_key' => 'some_meta_information', // becomes the wp_postmeta.meta_key
		'post_type' => 'page', // which post_type to add the meta box to
		'box_title' => "Some Meta Information",
		'position' => 'advanced' // where should the box appear? (side, advanced etc.)
	)
);
?>