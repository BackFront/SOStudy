$(window).load(function(){
	$('#close_').click(function(){
		$('.modal').toggleClass('hidden');
		return false;
	});
	
	$('#open_').click(function(){
		$('.modal').removeClass('hidden');
		return false;
	});
	
	$('#addLink_').click(function(){
		$('.listLinks').append('<li><input type="text" name="titulo" autocomplete="off" class="small" placeholder="Título" value=""/><input type="text" name="titulo" autocomplete="off" class="small" placeholder="Link" value=""/><label class="small"><select name="midia"><option disabled="disabled" selected="selected">Nivel</option><option value="">Iniciante</option><option value="">Intermediario</option><option value="">Avançado</option></select></label></li>');
		return false;
	});
	
	$('.header-box a.tab').click(function(){
		$('.header-box a.tab').removeClass('select');
		var tabNumber = $(this).attr('href');
		
		$('*[id*=#tab]').removeClass('select');
		$('*[id*=#tab]').toggleClass('hidden');
		
		$(tabNumber).toggleClass('show');
		
		$(this).toggleClass('select');
	});
});
