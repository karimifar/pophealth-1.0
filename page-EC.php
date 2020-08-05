<?php
/**
 * Template Name: Executive Committee
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package popHealth   
 */

 get_header();
 wp_enqueue_style( 'page-style', get_template_directory_uri() . "/css/page/page.css", array('pophealth_styles') );
 wp_enqueue_style( 'page-re', get_template_directory_uri() . "/css/page/page-re.css", array('page-style') );
 wp_enqueue_style( 'ec-style', get_template_directory_uri() . "/css/ec/ec.css", array('page-re') );
 wp_enqueue_style( 'ec-re', get_template_directory_uri() . "/css/ec/ec-re.css", array('ec-style') );

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
    <div class="committee" id="allEC">
        <div class="name-toggle" id="table-header">
            <p class="name">Name</p>
            <p class="title">Title</p>
            <p class="institution">Institution</p>
        </div>

        <?php

        if( have_rows('ec_members') ):
                $i = 1;
            while( have_rows('ec_members') ) : the_row();

                $name= get_sub_field('name');
                $cred= get_sub_field('credentials');
                $title= get_sub_field('title');
                $institution= get_sub_field('institution');

                if(get_sub_field('headshot')){
                    $headshot_url= get_sub_field('headshot')['url'];
                    $headshot_alt= get_sub_field('headshot')['alt'];
                }else{
                    $headshot_url= null;
                    $headshot_alt= null;
                }
                $bio= get_sub_field('bio');

                echo '<div class="ecm-card">';
                    echo '<a data-toggle="collapse" class="toggle-wrap collapsed" href="#ecm'.$i.'" aria-controls="ecm'. $i.' aria-expanded="false"">';
                        echo '<div class="name-toggle">';
                            echo '<h2 class="name">'.$name.'<span>, '.$cred.'</h2>';
                            echo '<p class="title">'.$title.'</p>';
                            echo '<p class="institution">'.$institution.'</p>';
                        echo '</div>';
                    echo '</a>';
                    echo '<div class="collapse-content collapse" id="ecm'.$i.'" data-parent="#allEC">';
                        echo '<div class="headshot">';
                            echo '<div class="headshot-wrap">';
                                echo '<img src='.$headshot_url;
                                if($headshot_alt){
                                    echo ' alt="'.$headshot_alt.'">';
                                }else{
                                    echo ' alt="Portrait">';
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<p class="bio">'.$bio.'</p>';
                    echo '</div>';

                echo '</div>';
                $i++;
            endwhile;
        endif;
        ?>
        

    </div>
</div> <!-- .page-content-->

</div> <!-- #content-->

<?php
 get_footer();

?>