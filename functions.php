<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function pilot_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
	
}
add_action( 'wp_enqueue_scripts', 'pilot_script_enqueue');
/*
	==========================================
	 Activate menus
	==========================================
*/
function pilot_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
	
}
add_action('init', 'pilot_theme_setup');
/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));
/*
	==========================================
	 Sidebar function
	==========================================
*/
function pilot_widget_setup() {
	
	register_sidebar(
		array(	
			'name'	=> 'Sidebar',
			'id'	=> 'sidebar-1',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	
}
add_action('widgets_init','pilot_widget_setup');
/*
	==========================================
	 Include Walker file
	==========================================
*/
require get_template_directory() . '/inc/walker.php';

/*
	==========================================
	 Head function
	==========================================
*/
function pilot_remove_version(){
	return '';
}
add_filter('the_generator', 'pilot_remove_version');

/*

	==========================================
	 Custom Post Type
	==========================================
*/
function pilot_custom_post_type (){
	
	$labels = array(
		'name' => 'Team Member',
		'singular_name' => 'Team Member',
		'plural_name' => 'Team Members',
		'add_new' => 'Add New Team Member',
		'all_items' => 'All Team Member',
		'add_new_item' => 'Add Team Member',
		'edit_item' => 'Edit Team Member',
		'new_item' => 'New Team Member',
		'view_item' => 'View Team Member',
		'search_item' => 'Search Team_Member',
		'not_found' => 'NoTeam Members found',
		'not_found_in_trash' => 'No Team Member found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		/* 'taxonomies' => array('category', 'post_tag'), */
		'taxonomies' => array('category'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('team',$args);
}
add_action('init','pilot_custom_post_type');
