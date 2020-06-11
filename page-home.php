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

    <div id="covid-bar">
        <a href="./resources/"><i class="fas fa-exclamation-triangle"></i> Texas COVID-19 Mental Health Support Line (833) 986-1919 | Mental Health Resources for Families</a>
    </div>
    <div class="banner" role="banner">
        <div class="banner-img-wrap" style="background-image: url(<?php echo $bannerImg_url ?>;)">
            <!-- <img src="./assets/img/home.jpeg" alt=""> -->
        </div>
        <div class="banner-overlay">
        </div>
        <div id="intro-row" class="home-row d-flex flex-column justify-content-end">
            <div class="row">
                <div class="col-md-7 align-self-end">
                    <h1>Texas Child Mental Health Care Consortium (TCMHCC)</h1>
                    <h2>All Texas children and adolescents will have the best mental health outcomes possible.</h2>
                </div>
                <div class="col-md-5 align-self-end">
                    <div class="cpan-box">
                        <h3> <a href="tel:888-901-2726">(888) 901-CPAN</a> <span>(2726)</span></h3>
                        <p>Primary care providers can access the Child Psychiatry Access Network (CPAN) for assistance with behavioral health care for their child and adolescent patients.</p>
                    </div>
                    <p class="desc">
                        The Texas Child Mental Health Care Consortium (TCMHCC) is dedicated to enhancing the state’s ability to address the mental health care needs of its children and adolescents through collaboration with health-related institutions of higher education.
                    </p>
                    
                </div>
            </div>
            
        </div>
        <div id="projects-row" class="home-row d-flex justify-content-center">
            <a class="proj-wrap" href="./initiatives/index.html">
                <div >
                    <div class="proj-title d-flex flex-column justify-content-center">
                        <h3>Pediatrician and PCP Support</h3>
                    </div>
                    <p>The Child Psychiatry Access Network (CPAN) is a network of child psychiatry access centers that provides support to pediatricians and primary care providers in caring for children and youth with behavioral health needs.</p>
                </div>
            </a>
            <a class="proj-wrap" href="./initiatives/index.html">
                <div>
                    <div class="proj-title d-flex flex-column justify-content-center">
                        <h3>School-Based Support</h3>
                    </div>
                    <p>Texas Child Health Access Through Telemedicine (TCHATT) is a network of telemedicine or telehealth programs that provide in-school behavioral health care to at-risk children and adolescents.</p>
                </div>
            </a>

            <a  class="proj-wrap" href="./initiatives/index.html">
                <div>
                    <div class="proj-title d-flex flex-column justify-content-center">
                        <h3>Workforce Development</h3>
                    </div>
                    <p>The Consortium is funding new 1) child and psychiatry fellowship positions at institutions of higher education, and 2) full-time psychiatrists and residents at community mental health centers.</p>
                </div>
            </a>

            <a class="proj-wrap" href="./initiatives/index.html">
                <div >
                    <div class="proj-title d-flex flex-column justify-content-center">
                        <h3>Research</h3>
                    </div>
                    <p>
                        The Consortium will fund multi-institutional research projects in areas that have potential for advancing mental health care for children and adolescents in Texas.
                    </p>
                </div>
            </a>
        </div>

        <div id="events-row" class="home-row">
            <h2><a href="./meetings">Upcoming Meetings</a></h2>
            <div class="d-flex all-events">

                <!-- <div class="event-pad">
                    <a target="_blank" href="https://utsystem.zoom.us/j/209389980?pwd=eHJtNnpQSVd6bVFqV0NwRkVkZE5QZz09">
                        <div class="event-wrap">
                            <div class="date">
                                <p class="day">20</p>
                                <p class="month">APR</p>
                                <p class="year">2020</p>
                            </div>
                            <div class="event-info">
                                <p class="title">Open Meeting</p>
                                <p class="time"><k class="far fa-clock"></k>10am – 3pm</p>
                                <p class="location"><k class="fas fa-map-marker-alt"></k>UT System Administration Building</p>
                                <p class="webcast"><k class="fas fa-tv"></k> Webcast</p>
                            </div>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="event-pad">
                    
                        <div class="event-wrap">
                            <div class="date">
                                <p class="day">15</p>
                                <p class="month">may</p>
                                <p class="year">2020</p>
                            </div>
                            <div class="event-info">
                                <p class="title">Open Meeting</p>
                                <p class="time"><k class="far fa-clock"></k>10am – 3pm</p>
                                <p class="location"><k class="fas fa-map-marker-alt"></k>Virtual</p>
                                <a target="_blank" href="./assets/files/meetings/05-15-20/05-15-2020_agenda.pdf">
                                    <p class="agenda webcast"><k class="far fa-sticky-note"></k> Agenda</p>
                                </a>
                                <a target="_blank" href="https://www.youtube.com/channel/UCSQqIc7NFQEGlSPQs6Ar7IA">
                                    <p class="webcast"><k class="fas fa-tv"></k> Webcast</p>
                                </a>
                                
                            </div>
                        </div>
                </div> -->

                <div class="event-pad">
                    <div class="event-wrap">
                        <div class="date">
                            <p class="day">23</p>
                            <p class="month">jun</p>
                            <p class="year">2020</p>
                        </div>
                        <div class="event-info">
                            <p class="title">Open Meeting</p>
                            <p class="time"><k class="far fa-clock"></k>10am – 3pm</p>
                            <p class="location"><k class="fas fa-map-marker-alt"></k>Virtual</p>

                            <a target="_blank" href="https://www.youtube.com/channel/UCSQqIc7NFQEGlSPQs6Ar7IA">
                                <p class="webcast"><k class="fas fa-tv"></k> Webcast</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- #content-->

<?php
 get_footer();

?>




