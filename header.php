<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="<?php echo get_template_directory_uri(); ?>/img/favicon-64x64.png">
    <!-- Favicon for Internet Explorer -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

    <title>Raphaël Penasa</title>
</head>
<body onload="divrandom()">
    <!-- ↓↓↓↓ HEADER ↓↓↓↓ -->
    <header>
        <div class="a-header">
            <div class="background-header"></div>
            <nav role="navigation">
                <div id="menuToggle">
        
                    <input type="checkbox"/>
                    
                    <div class="openClose-content"><span class="openClose active shuffle">menu</span>
                        
                        <?php
    // Récupérer l'ID de la page actuelle
    $current_page_id = get_queried_object_id();

    // Vérifier si la page actuelle est la page "bio"
    if (is_page('bio') || strpos(get_post_field('post_name', $current_page_id), 'bio-') === 0) { ?>
        <span class="openClose-page"><?php echo 'Biography';?></span>
    <?php 
    } elseif (is_front_page()) {
       
    } elseif (is_singular('project_type')) {?>
        <span class="openClose-page"><?php echo 'Works';?></span>
    <?php 
    } elseif (is_singular('tales_type')) {?>
        <span class="openClose-page"><?php echo 'Tales';?></span>
    <?php } else { ?>
        <span class="openClose-page"><?php echo get_the_title($current_page_id);?></span>
    <?php } ?>
                        
                    </div>
                    
                    <span class="openClose active shuffle" id="openClose-Close">close</span>
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        
                    <ul id="menu" class="menu">
                    <?php  $email_header = get_field('email_header', 'option'); ?>
                        <li class="menu-link" id="menu-email"><a href="mailto:<?php echo esc_html($email_header);?>?subject=From%20Penasa%20website">📬</a></li>
                    
                    <?php wp_nav_menu(array(
                        'theme_location' => 'menu-principal',
                        'container' => '',
                        'menu_class' => 'menuX',
                        'menu_id' => 'menuX'

                    ));?>
                    
                 
                        <li id="menu-random-project">
                            <a href="#" id="random-project-link2" data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>">🎲</a>
                        </li>
        
                        <ul id="menu_social-media">
                        <?php  
                        $instagram_header = get_field('instagram_header', 'option'); 
                        $linkedin_header = get_field('linkedin_header', 'option'); ?>
                            <li><a target="_blank" href="<?php echo esc_url($instagram_header)?>" class="active"><span class="shuffle">instagram</span></a></li>
                            <li><a target="_blank" href="<?php echo esc_url($linkedin_header)?>" class="active"><span class="shuffle">linkedin</span></a></li>
                        </ul>
                    </ul>
                  
                </div>
            </nav>

            <nav class="a-header_size-menu">
                <ul class="a-header_menu-list">
                <?php 
               if (!is_singular('tales_type') && !is_front_page()  && !is_page('tales')) {
                pll_the_languages(array('show_flags' => 0, 'show_names' => 0, 'hide_if_empty' => 0));
            } ?>



                </ul>
            </nav>           
        </div>
    </header>
    <!-- ↑↑↑↑ END HEADER ↑↑↑↑ -->
