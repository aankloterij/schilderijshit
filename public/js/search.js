$(function(){

	var template = $('#template_result');

	var form = $('#searchform');

	var formData;

	var pageUrl = document.location.href;

	form.on('submit', function (e)
	{
		e.preventDefault();

		formData = $(this).serialize();
		pageUrl = $(this).get(0).action;

		console.log(pageUrl);

		fix();
	});

	$('#paginate a').on('click', function (e)
	{
		e.preventDefault();
		pageUrl = this.href;

		fix();
	});

	function updateUI(data) {

		var prev, next;

		prev = (typeof data.prev_page_url !== 'undefined' && data.prev_page_url !== null) ? data.prev_page_url : '#';
		next = (typeof data.next_page_url !== 'undefined' && data.next_page_url !== null) ? data.next_page_url : '#';

		$('#prev').attr('href', prev);
		$('#next').attr('href', next);


		$('#results').empty();

		for (var i = 0; i < data.data.length; i++) {
			var item = data.data[i];

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
	}

	function fix() {
		var url = pageUrl.split('#')[0];

		url = url.split('?')[0] + '?' + formData;

		console.log(url);

		$.get(url, function (successdata)
		{
			successdata = JSON.parse(successdata);

			window.history.pushState(successdata, "Search paintings", url);

			updateUI(successdata);
		});
	}

	window.onpopstate = function (event) {
		updateUI(event.state);
	}
});
