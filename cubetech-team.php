<?php
/**
 * Plugin Name: cubetech Team
 * Plugin URI: http://www.cubetech.ch
 * Description: cubetech Team - create some team members, reusable within groups and shorttags
 * Version: 1.2.1
 * Author: cubetech GmbH
 * Author URI: http://www.cubetech.ch
 */

include_once('lib/cubetech-init.php');
include_once('lib/cubetech-install.php');
include_once('lib/cubetech-post-type.php');
include_once('lib/cubetech-shortcode.php');
include_once('lib/cubetech-group.php');
include_once('lib/cubetech-metabox.php');
include_once('lib/cubetech-settings.php');

add_image_size( 'cubetech-team-thumb', 231, 124, true );

add_action('init', 'cubetech_team_addbuttons');
add_action('wp_enqueue_scripts', 'cubetech_team_enqueue', 1);
add_action('admin_enqueue_scripts', 'cubetech_team_admin_enqueue');

?>
