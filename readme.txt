=== Posts map ===
Contributors: Luca De Cristofano
Donate link: 
Tags: postsmap, page, pages, shortcode, short code, map, post location
Requires at least: 2.7.0
Tested up to: 3.1.2
Stable tag: 0.1.3

This plugin adds into a blog post an image where you can put icons that link other blog posts.


== Description ==
The plugins uses a short tag *posts-map* to add the grilled image, and you can add all the blog post icons using its rows and columns. 
The icons can be personalized with custom field map_icon.


Usage :
	`[posts-map image='image_url' rows=10 cols=15 name='map_name' grid=1 gridcolor=#FF00FF ]Map Title[/posts-map]`

where :
1. image : url to image fo map
2. rows : number of rows to slice the image
3. cols : number of columns to slice the image
4. name : name of maps (used to add more maps in your blog)
5. grid : width (in pixel) of map grid (no grid if don't use a option)
6. gridcolor : color for grid 
7. Map Title : title writed on top of map


To put an icon into a map named 'map_name', insert two customfields 'location' and 'map_icon' to set the coordinates and the permalink of the icon.

 

== Frequently Asked Questions ==
no question, today

*WARNING* : in some browser cell-width is rendered in 16px multiplier, independent of image size. I suggest use image width 16px multiple

[send me](http://www.decristofano.it/contactform.php "Contact form") your question.
 
== Installation ==
1. Copy the entire directory from the downloaded zip file into the /wp-content/plugins/ folder.
2. Activate the "Posts map" plugin in the Plugin Management page.
3. Add the shortcode [posts-map ] to the page(s) of your choice.

== Upgrade Notice ==
No other notice 
		
== Screenshots ==

1. create a post with a map smart-code
2. create some post "localized" with a custom field
3. view a map in post created

== Changelog ==

= 0.1.3 =
* rewrite file readme
* insert grid option 

= 0.1.2 =
* Detail description
* Resolved some cell size problem
* Use style in tag (some template override class-defined style)

= 0.1.1 =
* first release

