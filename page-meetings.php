<?php
/**
 * Template Name: Meetings page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();
 wp_enqueue_style( 'meetings-style', get_template_directory_uri() . "/css/meetings/meetings.css", array('pophealth_styles') );
 wp_enqueue_style( 'meetings-re', get_template_directory_uri() . "/css/meetings/meetings-re.css", array('meetings-style') );

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
    <div class="meetings-content row">
        <div class="col-md-5">
            <?php
                the_content(); 
            ?>
        </div>
        <div class="col-md-7 all-meetings">
            <div class="upcoming">
                <h2>Upcoming Meetings</h2>
                <hr>
                <div class="upcoming-meetings d-flex">
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'events',
                        'post_status' => 'publish'
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $event_id = get_the_ID();
                        $event_date= get_field('event_date', $event_id);
                        $todayDate= date("Y-m-d");

                        if ($event_date>=$todayDate): 
                            $event_title = get_the_title($event_id);
                            $event_title = get_the_title($event_id);
                            $month = date("M", strtotime($event_date));
                            $year = date("Y", strtotime($event_date));
                            $day = date("d", strtotime($event_date));
                            // $dateArr = explode(',', $fullDate);
                            $event_start= get_field('start_time', $event_id);
                            $event_end= get_field('end_time', $event_id);
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
                                        echo '<p class="webcast linked"><a target="_blank" href='.$webcast_link.'> <k class="far fa-play-circle"></k>Webcast</a></p>';
                                    }
                                    
                                echo '</div>';
                            echo '</div></div>';
                        endif;
                    }
                    wp_reset_query();
                    

                    ?>
                </div><!-- .upcoming-meetings -->
            </div><!-- .upcoming -->


            <div class="past">
                <h2>Past Meetings</h2>
                <hr>
                <div class="past-meetings d-flex">
                <?php
                    $query = new WP_Query(array(
                        'post_type' => 'events',
                        'post_status' => 'publish'
                    ));
                    while ($query->have_posts()) {
                        $query->the_post();
                        $event_id = get_the_ID();
                        $event_date= get_field('event_date', $event_id);
                        $todayDate= date("Y-m-d");

                        if ($event_date<=$todayDate): 
                            $event_title = get_the_title($event_id);
                            $month = date("M", strtotime($event_date));
                            $year = date("Y", strtotime($event_date));
                            $day = date("d", strtotime($event_date));
                            $fullDate = date("M d, Y", strtotime($event_date));
                            // $dateArr = explode(',', $fullDate);
                            $event_start= get_field('start_time', $event_id);
                            $event_end= get_field('end_time', $event_id);
                            $webcast_link = get_field('webcast_link', $event_id);
                            $event_location = get_field('event_location', $event_id);

                            
                            echo '<div class="past-event">';
                                echo '<p class="event-title">'.$event_title.'<span> | '.$fullDate.'</span></p>';
                                echo '<div class="event-info">';
                                if($webcast_link){
                                    echo '<p class="webcast linked"><a target="_blank" href='.$webcast_link.'> <k class="far fa-play-circle"></k>Webcast</a></p>';
                                }
                                if( have_rows('attachments') ):
                                    while( have_rows('attachments') ) : the_row();
                                
                                        $file_title= get_sub_field('attachment')['title'];
                                        $file_url = get_sub_field('attachment')['url'];
                                        echo '<p class="attachment linked">';
                                        echo '<a target="_blank" href='.$file_url.'><k class="far fa-file-alt"></k>'.$file_title.'</a>';
                                        echo '</p>';

                                    endwhile;
                                endif;
                                echo '</div>';
                            echo '</div>';
                        endif;
                    }
                    wp_reset_query();
                ?>
                </div><!-- .past-meetings -->
            </div><!-- .past -->
            
        </div><!-- .all-meetings -->
    </div>
</div>

</div> <!-- #content-->

<?php
 get_footer();

?>