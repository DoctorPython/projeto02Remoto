$(function(){
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul');
		/*if(listaMenu.is(':hidden') == true){
			listaMenu.fadeIn();
		}else{
			listaMenu.fadeOut();
		}*/
		//listaMenu.slideToggle();
		if(listaMenu.is(':hidden') == true){
			// fa fa-bars  fa fa-window-close alert('vamos abrir');
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa fa-window-close');
			listaMenu.slideToggle();
		}else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass(' fa-window-close');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}
		
	});//fim

	if ($('target').length > 0) {
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({scrollTop:divScroll},2000);
	}

	//carregarDimamicamente();
	function carregarDimamicamente(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.conteiner-principal').load(INCLUDE_PATH+'pages/'+pagina+'.php');
			return false;
		})
	}//fim
	
})//fim função principal