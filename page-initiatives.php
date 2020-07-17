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
 wp_enqueue_style( 'page-style', get_template_directory_uri() . "/css/page/page.css", array('pophealth_styles') );
 wp_enqueue_style( 'page-re', get_template_directory_uri() . "/css/page/page-re.css", array('page-style') );
 wp_enqueue_style( 'initiatives-style', get_template_directory_uri() . "/css/initiatives/initiatives.css", array('page-re') );
 wp_enqueue_style( 'initiatives-re', get_template_directory_uri() . "/css/initiatives/initiatives-re.css", array('initiatives-style') );

 wp_enqueue_script( 'inititives-js', get_template_directory_uri() . "/js/initiatives.js", array('jquery'), null, true  );


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
    echo '<div class="page-content with-hero two-column" >';
}else{
    echo '<div class="page-content two-column" >';
}
?>

    <h1 class="page-title">
        <?php echo $page_title ?>
        <hr>
    </h1>
    <div class="row">
        <div class="col-md-4 intro-text">
            <?php
                the_content(); 
            ?>
        </div>
        <div class="col-md-8 accordion">
            <?php 
                $query = new WP_Query(array(
                    'post_type' => 'initiatives',
                    'post_status' => 'publish'
                ));
                while ($query->have_posts()) {
                    $query->the_post();
                    $init_id = get_the_ID();
                    $initiative_title = get_the_title($init_id);
                    $init_thumb = get_the_post_thumbnail_url($init_id);
                    $initiative_blurb = get_field('initiative_blurb', $init_id);
                    $post_url = get_post_permalink($init_id);

                    echo '<div class="proj-wrap">';
                        echo '<div class="proj-thumb align-self-center">';
                            echo '<img src='.$init_thumb. ' alt="">';
                            echo '<div class="thumb-overlay"></div>';
                        echo '</div>';
                        echo  '<div class="proj-info align-self-center">';
                            // echo '<div class="proj-title d-flex flex-column justify-content-center" data-toggle="collapse" data-target="#i'.$init_id.'" aria-controls=i'.$init_id.'>';
                            echo '<div class="proj-title d-flex flex-column justify-content-center">';
                                echo '<h3><k class="fas fa-caret-right"></k> '.$initiative_title.'</h3>';
                            echo '</div>';
                            echo '<div class="panel">';
                                echo '<p class="proj-blurb">'.$initiative_blurb.'</p>';
                                echo '<p class="more"><a href='.$post_url.'>Learn More</a></p>';
                            echo '</div>';
                        echo  '</div>';
                    echo '</div>';
                    
                }
                wp_reset_query();

            ?>

        </div>

    </div>
</div>

</div> <!-- #content-->

<?php
 get_footer();

?>