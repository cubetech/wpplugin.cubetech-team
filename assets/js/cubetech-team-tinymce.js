tinymce.create( 
	'tinymce.plugins.cubetech_team', 
	{
	    /**
	     * @param tinymce.Editor editor
	     * @param string url
	     */
	    init : function( editor, url ) {
			/**
			*  register a new button
			*/
			editor.addButton(
				'cubetech_team_button', 
				{
					cmd   : 'cubetech_team_button_cmd',
					title : editor.getLang( 'cubetech_team.buttonTitle', 'cubetech Team' ),
					image : url + '/../img/toolbar-icon.png'
				}
			);
			/**
			* and a new command
			*/
			editor.addCommand(
				'cubetech_team_button_cmd',
				function() {
					/**
					* @param Object Popup settings
					* @param Object Arguments to pass to the Popup
					*/
					editor.windowManager.open(
						{
							// this is the ID of the popups parent element
							id       : 'cubetech_team_dialog',
							width    : 480,
							title    : editor.getLang( 'cubetech_team.popupTitle', 'cubetech Team' ),
							height   : 'auto',
							wpDialog : true,
							display  : 'block',
						},
						{
							plugin_url : url
						}
					);
				}
			);
		}
	}
);

// register plugin
tinymce.PluginManager.add( 'cubetech_team', tinymce.plugins.cubetech_team );