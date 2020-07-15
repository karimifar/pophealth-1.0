<?php
/**
 * Template Name: Initiatives page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();
 wp_enqueue_style( 'initiatives-style', get_template_directory_uri() . "/css/initiatives/initiatives.css", array('pophealth_styles') );
 wp_enqueue_style( 'initiatives-re', get_template_directory_uri() . "/css/initiatives/initiatives-re.css", array('initiatives-style') );

?>

<?php
$post_id = get_the_ID();
the_post();

$bannerImg_url = get_the_post_thumbnail_url($post_id);
$page_title = get_the_title();
?>

<div class="page-content" >
    <h1 class="page-title">
        <?php echo $page_title ?>
    </h1>
    
</div>

</div> <!-- #content-->

<?php
 get_footer();

?>