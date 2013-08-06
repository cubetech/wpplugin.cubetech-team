jQuery(function() {

	jQuery("#cubetech-team-filter-select").change(function () {
		if ( jQuery("#cubetech-team-filter-select").val() == 'all' ) {
			jQuery(".cubetech-team").fadeIn(500);
		} else {
			jQuery(".cubetech-team").filter(":not(.cubetech-team-group-" + jQuery("#cubetech-team-filter-select").val() + ")").hide();
			jQuery(".cubetech-team").filter(".cubetech-team-group-" + jQuery("#cubetech-team-filter-select").val()).fadeIn(500);
		}
	})
	.change();
	
});