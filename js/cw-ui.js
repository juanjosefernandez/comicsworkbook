jQuery(document).ready(function($) {
	console.log("init CW ui");

	$(".more-terms").on("click", function(e) {
		e.preventDefault();
		var tax = $(this).attr("data-taxonomy");
		if ($(this).hasClass("toggled")) {
			$("ul.term-list-" + tax + " li.showing")
				.addClass("hidden")
				.removeClass("showing");
			$(this)
				.removeClass("toggled")
				.empty()
				.text("...");
		} else {
			$("ul.term-list-" + tax + " li.hidden")
				.removeClass("hidden")
				.addClass("showing");
			$(this)
				.addClass("toggled")
				.empty()
				.text("[Collapse]");
		}
	});
});
