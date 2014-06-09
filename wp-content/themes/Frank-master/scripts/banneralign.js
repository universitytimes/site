jQuery(window).load(function () {
	if(jQuery(".useful_banner_manager_banner")[0]){
		var height = jQuery(".useful_banner_manager_banner").outerHeight(true);
		jQuery('body:not(.paged) .columns article:nth-of-type(2)').css("margin-top", '-' + ((parseInt(height, 10))+10) + 'px');
	}
});
