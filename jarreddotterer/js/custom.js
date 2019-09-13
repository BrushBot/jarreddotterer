/* Mobile Menu Button Functionality */
$("#navigation-button").click(function () {
	if ($("#navigation").is(":hidden")) {
		$("#navigation").slideDown("slow");
		//$("#navigation-button").css("background", "#B7B7B7 url(//d3tca341wksjib.cloudfront.net/static-images/mobile-nav-icon.png) center 40px no-repeat");
	}
	else {
		$("#navigation").slideUp("slow");
		//$("#navigation-button").css("background", "#E1E1E1 url(//d3tca341wksjib.cloudfront.net/static-images/mobile-nav-icon.png) center 40px no-repeat");
	}
});