Mantis DD_Filter
=====================

Function
---------
Enables filtering on DueDate and adds a section to the My_view page

Requirements
-------------
Made for and tested against Mantis version 2.x

Installation
------------
Create a custom field with the name 'DueDate' ( without the quotes of course). 
Make sure it is of type DATE and that you check the box for filtering.
Preferably you do not show it in the reports since it is filled automatically and only used in the back end.
Connect it to all projects.

In order to get info of bugs with duedate in the next X days, you need to change my_view_page.php.
Locate the following lines:
<?php
define( 'MY_VIEW_INC_ALLOW', true );

and right after that, insert the following lines:
event_signal( 'EVENT_MYVIEW' );



