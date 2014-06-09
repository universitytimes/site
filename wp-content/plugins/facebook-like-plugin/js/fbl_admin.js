jQuery(document).ready(function () {
	function update_preview() {
		layout_style = jQuery('select[name="fbl[layout_style]"]').val();
		show_faces = jQuery('input[name="fbl[show_faces]"]:checked').val();
		width = jQuery('input[name="fbl[width]"]').val();
		verb = jQuery('select[name="fbl[verb]"]').val();
		font = jQuery('select[name="fbl[font]"]').val();
		color_scheme = jQuery('select[name="fbl[color_scheme]"]').val();
		preview_html = '<h3>Preview</h3>';
		preview_html += '<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.lucascobb.com%2Ffacebook-like-button-plugin%2F&amp;layout=' + layout_style + '&amp;show_faces=' + show_faces + '&amp;width=' + width + '&amp;action=' + verb + '&amp;font=' + font + '&amp;colorscheme=' + color_scheme + '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' + width + 'px; height:px"></iframe>';
		jQuery('#fbl_preview').html(preview_html);		
	}
	
	jQuery('.fbl_settings form input, .fbl_settings form select').change(function () {
		update_preview();
	});
	
	jQuery('input[name="fbl[width]"]').keyup(function () {
		update_preview();												
	});
	
	update_preview();
});