$(function(){

	var curSlide = 0;
	var maxSlide = $('.contato-single').length - 1;
	var delay = 3;

	initSlider();
	

	function initSlider(){
		$('.contato-single').hide();
		$('.contato-single').eq(0).show();
		for (var i = 0; i < maxSlide-2; i++) {
			var content = $('.bolas').html();
			if(i == 0)
			content+='<span class="active-slides"></span>';
			else
				content+='<span></span>';
			$('.bolas').html(content);


		}//fim for
	}//fim initSlid
	

$('body').on('click','.bolas span',function(){
	var currentBullet = $(this);
	$('.contato-single').eq(curSlide).stop().fadeOut(1000);
	curSlide= currentBullet.index();
	$('.contato-single').eq(curSlide).stop().fadeIn(1000 );
	$('.bolas span').removeClass('active-slides');
	currentBullet.addClass('active-slides');


});


})//fim function principal