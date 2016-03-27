$(function(){

	var template = $('#template_result');

	var form = $('#searchform');

	var formData;

	var pageUrl = window.location.pathname + "/search";

	form.on('submit', function (e)
	{
		e.preventDefault();

		formData = $(this).serialize();

		fix();
	});

	$('#paginate a').on('click', function (e)
	{
		e.preventDefault();
		pageUrl = this.href;

		fix();
	});

	function fix()
	{
		var url = pageUrl + (pageUrl.indexOf('?') === -1 ? '?' : '&') + formData;

		$.get(url, function (successdata)
		{
			$('#prev').attr('href', successdata.prev_page_url || '#');
			$('#next').attr('href', successdata.next_page_url || '#');

			$('#results').empty();

			for (var i = 0; i < successdata.data.length; i++) {
				var item = successdata.data[i];

				$('#template_result #result_name').text(item.naam);
				$('#template_result #result_link').attr('href', item.url);
				$('#template_result #result_preview').attr('src', item.image_location).attr('alt', item.naam);
				$('#template_result #result_artist').text(item.artist);
				$('#template_result #result_description').text(item.description);
				$('#template_result #result_retail').text(item.retail);
				$('#template_result #result_year').text(item.year);

				var element = $('#template_result').clone();
				element.removeAttr('id');

				element.appendTo('#results');
			}
		});
	}

});
