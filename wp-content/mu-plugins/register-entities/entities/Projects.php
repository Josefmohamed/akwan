<?php

namespace Register_Entities;

class Projects extends Entity
{
  public static function init()
  {
    // to copy
    register_post_type('projects', [
        'label' => __('projects', 'akwan'),
        'description' => __('Projects news and reviews', 'akwan'),
        'labels' => array(
            'name' => _x('Projects', 'Post Type General Name', 'akwan'),
            'singular_name' => _x('Projects', 'Post Type Singular Name', 'akwan'),
            'menu_name' => __('Projects', 'akwan'),
            'parent_item_colon' => __('Parent Project', 'akwan'),
            'all_items' => __('All Projects', 'akwan'),
            'view_item' => __('View Project', 'akwan'),
            'add_new_item' => __('Add New Project', 'akwan'),
            'add_new' => __('Add New', 'akwan'),
            'edit_item' => __('Edit Project', 'akwan'),
            'update_item' => __('Update Project', 'akwan'),
            'search_items' => __('Search Project', 'akwan'),
            'not_found' => __('Not Found', 'akwan'),
            'not_found_in_trash' => __('Not found in Trash', 'akwan'),
        ),
        'supports' => array(
            'title',
            'custom-fields',
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-admin-multisite',
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 6,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    ]);
    
  }
}


