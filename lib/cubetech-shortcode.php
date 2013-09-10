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
		
	$return = '';	

	if ( $group == 'all' ) {
		
		$args=array(
			'hide_empty' => false,
			'orderby' => 'id',
			'order' => 'ASC',
		);
		$taxonomies = get_terms('cubetech_team_group', $args);

		
	} else {
	
		$taxonomies[] = get_term($group, 'cubetech_team_group', $args);
		
	}
	
	$tax_query = false;
	
	
	foreach ( $taxonomies as $tax ) {
		
		$return .= '<div class="cubetech-team-container">';

		$tax_query = array(
		    array(
		        'taxonomy' => 'cubetech_team_group',
		        'terms' => $tax->term_id,
		        'field' => 'id',
		    )
		);
		
		if ( get_option('cubetech_team_show_groups') != false )
			$return .= '<h2>' . $tax->name . '</h2>';
		
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
		
		$return .= cubetech_team_content($posts);
		
		$return .= '<div class="cubetech-team-clear">';
		
		if ( get_option('cubetech_team_show_hr') != false )
			$return .= '<hr />';
		
		$return .= '</div></div>';
		
	}
		
	return $return;

}

add_shortcode('cubetech-team', 'cubetech_team_shortcode');

function cubetech_team_content($posts) {

	$contentreturn = '';
	
	$i = 0;
	
	foreach ($posts as $post) {
	
		$post_meta_data = get_post_custom($post->ID);
		$terms = wp_get_post_terms($post->ID, 'cubetech_team_group');
		$function = $post_meta_data['cubetech_team_function'][0];
		$edu = $post_meta_data['cubetech_team_edu'][0];
		$mail = $post_meta_data['cubetech_team_mail'][0];
		$phone = $post_meta_data['cubetech_team_phone'][0];
		
		$titlelink = array('', '');
		
		if ( get_option('cubetech_team_link_title') != false )
			$titlelink = array('<a href="' . get_permalink( $post->ID ) . '">', '</a>');
		
		$teamtitle = '';
		if ( get_option('cubetech_team_show_title') != false )
			$teamtitle = '<h3 class="cubetech-team-title">' . $titlelink[0] . $post->post_title . $titlelink[1] . '</h3>';
		
		$functionline = '';

		if ( get_option('cubetech_team_show_function') != false )
			$functionline .= '<p class="cubetech-team-function">' . $function . '</p>';

		if ( get_option('cubetech_team_show_edu') != false )
			$functionline .= '<p class="cubetech-team-edu">' . $edu . '</p>';
		
		
		$image = '';
		if ( get_option('cubetech_team_show_image') != false ) {
			$image .= '<div class="cubetech-team-thumb-container">';
			$image .= get_the_post_thumbnail( $post->ID, 'cubetech-team-thumb', array('class' => 'cubetech-team-thumb cubetech-team-thumb-' . $post->ID ) );
			
			$args = array(
			    'post_type' => 'attachment',
			    'numberposts' => null,
			    'post_status' => null,
			    'post_parent' => $post->ID,
			    'exclude' => get_post_thumbnail_id($post->ID),
			);
			$attachments = get_posts($args);
				
			if ( count($attachments) > 0 ) {
				foreach($attachments as $a) {
					$attachments = (Array)$a;
					break;
				}
				$image .= wp_get_attachment_image($attachments['ID'], 'cubetech-team-thumb', false, array('class' => 'cubetech-team-thumb-hover') );
			}
			$image .= '</div>';
		}
		
		$maillink = '';
		if($mail != '' && get_option('cubetech_team_show_mail') != false )
			$maillink = '<p><a href="mailto:' . $mail . '">' . $mail . '</a></p>';
		
		$phonelink = '';
		if ( $phone != '' && get_option('cubetech_team_show_phone') != false )
			$phonelink = '<p><a href="tel:' . str_replace(' ', '', $phone) . '">' . $phone . '</a></p>';
		
		if ( $i == 0 )
			$contentreturn .= '<div class="cubetech-team-row">';
		elseif ( $i % 2 == 0 && $i < (count($posts)-1) )
			$contentreturn .= '</div><div class="cubetech-team-row">';

		$contentreturn .= '
		<div class="cubetech-team">
			' . $teamtitle . '
			' . $image . '
			<div class="cubetech-team-content">
				' . $functionline . '
				' . $maillink . '
				' . $phonelink . '
			</div>
		</div>';
		
		if ( $i == (count($posts)-1) )
			$contentreturn .= '</div>';

		$i++;

	}
	
	return $contentreturn;
	
}
?>
