/*  Simply adds an extra element to the list for the mobile view nav */ 
jQuery(document).ready(function () {
    jQuery("#site-nav .menu li:first-child").add().after('<li id="menu-item-99999" class="navbutton menu-item menu-item-type-taxonomy menu-item-object-category menu-item-99999"><a style="cursor:pointer;"></a></li>');
});
