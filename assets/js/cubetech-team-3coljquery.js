jQuery(function() {

	jQuery('.cubetech-team-more-button').click(function(){
		if(jQuery(this).parent().parent().find('.cubetech-team-3coljquery').text().length > 0) {
			jQuery(this).parent().parent().find('.cubetech-team-3coljquery').slideToggle(200);
		}
		jQuery(this).find('.more').fadeToggle(50);
		jQuery(this).find('.less').fadeToggle(50);
		return false;
	});
	
});