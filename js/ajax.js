$(window).load(function(){
	//FUNCTION LIKE
	$('.recomended').click(function(){	
		var idpost = $(this).attr('data-postid');
		var iduser = $(this).attr('data-userid');
		
		var xhr = new XMLHttpRequest();
		var datas = '{"id_post":'+idpost+',"id_user":'+iduser+'}';		
		xhr.open('POST', "../fnt/Like.php",true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.send(datas);
		
		var i = $(this).find('i').html();
		
		i = parseInt(i) + 1;
		$(this).find('i').html(i);
		$(this).siblings('.unrecomended').toggleClass('unselected');
		return false;
	});
	
	//FUNCTION UNLIKE
	$('.unrecomended').click(function(){	
		var idpost = $(this).attr('data-postid');
		var iduser = $(this).attr('data-userid');
		
		var xhr = new XMLHttpRequest();
		var datas = '{"id_post":'+idpost+',"id_user":'+iduser+'}';
		xhr.open('POST', "../fnt/Unlike.php",true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.send(datas);
		
		var i = $(this).find('i').html();
		
		i = parseInt(i) + 1;
		$(this).find('i').html(i);
		$(this).siblings('.recomended').toggleClass('unselected');
		return false;
	});
});
