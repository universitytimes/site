jQuery(document).ready(function() { 

       jQuery('.menu-item').each(function(){
           jQuery(this).find('a:contains("tWITTER")').parent().addClass('twitter');
           jQuery(this).find('a:contains("FACEBOOK")').parent().addClass('facebook'); 
       });
    
});

    jQuery.expr[":"].contains = jQuery.expr.createPseudo(function(arg) {
        return function( elem ) {
        return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});
