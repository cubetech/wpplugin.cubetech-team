<?php
/**
 * Plugin Name: cubetech Team
 * Plugin URI: http://www.cubetech.ch
 * Description: cubetech Team - create some team members, reusable within groups and shorttags
 * Version: 1.2.1
 * Author: cubetech GmbH
 * Author URI: http://www.cubetech.ch
 */

include_once('lib/cubetech-install.php');
include_once('lib/cubetech-post-type.php');
include_once('lib/cubetech-shortcode.php');
include_once('lib/cubetech-group.php');
include_once('lib/cubetech-metabox.php');
include_once('lib/cubetech-settings.php');

add_image_size( 'cubetech-team-thumb', 231, 124, true );

if(get_option('cubetech_team_layout') == '3coljquery') {
	wp_enqueue_script('cubetech-team-js-3coljquery', plugins_url('assets/js/cubetech-team-3coljquery.js', __FILE__) );
}

add_action('wp_enqueue_scripts', 'cubetech_team_add_styles');

function cubetech_team_add_styles() {
	wp_register_style('cubetech-team-css', plugins_url('assets/css/cubetech-team.css', __FILE__) );
	wp_enqueue_style('cubetech-team-css');
	wp_enqueue_script('cubetech_team_js', plugins_url('assets/js/cubetech-team.js', __FILE__), 'jquery');
	if(get_option('cubetech_team_layout') == '3coljquery') {
		wp_register_style('cubetech-team-css-3coljquery', plugins_url('assets/css/cubetech-team-3coljquery.css', __FILE__) );
		wp_enqueue_style('cubetech-team-css-3coljquery');
	}
}

?>
