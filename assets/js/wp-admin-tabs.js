// WP Admin Tabs

jQuery(document).ready(function($){
	var tabContainer = $('.tab-container');

	tabContainer.addClass('tab-container-js').removeClass('tab-container-without-js');
    tabContainer.find('.nav-tab-wrapper a').click(function(e) {
		e.preventDefault();
        var link		= $(this),
			tabId		= link.attr('href'),
			tab 		= $(tabId);

        // Active tab
        link.siblings().removeClass('nav-tab-active');
        link.addClass('nav-tab-active');

        // Active tab content
		tab.siblings().addClass('hidden');
		tab.removeClass('hidden');

		return false;
    });
});
