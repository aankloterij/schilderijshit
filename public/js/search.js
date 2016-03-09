$(function(){
	var form;
	form = $('form#searchform');

	$(form).on('submit', function(e){

		e.preventDefault();

		var data = $(this).serialize();

		$.get(base + '/painting/search?' + data, function(successdata){
			console.log(successdata);
		});
	});
});
