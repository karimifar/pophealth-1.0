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


?>
    <div class="post-wrap">
    <?php 
        $hasHero = get_field('has_hero');
        if($hasHero){
            $hero_url = get_field('hero_image')['url'];
            echo '<div class="post-hero">';
                echo '<img src="'.$hero_url .' " alt="">';
            echo '</div>';
        }else{
            echo 'no hero';
        }
        $isInternal = get_field('internal_news');
        echo $isInternal;
        if ($isInternal){
            echo 'internal news';
        }else{
            echo 'external news';
        }
        the_post();
        the_title('<h1 class="entry-title">', '</h1>' );
        the_content();
        
    ?>
    </div><!-- .post-wrap -->
</div> <!-- #content -->


<?php
    get_footer();
?>