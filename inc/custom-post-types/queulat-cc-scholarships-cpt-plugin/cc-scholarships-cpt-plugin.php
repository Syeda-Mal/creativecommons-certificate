<?php
/**
 * Plugin Name: Scholarships Custom Post Type Plugin
 * Plugin URI:
 * Description:
 * Version: 0.1.0
 * Author:
 * Author URI:
 * License: GPL-3.0-or-later
 */
function Cc_Scholarships_Post_Type_register_post_type() {
	include_once __DIR__ . '/class-cc-scholarships-post-type.php';
	Cc_Scholarships_Post_Type::activate_plugin();
	include_once __DIR__ . '/class-cc-scholarships-post-type.php';
	include_once __DIR__ . '/class-cc-scholarships-post-query.php';
	include_once __DIR__ . '/class-cc-scholarships-post-object.php';
}

add_action( 'init', 'Cc_Scholarships_Post_Type_register_post_type' );
