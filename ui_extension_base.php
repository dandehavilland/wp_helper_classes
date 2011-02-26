<?php


if (!class_exists('UIExtensionBase')):
/**
* Base object for enqueueing scripts and styles
* @author Dan de Havilland
*/
class UIExtensionBase  {
	
	var $scripts = array();
	var $styles = array();
	
	function __construct() {
		add_action('init', array(&$this, 'enqueue_scripts'));
		add_action('init', array(&$this, 'enqueue_styles'));
	}
	
	function enqueue_scripts() {
		foreach ($this->scripts as $handle => $params) {
			wp_enqueue_script($handle,
				get_bloginfo('stylesheet_directory')."/".$params["src"],
				isset($params['deps']) ? $params['deps'] : array(),
				isset($params['ver']) ? $params['ver'] : false,
				isset($params['in_footer']) ? $params['in_footer'] : false);
		}
	}
	
	function enqueue_styles() {
		foreach ($this->styles as $handle => $params) {
			wp_enqueue_style($handle,
				!empty($params["src"]) ? get_bloginfo('stylesheet_directory').$params["src"] : false,
				isset($params['deps']) ? $params['deps'] : array(),
				isset($params['ver']) ? $params['ver'] : false,
				isset($params['media']) ? $params['media'] : false);
		}
	}
}
endif;