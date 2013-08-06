<?php
function cubetech_team_shortcode($atts)
{
	extract(shortcode_atts(array(
		'group'			=> false,
		'orderby' 		=> 'menu_order',
		'order'			=> 'asc',
		'numberposts'	=> 999,
		'offset'		=> 0,
		'poststatus'	=> 'publish',
	), $atts));
	
	if ( $group == false )
		return "Keine Gruppe angegeben";
		
	if ( $group == 'all' )
		$tax_query = false;
	else {
		$tax_query = array(
		    array(
		        'taxonomy' => 'cubetech_team_group',
		        'terms' => $group,
		        'field' => 'id',
		    )
		);
	}
	
	$args = array(
		'posts_per_page'  	=> 999,
		'numberposts'     	=> $numberposts,
		'offset'          	=> $offset,
		'orderby'         	=> $orderby,
		'order'           	=> $order,
		'post_type'       	=> 'cubetech_team',
		'post_status'     	=> $poststatus,
		'suppress_filters' 	=> true,
		'tax_query'			=> $tax_query,
	);
		
	$posts = get_posts($args);
	$class = '';
	$return = '';
	
	$return .= '<div class="cubetech-team-container">';
	
	foreach ($posts as $post) {
	
		$post_meta_data = get_post_custom($post->ID);
		$terms = wp_get_post_terms($post->ID, 'cubetech_team_group');
		$link = '';
		
		if(isset($post_meta_data['cubetech_team_externallink'][0]) && $post_meta_data['cubetech_team_externallink'][0] != '')
			$link = '<span class="cubetech-team-link"><a href="' . $post_meta_data['cubetech_team_externallink'][0] . '" target="_blank">&raquo; MEHR</a></span>';
		elseif ( $post_meta_data['cubetech_team_links'][0] != '' && $post_meta_data['cubetech_team_links'][0] != 'nope' && $post_meta_data['cubetech_team_links'][0] > 0 )
			$link = '<span class="cubetech-team-link"><a href="' . get_permalink( $post_meta_data['cubetech_team_links'][0] ) . '">&raquo; MEHR</a></span>';
		
		$return .= '
		<div class="cubetech-team">
			<div class="cubetech-team-image">
				' . get_the_post_thumbnail( $post->ID, 'cubetech-team-thumb', array('class' => 'cubetech-team-thumb') ) . '
				' . $link . '
			</div>
			<div class="cubetech-team-content">
				<h2 class="cubetech-team-title">' . $post->post_title . '</h2>
				<h3 class="cubetech-team-subtitle">' . $post_meta_data['cubetech_team_subtitle'][0] . '</h3>
				<div class="cubetech-team-content-container">' . $post->post_content . '</div>
			</div>
		</div>';

	}

	return $return . '</div>';

}
add_shortcode('cubetech-team', 'cubetech_team_shortcode');
?>
