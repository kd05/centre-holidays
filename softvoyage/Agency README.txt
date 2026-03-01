==========================================
== Travel Agency Site Integration Notes ==
==========================================


Resizing the Search Frame
=========================

By default the search frame will adjust its width to fit the width of its container. If you are using tabs in your site, they may need to be adjusted to match the width of the frame - to do so will need to adjust the values contained in your agency.css file.


Adjusting Width of Narrow Frame
*******************************

line 7: Change width of the .svWrap to desired width.
line 9: Change width of the .svWrap .svTabs to desired width, less 10 pixels.
lines 10-14: Total width of these lines must add up to desired width, less 2 pixels.

Example
-------

To change the size of the narrow frame to 350px, make the following changes:

line  7: .svWrap { width: 350px; }
line  9; .svWrap .svTabs { width: 340px; }
line 10: .svWrap .svTabCars { width: 65px; }
line 11: .svWrap .svTabFlights { width: 70px; }
line 12: .svWrap .svTabHotels { width: 70px; }
line 13: .svWrap .svTabLastMinute { width: 63px; }
line 14: .svWrap .svTabPackages { width: 80px; }


Adjusting Width of Wide Frame
*****************************

line 21: Change width of the .svWideWrap to desired width.
line 23: Change width of the .svWideWrap .svTabs to desired width, less 10 pixels.
lines 24-28: Total width of these lines must add up to desired width, less 2 pixels.

Example
-------

To change the size of the wide frame to 500px, make the following changes:

line 21: .svWideWrap { width: 500px; }
line 23: .svWideWrap .svTabs { width: 490px; }
line 24: .svWideWrap .svTabCars { width: 92px; }
line 25: .svWideWrap .svTabFlights { width: 92px; }
line 26: .svWideWrap .svTabHotels { width: 92px; }
line 27: .svWideWrap .svTabLastMinute { width: 117px; }
line 28: .svWideWrap .svTabPackages { width: 105px; }
