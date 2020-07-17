<?php
/**
 * Template Name: Single column page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();
 wp_enqueue_style( 'page-style', get_template_directory_uri() . "/css/page/page.css", array('pophealth_styles') );
 wp_enqueue_style( 'page-re', get_template_directory_uri() . "/css/page/page-re.css", array('page-style') );

//  wp_enqueue_script( 'inititives-js', get_template_directory_uri() . "/js/initiatives.js", array('jquery'), null, true  );


?>

<?php
$post_id = get_the_ID();
the_post();

$bannerImg_url = get_the_post_thumbnail_url($post_id);
$page_title = get_the_title();

if($bannerImg_url){
    echo '<div class="page-hero">';
        echo '<img src='.$bannerImg_url.' alt="">';
        echo '<div class="hero-overlay"></div>';
    echo '</div>';
    echo '<div class="page-content with-hero single-column" >';
}else{
    echo '<div class="page-content single-column" >';
}
?>

    <h1 class="page-title">
        <?php echo $page_title ?>
        <hr>
    </h1>
    <div class="">
        <?php
            the_content();
        ?>

    </div>
</div> <!-- .page-content-->

</div> <!-- #content-->

<?php
 get_footer();

?>