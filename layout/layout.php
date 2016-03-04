<?php
/**
 * @package Layout
 * @version 1.6
 */
/*
Plugin Name: Layout
Plugin URI: http://shimion.com/
Description: Pagebuilder
Author: Shimion
Version: 1.1
Author URI: http://shimion.com/
*/

add_action( 'wp_ajax_save_content', 'save_content' ); 		// Do after final confirmation
add_action( 'wp_ajax_nopriv_save_content', 'save_content'  ); // Do after final confirmation

function save_content(){
	$id = $_POST['id'];
	$content = $_POST['content'];
	
	$my_post = array(
		  'ID'           => $id,
		  'post_content' => $content,
	  );

$post_id = wp_update_post( $my_post, true );						  
if (is_wp_error($post_id)) {
	$errors = $post_id->get_error_messages();
	foreach ($errors as $error) {
				wp_send_json(array('result'=>$error), true);	

	}
}else{
				wp_send_json(array('result'=>'SUCCESS'), true);	
	}
	
	
	}