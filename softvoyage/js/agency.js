/**
	* Vacation.com Agency JavaScript
	* @author Parcom Marketing [http://www.parcommarketing.com]
	* @version 20100714.1420
	*/
jQuery(function($) {
	
	/** Search Box Tabs **/
	$('ul.svTabs>li>a').click(function (evt) {
		var svWrap = $(this).closest('div.svWrap, div.svWideWrap');
		var iframe = svWrap.find('iframe');
		var items = svWrap.find('ul.svTabs>li');
		var currentItem = $(this).parent();

		// Indicate current tab
		items.removeClass('current');
		currentItem.addClass('current');
		
		// Class the frame by determining which tab was clicked
		var frameClass = currentItem.attr('class').split(' ', 1)[0].replace('Tab', 'Frame');
		iframe.removeClass();
		iframe.addClass(frameClass);
	});
	
});