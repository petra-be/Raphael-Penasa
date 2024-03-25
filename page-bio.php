<?php 

/*
Template Name: Bio Template
*/
get_header(); ?>

<div class="container_other-page">
        <div class="other-page">
            <div class="title-perspective">
                
            <?php 
                    $current_language = pll_current_language();
                    $title_bio = get_field('title_bio');
                    $title_class = 'title_toy';
                    if ($current_language === 's') {
                        $title_class .= ' title-small';
                    } elseif ($current_language === 'm') {
                        $title_class .= ' title-medium';
                    } elseif ($current_language === 'l') {
                        $title_class .= ' title-large';
                    }
                    echo '<h1 class="' . esc_attr($title_class) . '" id="title_' . esc_attr($current_language) . '">' . esc_html($title_bio) . '</h1>';
                ?>
            
        </div>
            <ul class="subtitle_s">
                <?php if (have_rows('subtitles_bio')) : 
                $count = 1;
                while (have_rows('subtitles_bio')) : the_row();
                $subtitle_bio = get_sub_field('subtitle_bio');
            
                if (!empty($subtitle_bio)) {
                echo '<li class="xxx">' . $subtitle_bio . '</li>';
                }
            
        endwhile;
    endif;
    ?>
            </ul>
            <div class="text_other-page">

            <?php 
                if( have_rows('paragraph_image_bio') ): 
                    while( have_rows('paragraph_image_bio') ): the_row();
                    $paragraphs_bio= get_sub_field('paragraphs_bio');
                    $image_bio = get_sub_field('image_bio');
                    $caption_bio = get_sub_field('caption_bio');
                    

                    if( have_rows('paragraphs_bio') ): 
                        while( have_rows('paragraphs_bio') ): the_row();
                        $paragraph_content_bio = get_sub_field('paragraph_content_bio'); ?>

                    <p class="paragraph_other-page"><?php echo $paragraph_content_bio; ?></p>
                    <?php endwhile; endif; ?>

                    <?php if ( !empty(get_sub_field('image_bio')) ) : ?>
                        <div class="portrait">
                    <div>
                        <div class="section-parallax">
                            <img class="img-parallax" src="<?php echo $image_bio['url']; ?>" alt="<?php echo $image_bio['url']; ?>">
                        </div>
                        <p class="caption-image"><?php echo $caption_bio;?></p>
                    </div>
                </div>
                
                <?php endif; ?>


                 <?php endwhile; endif; ?>
          
                <div class="random_work a-works-links_list">
                    <div class="random_dice"><a href="#" id="random-project-link3"  data-ajax-url="<?php echo admin_url('admin-ajax.php');?>" >🎲</a></div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>