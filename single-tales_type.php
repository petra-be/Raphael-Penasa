<?php get_header(); ?>
<div class="header-tales">
    <?php
    $title_tales = get_field('title_tales');
    $image_cover_tales = get_field('image_cover_tales');

    if ($image_cover_tales && is_array($image_cover_tales)) :
    ?>
        <img src="<?php echo $image_cover_tales['url']; ?>" alt="<?php echo esc_attr($image_cover_tales['alt']); ?>">
        <div class="img-tales"></div>
    <?php endif; ?>

    <div class="title-perspective">
        <h1 class="title_toy" id="title_m"><?php echo esc_html($title_tales); ?></h1>
    </div>
</div>
    <div class="container_other-page">

        
        <div class="tales_other-page">
            <div class="text_other-page">
            <?php 
                if( have_rows('paragraph_image_project_tales') ): 
                    while( have_rows('paragraph_image_project_tales') ): the_row();
                    $paragraphs_project_tales= get_sub_field('paragraphs_project_tales');
                    $image_project_tales = get_sub_field('image_project_tales');
                    $caption_project_tales = get_sub_field('caption_project_tales');
                    $image_project_tales_mobile = get_sub_field('image_project_tales_mobile');
                    

                    if( have_rows('paragraphs_project_tales') ): 
                                while( have_rows('paragraphs_project_tales') ): the_row();
                                    $paragraph_content_project_tales = get_sub_field('paragraph_content_project_tales');
                                ?>
                <p class="paragraph-white_other-page"><?php echo $paragraph_content_project_tales; ?></p>
                <?php endwhile; endif; ?>

                <?php if ( !empty(get_sub_field('image_project_tales')) ) : ?>
                <div class="card-image">
                    <div class="root">
                        <div class="card is out">
                            <div class="pics">
                                <div class="wrapper">
                                    <div class="pic pic1"><img src="<?php echo $image_project_tales['url']; ?>" alt="<?php echo $image_project_tales['url']; ?>"></div>
                                </div>
                            </div>
                        </div>
                    
                    <p class="caption-image"><?php echo $caption_project_tales;?></p></div>
                </div>
                <div class="portrait portrait-mobile">
                    <div>
                        <div class="section-parallax">
                            <img class="img-parallax" src="<?php echo $image_project_tales_mobile['url']; ?>" alt="<?php echo $image_project_tales_mobile['url']; ?>">
                        </div>
                        <p class="caption-image"><?php echo $caption_project_tales;?></p>
                    </div>
                </div>
                <?php endif; ?>


                 <?php endwhile; endif; ?>
                <div class="random_work">
                <?php   
                    $tales_page_id = pll_get_post(get_page_by_path('/tales/')->ID);
                    $tales_page_url = esc_url(get_permalink($tales_page_id)); 
                ?>
                    <div class="random_backindex"><a class=" shuffle" href="<?php echo $tales_page_url; ?>"><span>index</span></a> or</div>
                    <div class="random_dice"><a href="#" id="random-tales-project-link-single">🎲</a></div>
                </div>
            </div>
        </div>
    </div>
    <?php
// Générez une liste d'URLs des projets
$project_urls = array();
$projects = new WP_Query(array('post_type' => 'tales_type', 'posts_per_page' => -1));

while ($projects->have_posts()) {
    $projects->the_post();
    $project_urls[] = get_permalink();
}

wp_reset_postdata();
?>
<script>
// Utilisez cette liste d'URLs dans votre script JavaScript
var projectUrls = <?php echo json_encode($project_urls); ?>;
</script>
    <?php get_footer(); ?>