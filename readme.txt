=== HeaderHub ===
Contributors: Angelo Marasa
Requires at least: 4.7
Tested up to: 5.4
Stable tag: 4.3
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin that allows you to switch headers directly from your page

== Description ==

A plugin that allows you to switch headers directly from your page

== Frequently Asked Questions ==

= Will this pull in all of my existing header files? =

Yes it will. Even new ones, you'll first have to create your header file and it will automatically pull them in.

= Do I need to change anything in the template pages? = 

Yes, you will need to change `get_header()` to `header_hub_get_custom_header()`. You can still pass a specific header as a function parameter.

== Changelog ==

= 2.0 =
* Added the option to be able to change custom footer as well.

= 1.0 =
* First production release
