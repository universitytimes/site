jQuery(document).ready(function () {
    jQuery('.post-title .post-categories a').each(function(){
        var title = jQuery(this).attr('title');
        if(title.indexOf("Review") > -1){
            jQuery(this).css("background-color","#308099");
        }
        else if(title.indexOf("News") > -1){
            jQuery(this).css("background-color","#21414c");
        }
        else if(title.indexOf("InFocus") > -1){
            jQuery(this).css("background-color","#225566");
        }
        else if(title.indexOf("Debate") > -1){
            jQuery(this).css("background-color","#386d7f");
        }
        else if(title.indexOf("Sport") > -1){
            jQuery(this).css("background-color","#3e95b2");
        }
        else if(title.indexOf("Sponsored") > -1){
            jQuery(this).css("background-color","#e5b700");
        }
        else{
            jQuery(this).css("background-color","#46acce");
        }
    });
});
