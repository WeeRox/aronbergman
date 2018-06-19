$().ready(function() {
	console.log("ready");
	$(".svg").each(function(i, e) {
		$.ajax({
			url: $(e).attr("src"),
			element: e
		}).done(function(data) {
			console.log(data);
			console.log($(data).contents().prop("outerHTML"));
			console.log(this.element);

			$(this.element).replaceWith($(data).contents().prop("outerHTML"));
		});
	});
});
