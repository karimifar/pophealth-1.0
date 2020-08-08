<?php
/**
 * Template Post Type: news
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pophealth-1.0
 */
get_header();
wp_enqueue_style( 'post-style', get_template_directory_uri() . "/css/post/post.css", array('pophealth_styles') );
wp_enqueue_style( 'post-style-re', get_template_directory_uri() . "/css/post/post-re.css", array('post-style') );
wp_enqueue_style( 'news-style', get_template_directory_uri() . "/css/news/news.css", array('post-style-re') );
wp_enqueue_style( 'news-style-re', get_template_directory_uri() . "/css/news/news-re.css", array('news-style') );


?>
    <?php 
        the_post();
        $hasHero = get_field('has_hero');
        $title = get_the_title();

        if($hasHero){
            $hero_url = get_field('hero_image')['url'];
            echo '<div class="post-hero">';
                echo '<img src='.$hero_url.' alt="">';
                echo '<div class="hero-overlay"></div>';
            echo '</div>';
            echo '<div class="post-content hero-post" id="news-content">';
        }else{
            echo '<div class="post-content" id="news-content">';
        }
            
            echo '<div class="post-title news-title">';
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
                echo '<h1>'.$title.'</h1>';
            echo '</div>';
            
            echo '<div class="post-body">';
                the_content();
            echo '</div>' ;
        echo '</div><!-- #news-row -->';
        
        
    ?>
</div> <!-- #content -->


<?php
    get_footer();
?>