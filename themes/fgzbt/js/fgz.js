place_elements();
jQuery( window ).resize(function() {place_elements()});

function place_elements() {

	var blockimpressum = jQuery('#block-impressumagb');

	if (jQuery(window).width() <= 767) {
		jQuery('.region-footer').prepend(blockimpressum.detach());
	} else {
		jQuery('.region-ganz-oben').prepend(blockimpressum.detach());
	}
}

function ajax_formular(argument) {
	var formular = jQuery('.view-veranstaltungen form');
	var button = formular.find('button[type="submit"]');
	button.hide();
	formular.find('input[type="radio"]').on('change', function() { 
		button.trigger('click');
	});
}
ajax_formular();
jQuery(document).bind('DOMSubtreeModified', function () {
	ajax_formular();
});