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
		$("#register_tablet_mobile").css({"margin-left": "264px"});		
		$("#connexion_form_tablet_mobile").css({"margin-left": "264px"});	
		closeMenu();
	}

	function hideNav()
	{
		$("nav").css({"display": "none"});
		$("#register_tablet_mobile").css({"margin-left": "0px"});	
		$("#connexion_form_tablet_mobile").css({"margin-left": "0px"});	
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
		if (searchParams.has("theme"))
		{
			//Test if it's value is equal to "bright".
			if (searchParams.get("theme") == "bright")
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

//STARTING

	openMenu();
	setTheme();

//KEEPING THE NAV PANNEL HIDDEN/DISPLAYED WHEN SWITCHING FROM TABLET/MOBILE X DESKTOP.

let resizeNav = 0;

	$(window).resize(function(){
	  if ($(window).width() >= 1024)
	  {
	  	showNav();
	  	resizeNav = 1
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