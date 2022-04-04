$(document).ready(function(){

	$("#title_form").keyup(function()
	{
		titleLength($(this));
	});

	$("#content_form").keyup(function()
	{
		contentLength($(this));
	});

	function titleLength (element)
	{
		let title = $(element).val();
		let lengthTitle = title.length;
		$("#titleSpan").text(lengthTitle+"/100");
	}

	function contentLength (element)
	{
		let content = $(element).val();
		let lengthContent = content.length;
		$("#contentSpan").text(lengthContent+"/500");
	}

	titleLength($("#title_form"));
	contentLength($("#content_form"));
});