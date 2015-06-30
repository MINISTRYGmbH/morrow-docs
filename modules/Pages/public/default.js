if ($('#desktop-test').is(':hidden')) {
	$('#pages-accordion-panel-body').addClass('collapse');
	$('a[href="#pages-accordion-panel-body"]').addClass('collapsed');
} else {
	$('#pages-accordion-panel-body').addClass('collapse').addClass('in');
}