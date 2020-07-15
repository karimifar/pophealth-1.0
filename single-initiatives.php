<?php
/**
 * Template Post Type: initiatives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pophealth-1.0
 */
get_header();
wp_enqueue_style( 'post-style', get_template_directory_uri() . "/css/post/post.css", array('pophealth_styles') );
wp_enqueue_style( 'post-style-re', get_template_directory_uri() . "/css/post/post-re.css", array('post-style') );

wp_enqueue_style( 'init-style', get_template_directory_uri() . "/css/initiative/initiative.css", array('post-style-re') );
wp_enqueue_style( 'init-style-re', get_template_directory_uri() . "/css/initiative/initiative-re.css", array('init-style') );


?>
    <?php 
        the_post();
        $title = get_the_title();
        $banner= get_the_post_thumbnail_url();
        
        
    ?>
    <?php
    if($banner){
        echo '<div class="post-hero">';
            echo '<img src='.$banner.' alt="">';
            echo '<div class="hero-overlay"></div>';
        echo '</div>';
        echo '<div class="post-content hero-post">';
    }else{
        echo '<div class="post-content">';
    }
        
            echo '<div class="post-title init-title">';
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
                echo '<h1>'.$title.'</h1>';
            echo '</div>';
            
            echo '<div class="post-body">';
                the_content();
            echo '</div>' ;
        echo '</div>';
    ?>
</div>


<?php
    get_footer();
?>