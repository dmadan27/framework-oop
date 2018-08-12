$(document).ready(function(){
	var url = $(location).attr("href").split('/');

	switch(url[4].toLowerCase()){
		// menu single
		case 'beranda':
			$('.menu-beranda').addClass('active');
			break;

		// menu treeview
		case 'menu-a':
			$('.menu-a').addClass('active');
			if(url[5] == 'a') $('.menu-a').addClass('active');
			else $('.menu-a').addClass('active');
			break;		
		
		default:
			$('.menu-beranda').addClass('active');
			break;
	}
});