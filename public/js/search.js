$(function(){
	var form, results, paginate, next, previous;

	results = $('div#results');

	form = $('form#searchform');

	paginate = $('div#paginate');

	next = $('div#next');

	previous = $('a#previous');

	$(paginate).hide();
	// $(results).hide();

	var next, previous;

	var nexturl, prevurl;

	next = $('#next');
	previous = $('#previous');

	next.on('click', function ()
	{

	});

	previous.on('click', function ()
	{

	});

	function fix(url, data)
	{
		if (data.charAt(0) != '&') data = '&' + data;

		url = url + data;

		$.get(url, function (successdata)
		{
			nexturl = successdata.next_page_url;
			prevurl = successdata.previous_page_url;

			results.empty();


		});
	}

	form.on('submit', function (e)
	{
		e.preventDefault();

		fix(base + '/api/painting/search?', $(this).serialize());
	});

});
