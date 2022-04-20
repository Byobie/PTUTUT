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
		let titleWithoutSpace = title.replace(/ /g,'');

		if(titleWithoutSpace.length < 10)
		{
			$("#titleSpan").css("color", "red");
		}
		else
		{
			$("#titleSpan").css("color", "inherit");
		}

		let limit = 75 + (title.length - titleWithoutSpace.length)
		let lengthTitle = titleWithoutSpace.length;
		$("#title_form").attr("maxlength", limit)
		$("#titleSpan").text(lengthTitle+"/75");
	}

	function contentLength (element)
	{
		let content = $(element).val();
		let contentWithoutSpace = content.replace(/ /g,'');

		if(contentWithoutSpace.length < 100)
		{
			$("#contentSpan").css("color", "red");
		}
		else
		{
			$("#contentSpan").css("color", "inherit");
		}

		let limit = 500 + (content.length - contentWithoutSpace.length)
		let lengthContent = contentWithoutSpace.length;
		$("#content_form").attr("maxlength", limit)
		$("#contentSpan").text(lengthContent+"/500");
	}

	titleLength($("#title_form"));
	contentLength($("#content_form"));
});