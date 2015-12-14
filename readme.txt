=== Member Content Visibility ===
Contributors: webilop
Tested up to: 4.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add shortcode that allows to display content parts to logged in or non-logged in users. Also includes integration with visual composer.

== Description ==
This plugin allows to display content sections only to logged in users, or only to non-logged in users.

After activating the plugin use the shortcode [member_container] to encapsulate the content you want to show exclusively to members or non members. For example:
[member_container show=\"non-members\"] Join now! [/member_container]

The shortcode has only one parameter:
- show: Determines the kind of user that is the content for. Possible values are: \"members\", \"non-members\".

If you have Visual Composer installed, a new element will appear under the category \"Content\", when it is inserted you can choose if the content will be for members or non members

[The plugin is available in Github](https://github.com/Webilop/member-content-visibility). We receive patches to fix bugs and translation files.

== Installation ==
1. Visit Plugins > Add New
2. Search for Member Content Visibility
3. Activate Member Content Visibility from your Plugins page.
