$(function(){
	var menu = $('div#menu_main');
	var sidebar = $('aside.main');
	var search = $('div#search');
	var searchbar = $('input#searchbar');


	$(menu).click(function(){
		$(sidebar).toggleClass('hidden');
	});

	$(search).click(function(){
		$(searchbar).toggleClass('hidden')
	});
});
