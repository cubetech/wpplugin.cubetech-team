<?php

	function cubetech_team_activate() {
		update_option( 'cubetech_team_link_title', false );
		update_option( 'cubetech_team_show_title', 'checked' );
		update_option( 'cubetech_team_show_image', 'checked' );
		update_option( 'cubetech_team_show_mail', 'checked' );
		update_option( 'cubetech_team_show_phone', 'checked' );
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
		delete_option( 'cubetech_team_show_image' );
		delete_option( 'cubetech_team_show_mail' );
		delete_option( 'cubetech_team_show_phone' );
	
	}
	register_uninstall_hook( __FILE__, 'cubetech_team_uninstall' );

?>