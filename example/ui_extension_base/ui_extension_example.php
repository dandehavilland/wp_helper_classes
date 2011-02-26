<?php

class MyUIExtension extends UIExtensionBase {
	
	// array of scripts to enqueue
	var $scripts = array(
		'my_script'=> array(
			'src' => 'path/in/theme/directory.js',
			'deps' => array('array', 'of', 'dependencies'),
			'ver' => 'optional script version number',
			'in_footer' => true
		),
		// more scripts ...
	);
	
	// array of stylesheets to enqueue
	var $styles = array(
		'my_style' => array(
			'src' => 'path/in/theme/directory.css',
			'deps' => array('array', 'of', 'dependencies'),
			'ver' => 'optional stylesheet version number',
			'media' => 'screen'
		),
		// more styles ...
	);
	
	public function __construct() {
		parent::__construct();
		
		// do your stuff ...
	}
}