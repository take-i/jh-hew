=== JankHack-Hew ===

Contributors: automattic
Tags: white, yellow, black, one-column, responsive-layout, custom-header, custom-menu, infinite-scroll, featured-images, sticky-post, rtl-language-support, translation-ready, threaded-comments,

Requires at least: 3.9
Tested up to: 4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

JankHack-Hew is a personal blog theme with distinct identity and a splash of colour! It's all about sharing your thoughts and experiences, and connecting with your readers via prominently placed social media links.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

The demo site URL: http://jhhewdemo.wordpress.com/?demo

= How to set up Custom Header Image? =

By default, JankHack-Hew displays the site owner’s Gravatar in the header. To use a different image, navigate to Customize > Header and upload new picture. You can also remove it completely by selecting the Hide Image option. The Custom Header Image size is 80 x 80px.

= How to set up widgets? =

JankHack-Hew offers four widget areas, located in a slide-out top panel. To show and hide the panel, click the three dots icon in the header’s top right corner. If no widgets are active, the icon won’t appear. Widgets can be configured via Appearance > Widgets.

= How to set up Custom Menu? =

JankHack-Hew comes with one Custom Menu in the header, which can be configured via Appearance > Menus. This menu is hidden by default, and will not be displayed unless a Custom Menu is assigned.

= How to add the social links? =

With JankHack-Hew, you have the option to display links to your social media profiles in the footer, just above the website credits. Icons for Twitter, Facebook, LinkedIn and most other popular networks are included, and JankHack-Hew will automatically display an icon for each service if it's available.

- Set up the menu -

To automatically apply icons to your links, simply create a new Custom Menu from Appearance > Menus. You can name it however you like. Next, add each of your social links to this menu. Each menu item should be added as a custom link.

Once your menu is created and your social links are added, assign it to the Social Menu location under Menu Settings.

- Available icons -

Linking to any of the following sites will automatically display its icon in your menu:

* Codepen
* Digg
* Dribbble
* Dropbox
* Facebook
* Foursquare
* Flickr
* GitHub
* Google+
* Instagram
* LinkedIn
* Email (mailto: links)
* Pinterest
* Pocket
* PollDaddy
* Reddit
* RSS Feed (urls with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitter
* Vimeo
* WordPress
* YouTube

== Quick Specs (all measurements in pixels) ==

1. The Custom Header Image has a maximum width and height of 80.
2. The main column width is 696.
3. A widget area width is 253.
4. The maximum width for a featured image is 984.

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Screenshot images by: Pixabay.com (http://pixabay.com/en/flower-nature-macro-yellow-green-256776/), licensed under CC0 Public Domain (http://creativecommons.org/publicdomain/zero/1.0/deed.en) and Unsplash (http://unsplash.com/), licensed under [CC0](http://creativecommons.org/choose/zero/)

== Changelog ==

= 8 June 2017 =
* Fix list styling in text widget. Bump version number.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 6 February 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 17 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 8 June 2016 =
* Add Headstart annotations;

= 21 April 2016 =
* Adding check to make sure cats variable exists before outputting to page.

= 6 November 2015 =
* Add support for missing Genericons and update to 3.4.1.

= 29 October 2015 =
* fix SVN properties.

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 11 June 2015 =
* Added JavaScript function calculating how much space there is for website title, depending on whether site logo, widget & menu toggles are present; Fixes #3018;

= 20 March 2015 =
* Fixing items pointed out in WordPress.org review: added missing textdomain, added missing escaping, added licenseand credit info for screenshot image, removed old compatibility function

= 3 March 2015 =
* Added readme.txt file
* Added languages folder and jhhew.pot file

= 19 February 2015 =
* Screenshot update
* Added styles for tag cloud widget
* Updated 404 page template, removed double nav arrows in comment navigation
* Minor color adjustments
* Minor color adjustments

= 18 February 2015 =
* Removed invalid characters from stylesheet
* Updated hover styles; Changed widgets icon; Updated font enqueue function.

= 30 January 2015 =
* Make entry header wider on desktop
* Fixed header on mobile devices with custom header present
* Mobile adjustments

= 29 January 2015 =
* Fixed textdomains, hide posts navigation when IS is active

= 22 January 2015 =
* Added wp.com specific files
* General templates cleanup

= 21 January 2015 =
* Added editor style
* Keyboard accessibility adjustments
* Use core archives title and description handling

= 20 January 2015 =
* Switched to CSS columns for top sidebar widget area
* Added support for title-tag, screenshot update

= 17 December 2014 =
* more credits updated.
* proper Theme Showcase link in footer template.
* Allow tablets to access submenu items in the site navigation.
* fix SVN properties.

= 25 September 2014 =
* Added hover color for entry title
* Added Jetpack responsvie video support

= 22 September 2014 =
* Tweaks to slide-out top panel animation

= 17 September 2014 =
* Fixed jerky animation on top widget area close

= 16 September 2014 =
* Post navigation hover styling
* Styling for WP.COM widgets: Gravatar Profile, Recent Comments, Milestone
* Smaller entry format badge on mobile

= 12 September 2014 =
* Moving JankHack-Hew from dev to pub
