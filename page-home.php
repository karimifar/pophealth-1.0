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
 wp_enqueue_style( 'home-style', get_template_directory_uri() . "/css/home/home.css", array('pophealth_styles') );
 wp_enqueue_style( 'home-style-re', get_template_directory_uri() . "/css/home/home-re.css", array('home-style') );

?>

<?php
$post_id = get_the_ID();
$bannerImg_url = get_the_post_thumbnail_url($post_id);
// echo $bannerImg_url;

?>

    
    <div class="banner" role="banner">
        <div class="banner-img-wrap" style="background-image: url(<?php echo $bannerImg_url ?>;)">
            <!-- <img src="./assets/img/home.jpeg" alt=""> -->
        </div>
        <div class="banner-overlay">
        </div>
        <div id="intro-row" class="home-row d-flex flex-column justify-content-end">
            <div class="row">
                <?php 
                    $title = get_field("site_title");
                    $tagline = get_field("tagline");
                    $callout_h = get_field("callout_box_header");
                    $callout_url = get_field("callout_link");
                    $callout_body = get_field("callout_body");
                ?>
                <div class="col-md-7 align-self-end">
                    <?php
                        echo '<h1>'.$title.'</h1>';
                        echo '<h2>'.$tagline.'</h2>';
                    ?>
                </div>
                <div class="col-md-5 align-self-end">
                    <div class="cpan-box">
                        <?php 
                            echo '<h3>';
                            if($callout_url){
                                echo '<a href='.$callout_url. '>' . $callout_h.'</a>';
                            }else{
                                echo $callout_h;
                            }
                            echo '</h3>';
                            if($callout_body){
                                echo '<p>'.$callout_body.'</p>';
                            }
                        ?>
                    </div>
                    <!-- <p class="desc">
                        The Texas Child Mental Health Care Consortium (TCMHCC) is dedicated to enhancing the state’s ability to address the mental health care needs of its children and adolescents through collaboration with health-related institutions of higher education.
                    </p> -->
                    
                </div>
            </div>
            
        </div>
        <div id="initiatives-row" class="home-row d-flex justify-content-center">
            <?php 
                $query = new WP_Query(array(
                    'post_type' => 'initiatives',
                    'post_status' => 'publish'
                ));
                while ($query->have_posts()) {
                    $query->the_post();
                    $init_id = get_the_ID();
                    $initiative_title = get_the_title($init_id);
                    $initiative_blurb = get_field('initiative_blurb', $init_id);
                    $post_url = get_post_permalink($init_id);

                    echo '<a class="proj-wrap" href='.$post_url.'>';
                        echo  '<div>';
                            echo '<div class="proj-title d-flex flex-column justify-content-center">';
                                echo '<h3>'.$initiative_title.'</h3>';
                            echo '</div>';
                            echo '<p>'.$initiative_blurb.'</p>';
                        echo  '</div>';
                    echo '</a>';
                    
                }
                wp_reset_query();

            ?>
        </div>

        <div id="events-row" class="home-row">
            
            <h2><a href="./meetings">Upcoming Meetings</a></h2>
            <div class="d-flex all-events">
                <?php 
                    $query = new WP_Query(array(
                        'post_type' => 'events',
                        'post_status' => 'publish'
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $event_id = get_the_ID();
                        $event_title = get_the_title($event_id);
                        $event_date= get_field('event_date', $event_id);
                        $todayDate= date("Y-m-d");

                        if ($event_date>=$todayDate){
                            $month = date("M", strtotime($event_date));
                            $year = date("Y", strtotime($event_date));
                            $day = date("d", strtotime($event_date));
                            // $dateArr = explode(',', $fullDate);
                            $event_start= get_field('start_time', $event_id);
                            $event_end= get_field('end_time', $event_id);
                            $event_url = get_post_permalink($event_id);
                            $webcast_link = get_field('webcast_link', $event_id);
                            $event_location = get_field('event_location', $event_id);

                            
                                echo '<div class="event-pad"><div class="event-wrap">';
                                    echo '<div class="date">';
                                        echo '<p class="day">'.$day.'</p>';
                                        echo '<p class="month">'.$month.'</p>';
                                        echo '<p class="year">'.$year.'</p>';
                                    echo '</div>';
                                    echo '<div class="event-info">';
                                        echo '<p class="title">'. $event_title.'</p>';
                                        echo '<p class="time"><k class="far fa-clock"></k>'.$event_start. '–' . $event_end.'</p>';
                                        echo '<p class="location"><k class="fas fa-map-marker-alt"></k>'. $event_location.'</p>';

                                        if($webcast_link){
                                            echo '<p class="webcast"><a target="_blank" href='.$webcast_link.'> <k class="far fa-play-circle"></k> Webcast</a></p>';
                                        }
                                        
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                        }

                        
                        
                    }
                    wp_reset_query();

                ?> 
        </div><!-- .all-events -->
    </div><!-- #events-row -->

    <div id="news-row" class="home-row">
        <h2><a href="./news">Latest News</a></h2>
        <div class="all-news">
        <?php 
            $query = new WP_Query(array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => '4',
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

                echo '<div class="news-wrap">';
                    if($internal){
                        echo '<a href='.$news_url.'>';
                    }else{
                        $external_url = get_field('external_link', $news_id);
                        $source = get_field('post_source', $news_id);
                        $rel_date = get_field('release_date', $news_id);
                        echo '<a target="_blank" href='.$external_url.'>';
                    }
                    echo '<div class="thumbnail"><img src='.$thumbnail.' alt=""></div>';
                    if($internal){
                        echo '<p class="news-date">'.$pub_date.'</p>';
                    }else{
                        echo '<p class="news-date">'.$rel_date.' <span class="justby">from  </span> <span class="source"> '.$source. '</p>';
                    }
                    
                    echo '<h3 class="news-title">'.$news_title.'</h3>';
                echo '</a></div>';
            }
            wp_reset_query();
        ?>
        </div><!-- .all-news -->
        <a class="btn" href="./news">
            <button>
                See More News
            </button>
        </a>
    </div><!-- #news-row -->

    <div id="second-banner">
        <div class="background">
            <img src=<?php echo get_template_directory_uri(). "/img/bg.png"?> alt="">
        </div>
        <p>
        TCMHCC is dedicated to enhancing the state’s ability to address the mental health care needs of its children and adolescents through collaboration with health-related institutions of higher education.
        </p>
    </div>

</div> <!-- #content-->

<?php
 get_footer();

?>




