jQuery(document).ready(function () {
    var count = 1;
    jQuery('#site-nav li:nth-child(2)').click(function () {
        if ((count++) % 2) {
            jQuery("#site-nav li:not(:first-child):not(:nth-child(2)):not(:nth-last-child(2)):not(:nth-last-child(3))").slideDown('fast');
            jQuery("#site-nav li:last-child").css('width', '100%');
        } else {
            jQuery("#site-nav li:not(:first-child):not(:nth-child(2)):not(:nth-last-child(2)):not(:nth-last-child(3))").slideUp('fast');
            jQuery("#site-nav li:last-child").css('width', '100%');
        }
    });
    
    jQuery(window).resize(function() {
        if (jQuery(window).width() < 775) {
            jQuery("#site-nav li:not(:first-child):not(:nth-child(2)):not(:nth-last-child(2)):not(:nth-last-child(3))").css("display","none");
            jQuery("#site-nav li:last-child").css('width', 'auto').css("white-space","nowrap");
	jQuery('#sub-nav').css('display','none');
        }
        else if (jQuery(window).width() > 774) {
            jQuery("#site-nav li:not(:first-child):not(:nth-child(2)):not(:nth-last-child(2)):not(:nth-last-child(3))").css("display","inline-block");
            jQuery("#site-nav li:last-child").css('width', 'auto').css("white-space","nowrap");
	jQuery('#sub-nav').css('display','inline-block');
        }

    });
});
