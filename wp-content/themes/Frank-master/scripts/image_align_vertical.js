jQuery(window).load(function(){
 
    jQuery('.crop').each(function centerImage() {
        
        var imageHeight,imageWidth, wrapperHeight, overlap, container = jQuery(this);  
        imageHeight = container.find('img').height();
        wrapperHeight = container.height();
        overlap = (wrapperHeight - imageHeight) / 2;
        container.find('img').css('margin-top', overlap);
            });

 
});

jQuery(window).resize(function(){
    jQuery('.crop').each(function centerImage() {
        
        var imageHeight, wrapperHeight, overlap, container = jQuery(this);  
        imageHeight = container.find('img').height();
        wrapperHeight = container.height();
        overlap = (wrapperHeight - imageHeight) / 2;
        container.find('img').css('margin-top', overlap);
    });
     
 
});
