<?php

	function cubetech_team_activate() {
		update_option( 'cubetech_team_link_title', false );
		update_option( 'cubetech_team_show_title', 'checked' );
		update_option( 'cubetech_team_show_function', 'checked' );
		update_option( 'cubetech_team_show_edu', 'checked' );
		update_option( 'cubetech_team_show_image', 'checked' );
		update_option( 'cubetech_team_show_mail', 'checked' );
		update_option( 'cubetech_team_show_phone', 'checked' );
		update_option( 'cubetech_team_show_social', 'checked' );
		update_option( 'cubetech_team_show_hr', 'checked' );
		update_option( 'cubetech_team_show_groups', 'checked' );
		update_option( 'cubetech_team_layout', '2col' );
		update_option( 'cubetech_team_use_editor', '' );
	}
	register_activation_hook( __FILE__, 'cubetech_team_activate' );
	
	function cubetech_team_uninstall()
	{
	    if ( ! current_user_can( 'activate_plugins' ) )
	        return;
	    check_admin_referer( 'bulk-plugins' );
	
	    // Important: Check if the file is the one
	    // that was registered during the uninstall hook.
	    if ( __FILE__ != WP_UNINSTALL_PLUGIN )
	        return;
	
		delete_option( 'cubetech_team_link_title' );
		delete_option( 'cubetech_team_show_title' );
		delete_option( 'cubetech_team_show_function' );
		delete_option( 'cubetech_team_show_edu' );
		delete_option( 'cubetech_team_show_image' );
		delete_option( 'cubetech_team_show_mail' );
		delete_option( 'cubetech_team_show_phone' );
		delete_option( 'cubetech_team_show_social' );
		delete_option( 'cubetech_team_show_hr' );
		delete_option( 'cubetech_team_show_groups' );
		delete_option( 'cubetech_team_layout' );
		delete_option( 'cubetech_team_use_editor' );
	
	}
	register_uninstall_hook( __FILE__, 'cubetech_team_uninstall' );

?>