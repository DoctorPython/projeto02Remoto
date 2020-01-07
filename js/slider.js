$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length - 1;
	var delay = 3;

	initSlider();
	changeSlide();

	function initSlider(){
		$('.banner-single').hide();
		$('.banner-single').eq(0).show();
		for (var i = 0; i < maxSlide-2; i++) {
			var content = $('.bullets').html();
			if(i == 0)
			content+='<span class="active-slides"></span>';
			else
				content+='<span></span>';
			$('.bullets').html(content);


		}//fim for
	}//fim initSlid
	function changeSlide(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).fadeOut(2000);
			curSlide++;
			if (curSlide > maxSlide)
				 curSlide = 0; 
			$('.banner-single').eq(curSlide).fadeIn(2000 );	
			//trocar navegação do slide
			$('.bullets span').removeClass('active-slides');
			$('.bullets span').eq(curSlide).addClass('active-slides');
		},delay *1000);//fin setInterval

	}//fim changeSlide

$('body').on('click','.bullets span',function(){
	var currentBullet = $(this);
	$('.banner-single').eq(curSlide).stop().fadeOut(1000);
	curSlide= currentBullet.index();
	$('.banner-single').eq(curSlide).stop().fadeIn(1000 );
	$('.bullets span').removeClass('active-slides');
	currentBullet.addClass('active-slides');


});




})//fim function principal


	


