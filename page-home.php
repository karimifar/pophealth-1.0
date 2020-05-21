<?php
/**
 * Template Name: Home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();


 get_footer();

?>


wp_enqueue_style( 'works-style', get_template_directory_uri() . "/css/works/works.css", array('emk_styles') );
// wp_enqueue_script( 'home-scripts', get_template_directory_uri() . "/js/home/home.js", array('jquery'), null, true );
