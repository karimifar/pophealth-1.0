<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pophealth_1.0
 */

get_header();
wp_enqueue_style( 'page-style', get_template_directory_uri() . "/css/page/page.css", array('pophealth_styles') );
wp_enqueue_style( 'page-re', get_template_directory_uri() . "/css/page/page-re.css", array('page-style') );

wp_enqueue_style( 'news-style', get_template_directory_uri() . "/css/news-page/news.css", array('page-re') );
wp_enqueue_style( 'news-re', get_template_directory_uri() . "/css/news-page/news-re.css", array('news-style') );

?>
<div class="page-content single-column" >
    <h1 class="page-title">
        News
        <hr>
    </h1>
    <div class="all-news">
<?php

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();   
        $news_id = get_the_ID();
        $pub_date = get_the_date('F j, Y',$news_id);
        $thumbnail = get_the_post_thumbnail_url($news_id);
        $news_title = get_the_title($news_id);
        $internal = get_field('internal_news', $news_id);
        $news_url = get_post_permalink($news_id);
        $blurb = get_field('blurb_text', $news_id);

        if($internal){
            $atag= '<a class="news-link d-flex" href='.$news_url.'>';
        }else{
            $external_url = get_field('external_link', $news_id);
            $source = get_field('post_source', $news_id);
            $rel_date = get_field('release_date', $news_id);
            $atag= '<a class="news-link d-flex"  target="_blank" href='.$external_url.'>';
        }
        
        echo '<div class="news-wrap d-flex">';
            echo $atag;
            echo '<div class="thumbnail"><img src='.$thumbnail.' alt=""></div>';
            echo '<div class="news-info">';
                if($internal){
                    echo '<p class="news-date">'.$pub_date.'</p>';
                }else{
                    echo '<p class="news-date">'.$rel_date.' <span class="justby">from  </span> <span class="source"> '.$source. '</p>';
                }
                
                echo '<h3 class="news-title">'.$news_title.'</h3>';
                echo '<p class="news-blurb">'.$blurb.'</p>';
                // echo '<p class="read-more">'.$atag.'Read More</p></a>';
            echo '</div></a>';
        echo '</div>';
        echo '<hr>';
endwhile; 
endif;
echo '<div class="pagination">';
echo paginate_links();
echo '</div>';
?>


</div><!-- .all-news -->
</div>

<?php
get_footer();
?>