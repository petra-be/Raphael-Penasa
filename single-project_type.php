<?php 

get_header(); ?>

<div class="container_other-page project" data-id="<?php echo get_the_ID(); ?>">
        <div class="other-page">
        
            <div class="title-perspective">
                <?php 
                    $current_language = pll_current_language();
                    $title_work = get_field('title_work');
                    $title_class = 'title_toy';
                    if ($current_language === 's') {
                        $title_class .= ' title-small';
                    } elseif ($current_language === 'm') {
                        $title_class .= ' title-medium';
                    } elseif ($current_language === 'l') {
                        $title_class .= ' title-large';
                    }
                    echo '<h1 class="' . esc_attr($title_class) . '" id="title_' . esc_attr($current_language) . '">' . esc_html($title_work) . '</h1>';
                ?>
            </div>

            <ul class="subtitle_s">
    <?php if (have_rows('subtitles_work')) : 
        $count = 1;
        while (have_rows('subtitles_work')) : the_row();
            $subtitle_work = get_sub_field('subtitle_work');
            
            if (!empty($subtitle_work)) {
                echo '<li class="xxx">' . $subtitle_work . '</li>';
            }
            
        endwhile;
    endif;
    ?>
</ul>
            <div class="text_other-page">

            <?php 
                if( have_rows('paragraph_image_work') ): 
                    while( have_rows('paragraph_image_work') ): the_row();
                    $paragraphs_work= get_sub_field('paragraphs_work');
                    $image_work = get_sub_field('image_work');
                    $image_work_mobile = get_sub_field('image_work_mobile');
                    $caption_work = get_sub_field('caption_work_mobile');
                   
                    

                    if( have_rows('paragraphs_work') ): 
                                while( have_rows('paragraphs_work') ): the_row();
                                $paragraph_content_work = get_sub_field('paragraph_content_work');
                                $texte_formate = wpautop($paragraph_content_work);
                                $texte_formate = str_replace('<p>', '<p class="paragraph_other-page">', $texte_formate);
                                echo $texte_formate;
                                ?>
                
               <?php endwhile; endif; ?>

               <?php if ( !empty(get_sub_field('image_work')) ) : ?>
                <div class="card-image">
                    <div class="root">
                        <div class="card is out">
                            <div class="pics">
                                <div class="wrapper">
                                    <div class="pic pic1"><img src="<?php echo $image_work['url']; ?>" alt="<?php echo $image_work['url']; ?>"></div>
                                </div>
                            </div>
                        </div>
                    
                    <p class="caption-image"><?php echo $caption_work;?></p></div>
                </div>
                <div class="portrait portrait-mobile">
                    <div>
                        <div class="section-parallax">
                            <img class="img-parallax" src="<?php echo $image_work_mobile['url']; ?>" alt="<?php echo $image_work_mobile['url']; ?>">
                        </div>
                        <p class="caption-image"><?php echo $caption_work;?></p>
                    </div>
                </div>
                <?php endif; ?>


                 <?php endwhile; endif; ?>
                <div class="random_work">
                <?php   
                    $works_page_id = pll_get_post(get_page_by_path('/works/')->ID);
                    $works_page_url = esc_url(get_permalink($works_page_id)); 
                ?>
                    <div class="random_backindex"><a class=" shuffle" href="<?php echo $works_page_url; ?>"><span>index</span></a> or</div>
                    <div class="random_dice"><a href="#" id="random-project-link-single">🎲</a></div>
                </div>
               
            </div>
        </div>
    </div>
    <?php

$project_urls = array();
$projects = new WP_Query(array('post_type' => 'project_type', 'posts_per_page' => -1));

while ($projects->have_posts()) {
    $projects->the_post();
    $project_urls[] = get_permalink();
}

wp_reset_postdata();
?>
<script>
var projectUrls = <?php echo json_encode($project_urls); ?>;
</script>
<?php get_footer(); ?>