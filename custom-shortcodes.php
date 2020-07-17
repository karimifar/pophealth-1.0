<?php 

add_shortcode('nextColumn', 'nextColumn_function');
add_shortcode('dotiavatar', 'dotiavatar_function');
add_shortcode('dotirating', 'dotirating_function');
add_shortcode('dotifollow', 'dotifollow_function');
add_shortcode('dotibutton', 'dotibutton_function');


function nextColumn_function() {
    return 'Hi';
}

function dotiavatar_function() {
    return '<img src="http://dayoftheindie.com/wp-content/uploads/avatar-simple.png" 
   alt="doti-avatar" width="96" height="96" class="left-align" />';
}


function dotirating_function( $atts = array() ) {
    // set up default parameters
    extract(shortcode_atts(array(
     'rating' => '5'
    ), $atts));
    
    return "<img src=\"http://dayoftheindie.com/wp-content/uploads/$rating-star.png\" 
    alt=\"doti-rating\" width=\"130\" height=\"188\" class=\"left-align\" />";
}

function dotifollow_function( $atts, $content = null ) {
    return '<a href="https://twitter.com/DayOfTheIndie" target="blank" class="doti-follow">' . $content . '</a>';
}

function dotibutton_function( $atts = array(), $content = null ) {
  
    // set up default parameters
    extract(shortcode_atts(array(
     'link' => '#'
    ), $atts));
    
    return '<a href="'. $link .'" target="blank" class="doti-button">' . $content . '</a>';
}

?>