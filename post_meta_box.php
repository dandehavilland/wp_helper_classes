<?php

if (!class_exists('PostMetaBox')):
/**
 * PostMetaBox Template
 *
 * @author Dan de Havilland
 */
class PostMetaBox {
	
	var $meta_key, $box_title;
	var $post_type = 'post';
	var $position = 'side';
	var $context, $sub_context;
	var $views_root;
	var $nonce_name;
	var $priority = 'high';
	var $edit_include = 'edit.php';
	
	function __construct($params=array()) {
		foreach ($params as $key => $value)
			$this->{$key} = $value;
		
		$this->nonce_name = "{$this->meta_key}_nonce";
		
		add_action('admin_menu', array(&$this, 'register_meta_box'));
		add_action('save_post', array(&$this, 'update_post_meta'));
	}
	
	function register_meta_box() {
		add_meta_box(
			"{$this->meta_key}div", 
			$this->box_title, 
			array(&$this, 'edit_post_meta'), 
			$this->post_type,
			$this->position,
			$this->priority);
	}
	
	function edit_post_meta() {
		global $post;
		$data = get_post_meta($post->ID, $this->meta_key, true);
		include("{$this->views_root}/{$this->context}/{$this->sub_context}/{$this->edit_include}");
	}
	
	function update_post_meta($post_id) {
		if ( !wp_verify_nonce( $_POST[$this->nonce_name], $this->nonce_name)){
			return $post_id;
		}
			
		
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;
		
		update_post_meta($post_id, $this->meta_key, $_POST[$this->meta_key]);
				
		return $_POST[$this->meta_key];
	}
	
	function get_data($post_id=null) {
		global $post;
		if ($post_id == null) $post_id = $post->ID;
		return get_post_meta($post_id,$this->meta_key,true);
	}
}
endif;