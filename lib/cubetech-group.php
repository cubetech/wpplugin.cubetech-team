<?php
function cubetech_team_create_taxonomy() {
	
	$labels = array(
		'name'                => __( 'Teamgruppen'),
		'singular_name'       => __( 'Teamgruppe' ),
		'search_items'        => __( 'Gruppen durchsuchen' ),
		'all_items'           => __( 'Alle Teamgruppen' ),
		'edit_item'           => __( 'Teamgruppe bearbeiten' ), 
		'update_item'         => __( 'Teamgruppe aktualisiseren' ),
		'add_new_item'        => __( 'Neue Teamgruppe hinzufügen' ),
		'new_item_name'       => __( 'Gruppenname' ),
		'menu_name'           => __( 'Teamgruppe' )
	);

	$args = array(
		'hierarchical'        => true,
		'labels'              => $labels,
		'show_ui'             => true,
		'show_admin_column'   => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'cubetech_team' ),
		'sortable'			  => true,
		'sort'				  => true,
	);

	register_taxonomy( 'cubetech_team_group', array( 'cubetech_team' ), $args );
	flush_rewrite_rules();
}

add_action('init', 'cubetech_team_create_taxonomy');

?>
