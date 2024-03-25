<?php 

function wpdocs_theme_name_scripts() {
    wp_enqueue_style('customcss', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');


    wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', null, null, true );
    wp_enqueue_script('jQuery');

    wp_register_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', null, null, true );
    wp_enqueue_script('gsap');

    wp_register_script( 'scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', null, null, true );
    wp_enqueue_script('scrollTrigger');

    wp_register_script( 'splittype', 'https://unpkg.com/split-type', null, null, true );
    wp_enqueue_script('splittype');

    wp_register_script( 'lenis', 'https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js', null, null, true );
    wp_enqueue_script('lenis');
    wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0.0', true );



}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts', PHP_INT_MAX );

//activer image mise en avant
add_theme_support( 'post-thumbnails' );


  // Custom Post Type for Work
function project_post_type() {

	$labels = array(
		'name'                  => _x( 'Project Types', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project Type', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Work Project', 'text_domain' ),
		'name_admin_bar'        => __( 'Project Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project Type', 'text_domain' ),
		'description'           => __( 'Project Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array( 'slug' => 'work' ),
	);
	register_post_type( 'project_type', $args );

}
add_action( 'init', 'project_post_type', 0 );

  // Custom Post Type for Tales
  function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'tales Types', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'tales Type', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tales Project', 'text_domain' ),
		'name_admin_bar'        => __( 'tales Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'tales Type', 'text_domain' ),
		'description'           => __( 'tales Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array( 'slug' => 'tale' ),
	);
	register_post_type( 'tales_type', $args );

}
add_action( 'init', 'custom_post_type', 0 );

//menu s
function register_my_menu(){
    register_nav_menu( 'menu-principal', 'Menu Principal' );
  }
  add_action( 'after_setup_theme', 'register_my_menu' ); 

function modify_menu_classes($classes, $item, $args) {
    $classes = array_filter($classes, 'is_numeric');
    $classes[] = 'menu-link';
    return $classes;
}
add_filter('nav_menu_css_class', 'modify_menu_classes', 10, 3);

function modify_menu_item_id($id, $item, $args) {
    $new_id = 'menu-' . sanitize_title($item->title);
    return $new_id;
}
add_filter('nav_menu_item_id', 'modify_menu_item_id', 10, 3);






/*Theme Option*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


//RANDOM WORK PROJECT FROM ANOTHER PAGE
add_action('wp_ajax_get_random_project_url', 'get_random_project_url');
add_action('wp_ajax_nopriv_get_random_project_url', 'get_random_project_url');
function get_random_project_url() {
    $args = array(
        'post_type' => 'project_type',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);
    $project_urls = array();
    while ($query->have_posts()) : $query->the_post();
        $project_urls[] = get_permalink();
    endwhile;
    wp_reset_postdata();
    $random_project_url = $project_urls[array_rand($project_urls)];
    wp_send_json_success($random_project_url);
}?>