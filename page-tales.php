<?php /*
Template Name: Tales Template
*/
get_header(); ?>
<div class="container_other-page">
    <div class="index-work">
        <ul class="a-works-links_menu">

        <?php
        $args= array(
            'post_type' => 'tales_type',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args); ?>
        <?php
        while($query -> have_posts()) : $query -> the_post();
        ?>

            <?php $title_tales = get_field('title_tales');
             $emoji_title_tales = get_field('emoji_title_tales'); ?>
            <li class="global-item-shuffle"><a class="a-works-links_item tales-project-link shuffle-effect" href="<?php echo get_permalink();?>"><?php echo $title_tales;?></a><span class="emoji"><?php echo $emoji_title_tales;?></span>
                <div class="hover-img-work">

                <?php 
                $image_cover_tales = get_field('image_cover_tales');
                if ($image_cover_tales && is_array($image_cover_tales)) {
                ?>
                    <img src="<?php echo $image_cover_tales['url']; ?>" alt="anime-img" class="img-fluid">
                    <?php }?>
                </div>
            </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); // Réinitialise la requête WordPress ?> 
   
   

        </ul>
           
        </div>

        <div class="tales_other-page">
            <div class="text_other-page" id="text_other-page-id">

                <?php $tales_introduction= get_field('tales_introduction');?>
                <p class="paragraph-white_other-page"><?php echo $tales_introduction;?></p>
                <div class="random_work">
                    <div class="random_dice">
                        <a href="#" id="random-tales-project-link">🎲</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>