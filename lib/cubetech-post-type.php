<?php
function cubetech_team_create_post_type() {

	$supports = array('title', 'thumbnail');
	if(get_option('cubetech_team_use_editor') == 'checked') {
		$supports = array('title', 'editor', 'thumbnail');
	}

	register_post_type('cubetech_team',
		array(
			'labels' => array(
				'name' => __('Team'),
				'singular_name' => __('Mitglied'),
				'add_new' => __('Mitglied hinzufügen'),
				'add_new_item' => __('Neues Mitglied hinzufügen'),
				'edit_item' => __('Mitglied bearbeiten'),
				'new_item' => __('Neues Mitglied'),
				'view_item' => __('Mitglied betrachten'),
				'search_items' => __('Mitglieder durchsuchen'),
				'not_found' => __('Keine Mitglieder gefunden.'),
				'not_found_in_trash' => __('Keine Mitglieder gefunden.')
			),
			'capability_type' => 'post',
			'taxonomies' => array('cubetech_team_group'),
			'public' => false,
			'has_archive' => false,
			'rewrite' => array('slug' => 'team', 'with_front' => false),
			'show_ui' => true,
			'menu_position' => '20',
			'menu_icon' => null,
			'hierarchical' => true,
			'supports' => $supports,
		)
	);
	flush_rewrite_rules();
}
add_action('init', 'cubetech_team_create_post_type');
?>
