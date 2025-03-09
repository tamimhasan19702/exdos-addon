<?php 
function exdos_post_type() {
    

    $labels = array(
        'name'               => _x('Portfolio', 'post type general name', 'exdos-addons'),
        'singular_name'      => _x('Portfolio Item', 'post type singular name', 'exdos-addons'),
        'menu_name'          => _x('Portfolio', 'admin menu', 'exdos-addons'),
        'name_admin_bar'     => _x('Portfolio Item', 'add new on admin bar', 'exdos-addons'),
        'add_new'            => _x('Add New', 'portfolio item', 'exdos-addons'),
        'add_new_item'       => __('Add New Portfolio Item', 'exdos-addons'),
        'new_item'           => __('New Portfolio Item', 'exdos-addons'),
        'edit_item'          => __('Edit Portfolio Item', 'exdos-addons'),
        'view_item'          => __('View Portfolio Item', 'exdos-addons'),
        'all_items'          => __('All Portfolio Items', 'exdos-addons'),
        'search_items'       => __('Search Portfolio Items', 'exdos-addons'),
        'parent_item_colon'  => __('Parent Portfolio Items:', 'exdos-addons'),
        'not_found'          => __('No portfolio items found.', 'exdos-addons'),
        'not_found_in_trash' => __('No portfolio items found in Trash.', 'exdos-addons')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'exdos-portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true, 
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-portfolio', 
    );


    register_post_type('exdos-portfolio', $args);

    register_taxonomy('exdos-portfolio-category', 'exdos-portfolio', array(
        'labels' => array(
            'name' => __('Portfolio Categories', 'exdos-addons'),
            'singular_name' => __('Category', 'exdos-addons'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_ui' => true,
        
    ));
}

add_action('init', 'exdos_post_type');