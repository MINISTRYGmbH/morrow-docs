if ($('#desktop-test').is(':hidden')) {
	$('#classes-accordion-panel-body').addClass('collapse');
	$('a[href="#classes-accordion-panel-body"]').addClass('collapsed');
} else {
	$('#classes-accordion-panel-body').addClass('collapse').addClass('in');
}