<?php /*
Template Name: Works Template
*/
get_header(); ?>
<div class="container_other-page">
        <div class="index-work">
            <ul class="a-works-links_menu">

            <?php
            $args= array(
                'post_type' => 'project_type',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args); ?>
            <?php
            while($query -> have_posts()) : $query -> the_post();
            ?>

                <?php $title_work = get_field('title_work'); 
                      $emoji_title_work = get_field('emoji_title_work'); 
                ?>
                <li class="global-item-shuffle">
                    <a class="a-works-links_item project-link shuffle-effect" href="<?php echo get_permalink();?>"><?php echo $title_work;?></a><span class="emoji"><?php echo $emoji_title_work;?></span>
                    <div class="hover-img-work">

                    <?php 
                    $image_cover_work = get_field('image_cover_work');
                    if ($image_cover_work && is_array($image_cover_work)) {
                    ?>
                        <img src="<?php echo $image_cover_work['url']; ?>" alt="anime-img" class="img-fluid">
                        <?php }?>
                    </div>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata();  ?> 
               
               

            </ul> 
            <div class="random_work a-works-links_list">
                <div class="random_dice">
                    <a href="#" id="random-project-link">🎲</a>
                </div>
            </div>
        </div>
</div>




    <?php get_footer(); ?>