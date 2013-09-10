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
	
	jQuery("img.cubetech-team-thumb").hover(function() {
		jQuery(this).stop().animate({"opacity": "0"}, "slow");
			}, function() {
		jQuery(this).stop().animate({"opacity": "1"}, "slow");
	});

});