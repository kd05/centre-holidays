// Run when DOM is ready
jQuery(function ($) {
    // Toggle the dropdown menu manually on button click
    $('.dropdown .dropdown-toggle').on('click', function (e) {
        e.preventDefault(); // prevent default Bootstrap behavior if needed
        var $menu = $(this).next('.dropdown-menu');
        $menu.toggleClass('show');
    });
});
