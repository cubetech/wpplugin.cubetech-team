<?php
// create custom plugin settings menu
add_action('admin_menu', 'cubetech_team_create_menu');

function cubetech_team_create_menu() {

	//create new top-level menu
	add_submenu_page('edit.php?post_type=cubetech_team', 'Einstellungen', 'Einstellungen', 'edit_posts', __FILE__, 'cubetech_team_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_cubetech_team_settings' );
}


function register_cubetech_team_settings() {
	//register our settings
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_link_title' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_title' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_function' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_edu' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_image' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_mail' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_phone' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_hr' );
	register_setting( 'cubetech-team-settings-group', 'cubetech_team_show_groups' );
}

function cubetech_team_settings_page() {
?>
<div class="wrap">
<h2>cubetech Team Einstellungen</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'cubetech-team-settings-group' ); ?>
    <table class="form-table">

        <tr valign="top">
        <th scope="row">Titel auf Detailseite verlinken</th>
        <td><input type="checkbox" name="cubetech_team_link_title" value="checked" <?php echo get_option('cubetech_team_link_title'); ?> /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Infos in Shortcode-Übersicht anzeigen</th>
        <td>
	        <input type="checkbox" name="cubetech_team_show_title" value="checked" <?php echo get_option('cubetech_team_show_title'); ?> /> Titel anzeigen<br />
	        <input type="checkbox" name="cubetech_team_show_function" value="checked" <?php echo get_option('cubetech_team_show_function'); ?> /> Funktion anzeigen<br />
	        <input type="checkbox" name="cubetech_team_show_edu" value="checked" <?php echo get_option('cubetech_team_show_edu'); ?> /> Ausbildung anzeigen<br />
	        <input type="checkbox" name="cubetech_team_show_image" value="checked" <?php echo get_option('cubetech_team_show_image'); ?> /> Bild anzeigen<br />
	        <input type="checkbox" name="cubetech_team_show_mail" value="checked" <?php echo get_option('cubetech_team_show_mail'); ?> /> Mailadresse anzeigen<br />
	        <input type="checkbox" name="cubetech_team_show_phone" value="checked" <?php echo get_option('cubetech_team_show_phone'); ?> /> Telefonnummer anzeigen<br />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Gruppentitel anzeigen</th>
        <td><input type="checkbox" name="cubetech_team_show_groups" value="checked" <?php echo get_option('cubetech_team_show_groups'); ?> /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Horizontale Trennlinie anzeigen</th>
        <td><input type="checkbox" name="cubetech_team_show_hr" value="checked" <?php echo get_option('cubetech_team_show_hr'); ?> /></td>
        </tr>
         
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>