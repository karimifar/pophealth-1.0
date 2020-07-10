<?php
/**
 * Template Post Type: initiatives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pophealth-1.0
 */
get_header();
wp_enqueue_style( 'project-style', get_template_directory_uri() . "/css/project/project.css", array('pophealth_styles') );
wp_enqueue_style( 'project-style-re', get_template_directory_uri() . "/css/home/project-re.css", array('project-style') );


?>
<?php the_title() ?>

</div>


<?php
    get_footer();
?>