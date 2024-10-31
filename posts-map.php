<?php
/*
Plugin Name: Posts-Map
Plugin URI:
Description: Adds an map with post icon located at coordinates specified on customfield "location" of post.

Version: 0.1.3
Author: Luca De Cristofano
Author URI: http://www.decristofano.it/
Change Log:
	See readme.txt for complete change log

Contributors:
	Luca De Cristofano

Copyright 2011-2012 Luca De Cristofano

License: GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt)
*/


// you can use so :
// [map name="uninoc_map_name" rows=20 cols=25 image="image.jpg" grid=1 gridcolor=#FF00FF ]This is my map[/map]

add_shortcode('posts-map', 'render_postmap');


function render_postmap($args, $content = null) {
 //$name,$rows,$cols,$image,$description

	if( is_feed() )
		return '';

    $name=$args['name'];
    $rows=$args['rows'];
    $cols=$args['cols'];
    $image=$args['image'];
    $grid=$args['grid'];
    $gridcolor=$args['gridcolor'];
    $description=$content;

    if ($gridcolor=='') $gridcolor='#000000';
    if ($grid=='') $grid='0';


    $map = array(); // gli oggetti da mettere nella mappa
    $query = new WP_Query( 'meta_key=location' ); // tutti i post che hanno un custom-field location
    while ( $query->have_posts() ) {
        $query->the_post();
        $permalink  = get_permalink();
        $l= get_post_custom_values('location');
        $l=$l[0];
        $icon= get_post_custom_values('map_icon');
        $icon = $icon[0];
        $title = get_the_title();
//        if ($icon==null) $icon=$standard_icon;
        $map[$l]= "<a href='$permalink' style='border:0px; margin:0px; text-decoration:none; padding:0px; '><img src='$icon' alt='$title' style='top'/></a>";
    }

    list($width, $height, $type, $attr) = getimagesize($image);

    $cell_width  = ceil($width/$cols)-1;
    $cell_height = ceil($height/$rows)-1;

    $text = '';

/*  non funziona
    $text="<style>
    #posts-map_{$name} tr td a img : {padding:0px; margin:0px; border:0px;}
    #posts-map_{$name} tr td a     : {padding:0px; margin:0px; border:0px;}
    #posts-map_{$name} tr td : {padding:0px!important; margin:0px!important; border:0px!important; width:{$cell_width}px!important;}
    #posts-map_{$name} tr    : {padding:0px; margin:0px; border:0px; height:{$cell_height}px!important;}
    #posts-map_{$name}       : {padding:0px; margin:0px;  }
           </style>";
*/

    $table_style = "background:url($image) no-repeat; padding:0px; margin:0px; border:0px none;";
    $cell_style = "padding:0px!important; margin:0px!important; border:{$grid}px $gridcolor solid; width:{$cell_width}px!important; height:{$cell_height}px!important;font-size:1px; text-align:left; vertical-align:top; line-height:1px; ";

    $text.="<table id='posts-map_{$name}' style='$table_style' ><tbody>"; //$attr
    for($r=0;$r<$rows;$r++) {

    $text.="<tr>";
      for($c=0;$c<$cols;$c++) {
        if (isset($map["$name@$c-$r"]))
            $v=$map["$name@$c-$r"];
        else
            $v="";
        $text.="<td style='$cell_style'>$v</td>"; //
        //$text.="<td>$v</td>";
      }
      $text.="</tr>";
    }
    $text.="</tbody></table>";

    return $text;
}


?>