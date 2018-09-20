$(document).ready(function () {
	$(document).on('submit' , '#send-form', function (e) {
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url: '/site/send-form',
			type: 'post',
			data: data,
			// contentType: false,
			processData: false,
			success: function (response) {
				console.log(response);
				var url = $("input[name='ChangeIP[url]']").val()
				$('#middle').attr('src',url);
				$('#result').html(response);
				// $('#send-form').trigger('reset');
			}
		});
	});
});