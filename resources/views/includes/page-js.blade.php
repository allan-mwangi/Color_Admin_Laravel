<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset("assets/js/vendor.min.js")}}"></script>
<script src="{{ asset("assets/js/app.min.js")}}"></script>
<script>
    var handleWidgetPageDisplay = function() {
	$('[data-change="widget-theme"]').click(function(e) {
		e.preventDefault();
		
		var lightBtn = '[data-change="widget-theme"][data-theme="light"]';
		var darkBtn = '[data-change="widget-theme"][data-theme="dark"]';
		var targetTheme = $(this).attr('data-theme');
		var attrClass = (targetTheme == 'dark') ? 'data-dark-class' : 'data-light-class';
		var attrDoc = (targetTheme == 'dark') ? 'data-dark-doc' : 'data-light-doc';
		console.log("chosen theme is "+targetTheme);
		if (targetTheme == 'dark') {
			$('[data-id="widget"]').attr(app.darkMode.attr, app.darkMode.value);
			$(darkBtn).find('.fa').addClass('text-blue');
			$(lightBtn).find('.fa').removeClass('text-blue');
			$('.even td').css("color", "#000000");
            console.log("changing settings to dark theme");
            document.documentElement.setAttribute('data-bs-theme', 'dark');
			//document.querySelector('.app-sidebar-content').style.backgroundColor = "#222222";
		} else {
			$('[data-id="widget"]').removeAttr(app.darkMode.attr);
			$(darkBtn).find('.fa').removeClass('text-blue');
			$(lightBtn).find('.fa').addClass('text-blue');
			//document.querySelector('.app-sidebar-content').style.backgroundColor = "#CCCCCC";  
            document.documentElement.removeAttribute('data-bs-theme');
            console.log("changing settings to light theme");

		}
		$('[data-id="widget-elm"]').each(function() {
			var targetClass = $(this).attr(attrClass);
			$(this).attr('class', targetClass);
		});
		$('[data-id="widget-doc"]').each(function() {
			var targetText = $(this).attr(attrDoc);
			$(this).html(targetText);
		});
		$('[data-change="widget-theme"]').not(this).removeClass('active');
		$(this).addClass('active');
		Cookies.set('widget-theme', targetTheme);
	});
	if (Cookies && Cookies.get('widget-theme')) {
		var targetTheme = Cookies.get('widget-theme');
		$('[data-change="widget-theme"][data-theme="'+ targetTheme +'"]').trigger('click');
	}
};
handleWidgetPageDisplay();
</script>
<!-- ================== END core-js ================== -->

@stack('scripts')