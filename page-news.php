<?php
/**
 * Template Name: News Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();
 wp_enqueue_style( 'page-style', get_template_directory_uri() . "/css/page/page.css", array('pophealth_styles') );
 wp_enqueue_style( 'page-re', get_template_directory_uri() . "/css/page/page-re.css", array('page-style') );

 wp_enqueue_style( 'news-style', get_template_directory_uri() . "/css/news-page/news.css", array('page-re') );
 wp_enqueue_style( 'news-re', get_template_directory_uri() . "/css/news-page/news-re.css", array('news-style') );

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
    <div class="all-news">
        <?php
            $query = new WP_Query(array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => '10',
            ));
            while ($query->have_posts()) {
                $query->the_post();
                $news_id = get_the_ID();
                $pub_date = get_the_date('F j, Y',$news_id);
                $thumbnail = get_the_post_thumbnail_url($news_id);
                $news_title = get_the_title($news_id);
                $internal = get_field('internal_news', $news_id);
                $news_url = get_post_permalink($news_id);
                $blurb = get_field('blurb_text', $news_id);

                
                if($internal){
                    $atag= '<a class="news-link" href='.$news_url.'>';
                }else{
                    $external_url = get_field('external_link', $news_id);
                    $source = get_field('post_source', $news_id);
                    $rel_date = get_field('release_date', $news_id);
                    $atag= '<a class="news-link" target="_blank" href='.$external_url.'>';
                }
                
                echo '<div class="news-wrap d-flex">';
                    echo '<div class="thumbnail"><img src='.$thumbnail.' alt=""></div>';
                    echo '<div class="news-info">';
                    
                    if($internal){
                        echo '<p class="news-date">'.$pub_date.'</p>';
                    }else{
                        echo '<p class="news-date">'.$rel_date.' <span class="justby">from  </span> <span class="source"> '.$source. '</p>';
                    }
                    echo $atag;
                    echo '<h3 class="news-title">'.$news_title.'</h3></a>';
                    echo '<p class="news-blurb">'.$blurb.'</p>';
                    echo '<p class="read-more">'.$atag.'Read More</p></a>';
                    echo '</div>';
                echo '</div>';
                echo '<hr>';
            }
            wp_reset_query();

        ?>

    </div><!-- .all-news-->
</div> <!-- .page-content-->

</div> <!-- #content-->

<?php
 get_footer();

?>