$(function(){
	$('.function-wrapper').click(function(){
		$(this).toggleClass('is-unfolded');
		$('.well', this).toggle();
	}).find('.well').hide();
});