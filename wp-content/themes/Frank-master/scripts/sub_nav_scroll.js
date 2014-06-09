jQuery(window).scroll(function() {

    if(jQuery(window).width() > 760){
        if (jQuery(this).scrollTop()>120)
        {
            jQuery('#sub-nav').slideUp("slow");
        }
        else
        {
            jQuery('#sub-nav').slideDown("slow");
        }
    }
});
