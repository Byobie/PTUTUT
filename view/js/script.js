$(document).ready(function(){

//NAV_DISPLAY
	function openMenu()
	{
		$("#openMenu_tablet").click(showNav);
	}

	function closeMenu()
	{
		$("#openMenu_tablet").click(hideNav);
	}

	function showNav()
	{
		$("nav").css({"display": "block"});
		$("#registerForm").css({"margin-left": "264px"});		
		$("#connexionForm").css({"margin-left": "264px"});	
		$("#publishForm").css({"margin-left": "264px"});	
		$("#publishFormTwo").css({"margin-left": "264px"});
		$("#publishFormThree").css({"margin-left": "264px"});
		$("#publishFormFour").css({"margin-left": "264px"});
		$("#sectionAdmin_one").css({"margin-left": "264px"});
		$("#sectionAdmin_ManageUsers").css({"margin-left": "264px"});
		closeMenu();
	}

	function hideNav()
	{
		$("nav").css({"display": "none"});
		$("#registerForm").css({"margin-left": "0px"});	
		$("#connexionForm").css({"margin-left": "0px"});	
		$("#publishForm").css({"margin-left": "0px"});
		$("#publishFormTwo").css({"margin-left": "0px"});	
		$("#publishFormThree").css({"margin-left": "0px"});
		$("#publishFormFour").css({"margin-left": "0px"});
		$("#sectionAdmin_one").css({"margin-left": "0px"});
		$("#sectionAdmin_ManageUsers").css({"margin-left": "0px"});
		openMenu();
	}

//SWITCHING DARK/BRIGHT MODE

	function selectBrightTheme()
	{
		$("#select_theme > img").click(switchToBrightTheme);

	}

	function selectDarkTheme()
	{
		$("#select_theme > img").click(switchToDarkTheme);

	}

	function switchToBrightTheme()
	{
		$("#desktop").attr("href", "../../view/css/output/desktop_style_bright.css");
		$("#tablet").attr("href", "../../view/css/output/tablet_style_bright.css");
		$("#mobile").attr("href", "../../view/css/output/mobile_style_bright.css");

		//THIS PART IS USED TO MODIFY THE THEME VALUE IN THE HREF LINK ON EACH PAGE, TO ENSURE THAT THE RIGHT THEME IS PASSED FROM A PAGE TO EACH OTHER DURING THE NAVIGATION.
		//IT SEARCH FOR ALL THE A, THEN GET THE HREF, THEN CONVERTS THE HREF INTO A STRING, THEN CHANGE THE THEME AND FINALLY, PUT THE NEW VALUE IN THE HREF PARAMTER OF ALL A.

		let theme = "";

		$("a").each(function(){
			theme = $(this).attr("href");
			theme.toString();
			theme = theme.replace("dark", "bright");
			$(this).attr("href", theme);
		});

		$("form").each(function(){
			theme = $(this).attr("action");
			theme.toString();
			theme = theme.replace("dark", "bright");
			$(this).attr("action", theme);
		});

		$("#select_theme > span").text("BRIGHT MODE");
		selectDarkTheme();
	}

	function switchToDarkTheme()
	{
		$("#desktop").attr("href", "../../view/css/output/desktop_style_dark.css");
		$("#tablet").attr("href", "../../view/css/output/tablet_style_dark.css");
		$("#mobile").attr("href", "../../view/css/output/mobile_style_dark.css");

		let theme = "";

		$("a").each(function(){
			theme = $(this).attr("href");
			theme.toString();
			theme = theme.replace("bright", "dark");
			$(this).attr("href", theme);
		});

		$("form").each(function(){
			theme = $(this).attr("action");
			theme.toString();
			theme = theme.replace("bright", "dark");
			$(this).attr("action", theme);
		});
		
		$("#select_theme > span").text("DARK MODE");
		selectBrightTheme();
	}

	function setTheme()
	{
		//Get the URL into a new object.
		let searchParams = new URLSearchParams(window.location.search);

		//Test if the GET "theme" parameter do exists in the URL.
		if (searchParams.has("selectedTheme"))
		{
			//Test if it's value is equal to "bright".
			if (searchParams.get("selectedTheme") == "bright")
			{
				$("#select_theme > span").text("BRIGHT MODE");
				selectDarkTheme();
			}
			else
			{
				$("#select_theme > span").text("DARK MODE");
				selectBrightTheme();
			}
		}
		else
		{
			$("#select_theme > span").text("DARK MODE");
			selectBrightTheme();
		}
	}

//VIEWMORE

let low = 3;
let high = 6;

function viewMore ()
{

	if($("#position_tablet_mobile > span").text() == "FRESH" || $("#position_desktop > span").text() == "FRESH")
	{
		$.post('../../model/script/getMoreNews.php',
		{
		    low: low,
		    high: high,
		}, function(data) {

			let result = $.parseJSON(data)

			if(result.length > 0)
			{
			   	for (let i = 0; i <= result.length - 1; i++) 
			   	{
			   		let newsData = result[i];

			   		let news = "<article class='news'>";
			   		news += "<div>";
			   		news += "<a href=''><h2>" + newsData["login_user"] + "</h2></a>";
					news += "<div>";
					news += "<span>" + newsData["date_news"] + "</span>";
					news += "<h4>"  + newsData["name_category"] + "</h4>";
					news += "</div>";
					news += "</div>";
					news += "<div>";
					news += "<h3>"  + newsData["title_news"] + "</h3>";
					news += "</div>";
					news += "<div>";

					if(newsData["image_news"] == "../model/Uploads/")
					{
						news += "<p>" + newsData["content_news"] + "</p>";
					}
					else
					{
						news += "<p><img src='../" + newsData["image_news"] + "' alt='image de la nouvelle'></img>" + newsData["content_news"] + "</p>";
					}
					news += "<p style='display: none; font-size: 28px'>";
					news += "1. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceOneUrl_news"] + "'>" + newsData["sourceOneTitle_news"] + "</a></br></br>";

					if (newsData["sourceTwoTitle_news"] != "")
					{
						news += "2. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceTwoUrl_news"] + "'>" + + newsData["sourceTwoTitle_news"] + "</a></br></br>";
					}

					if (newsData["sourceThreeTitle_news"] != "")
					{
						news += "3. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceThreeUrl_news"] + "'>" + + newsData["sourceThreeTitle_news"] + "</a></br></br>";
					}

					news += "</p>";
					news += "</div>";
					news += "<div>";
					news += "<span class='sourcesNews'><h4>SOURCES</h4></span>";
					news += "</div>";
					news += "</article>";	

			   		$("article.news:last-child" ).after(news);
			   	}

			   	$(".sourcesNews").click(viewSources);
			   	low = low+3;
			   	high = high +3;
			}
			else
			{
				console.log("lel nope");
			}
		});
	}
	else
	{
		let position = $("#position_tablet_mobile > span").text();

		$.post('../../model/script/getMoreNewsByCategory.php',
		{
		    low: low,
		    high: high,
		    position: position,

		}, function(data) {

			let result = $.parseJSON(data)
			
			if(result.length > 0)
			{
			   	for (let i = 0; i <= result.length - 1; i++) 
			   	{
			   		let newsData = result[i];

			   		let news = "<article class='news'>";
			   		news += "<div>";
			   		news += "<a href=''><h2>" + newsData["login_user"] + "</h2></a>";
					news += "<div>";
					news += "<span>" + newsData["date_news"] + "</span>";
					news += "<h4>"  + newsData["name_category"] + "</h4>";
					news += "</div>";
					news += "</div>";
					news += "<div>";
					news += "<h3>"  + newsData["title_news"] + "</h3>";
					news += "</div>";
					news += "<div>";

					if(newsData["image_news"] == "../model/Uploads/")
					{
						news += "<p>" + newsData["content_news"] + "</p>";
					}
					else
					{
						news += "<p><img src='../" + newsData["image_news"] + "' alt='image de la nouvelle'></img>" + newsData["content_news"] + "</p>";
					}
					news += "<p style='display: none; font-size: 28px'>";
					news += "1. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceOneUrl_news"] + "'>" + newsData["sourceOneTitle_news"] + "</a></br></br>";

					if (newsData["sourceTwoTitle_news"] != "")
					{
						news += "2. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceTwoUrl_news"] + "'>" + + newsData["sourceTwoTitle_news"] + "</a></br></br>";
					}

					if (newsData["sourceThreeTitle_news"] != "")
					{
						news += "3. <a style='color:inherit; text-decoration: none;'  href='" + newsData["sourceThreeUrl_news"] + "'>" + + newsData["sourceThreeTitle_news"] + "</a></br></br>";
					}

					news += "</p>";
					news += "</div>";
					news += "<div>";
					news += "<span class='sourcesNews'><h4>SOURCES</h4></span>";
					news += "</div>";
					news += "</article>";	

			   		$("article.news:last-child" ).after(news);
			   	}

			   	$(".sourcesNews").click(viewSources);
			   	low = low+3;
			   	high = high +3;
			}
			else
			{
				console.log("lel nope");
			}
		});
	}
}

//VIEW SOURCES

function hideNews()
{
	$($($(this).parent()).parent()).find("div:nth-child(3) > p:first-child").css("display", "block");
	$($($(this).parent()).parent()).find("div:nth-child(3) > p:last-child").css("display", "none");
	$(this).children().text("SOURCES");

	$(this).click(viewSources);
}

function viewSources()
{
	$($($(this).parent()).parent()).find("div:nth-child(3) > p:first-child").css("display", "none");
	$($($(this).parent()).parent()).find("div:nth-child(3) > p:last-child").css("display", "block");
	$(this).children().text("CLOSE");

	$(this).click(hideNews);
}

//PASSWORD VALIDATOR

/*function passwordValidator (element)
	{
		$("#passwordCondition").css("display", "inline");

		let passwordValue = $(element).val();

		let upperCase = new RegExp(/[A-Z]/);
		let lowerCase = new RegExp(/[a-z]/);
		let numbers = new RegExp(/[0-9]/);
		let specials = new RegExp(/[ éèç°`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/);

		let interuptor = 0;

		if(passwordValue.length >= 12)
		{
			$("#passwordCondition > span:first-child").css("display", "none");
			interuptor++;
		}
		else
		{
			$("#passwordCondition > span:first-child").css("display", "initial");
			interuptor--;
		}

		if(upperCase.test(passwordValue))
		{
			$("#passwordCondition > span:nth-child(2)").css("display", "none");
			interuptor++;
		}
		else
		{
			$("#passwordCondition > span:nth-child(2)").css("display", "initial");
			interuptor--;
		}

		if(lowerCase.test(passwordValue))
		{
			$("#passwordCondition > span:nth-child(3)").css("display", "none");
			interuptor++;
		}
		else
		{
			$("#passwordCondition > span:nth-child(3)").css("display", "initial");
			interuptor--;
		}

		if(numbers.test(passwordValue))
		{
			$("#passwordCondition > span:nth-child(4)").css("display", "none");
			interuptor++;
		}
		else
		{
			$("#passwordCondition > span:nth-child(4)").css("display", "initial");
			interuptor--;
		}

		if(specials.test(passwordValue))
		{
			$("#passwordCondition > span:last-child").css("display", "none");
			interuptor++;
		}
		else
		{
			$("#passwordCondition > span:last-child").css("display", "initial");
			interuptor--;
		}

		if(interuptor == 5)
		{
			$("#passwordCondition").css("display", "none");
		}
		else
		{
			$("#passwordCondition").css("display", "initial");
		}
	}


if($("#passwordCondition"))
{
	$("#password_form").keyup(function()
	{
		passwordValidator ($(this));
	});
}*/

//STARTING

	openMenu();
	setTheme();

if($("#viewMore"))
{
	$("#viewMore").click(viewMore);
}

if($(".sourcesNews"))
{
	$(".sourcesNews").click(viewSources);
}

//KEEPING THE NAV PANNEL HIDDEN/DISPLAYED WHEN SWITCHING FROM TABLET/MOBILE X DESKTOP.

let resizeNav = 0;

	$(window).resize(function(){
	  if ($(window).width() >= 1024)
	  {
	  	showNav();
	  	resizeNav = 1
	  	$("#registerForm").css({"margin-left": "0px"});	
		$("#connexionForm").css({"margin-left": "0px"});	
		$("#publishForm").css({"margin-left": "0px"});
		$("#publishFormTwo").css({"margin-left": "0px"});	
		$("#publishFormThree").css({"margin-left": "0px"});
		$("#publishFormFour").css({"margin-left": "0px"})
		$("#sectionAdmin_one").css({"margin-left": "300px"});
		$("#sectionAdmin_ManageUsers").css({"margin-left": "300px"});
	  }
	});

	$(window).resize(function(){
	  if ($(window).width() < 1024 && resizeNav == 1)
	  {
	  	hideNav();
	  	resizeNav = 0
	  }
	});	
});