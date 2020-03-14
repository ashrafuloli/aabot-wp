<?php

class AabotServicePost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('cmb2_meta_boxes', array($this, 'add_meta'));
		add_filter('template_include', array($this, 'service_template_include'));
	}

	public function service_template_include($template)
	{
		if (is_singular('aabot-service')) {
			return $this->get_template('single-aabot-service.php');
		}
		return $template;
	}

	public function get_template($template)
	{
		if ($theme_file = locate_template(array($template))) {
			$file = $theme_file;
		} else {
			$file = AABOT_TOOLKIT_DIR . '/template/' . $template;
		}
		return apply_filters(__FUNCTION__, $file, $template);
	}


	public function register_custom_post_type()
	{

		$labels = array(
			'name' => __('Service', 'Post Type General Name', 'aabot-toolkit'),
			'singular_name' => __('Service', 'Post Type Singular Name', 'aabot-toolkit'),
			'menu_name' => __('Service', 'aabot-toolkit'),
			'parent_item_colon' => __('Parent Service', 'aabot-toolkit'),
			'all_items' => __('All  Service', 'aabot-toolkit'),
			'view_item' => __('View  Service', 'aabot-toolkit'),
			'add_new_item' => __('Add New  Service', 'aabot-toolkit'),
			'add_new' => __('Add New  Service', 'aabot-toolkit'),
			'edit_item' => __('Edit  Service', 'aabot-toolkit'),
			'update_item' => __('Update  Service', 'aabot-toolkit'),
			'search_items' => __('Search  Service', 'aabot-toolkit'),
			'not_found' => __('Not found', 'aabot-toolkit'),
			'not_found_in_trash' => __('Not found in Trash', 'aabot-toolkit'),
		);

		$args = array(
			'label' => __('Service', 'aabot-toolkit'),
			'description' => __('Create and manage all aabot Service', 'aabot-toolkit'),
			'labels' => $labels,
			'supports' => array('title', 'thumbnail', 'editor'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 14,
			'rewrite' => array('slug' => 'service', 'with_front' => false),
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-smiley',
		);

		register_post_type('aabot-service', $args);
	}

	public function create_cat()
	{

		$name = 'Category';

		$labels = array(
			'name' => esc_html($name),
			'singular_name' => esc_html($name),
			'search_items' => sprintf(esc_html__('Search %s:', 'aabot-toolkit'), $name),
			'all_items' => sprintf(esc_html__('All %s:', 'aabot-toolkit'), $name),
			'parent_item' => sprintf(esc_html__('Parent  %s:', 'aabot-toolkit'), $name),
			'parent_item_colon' => sprintf(esc_html__('Parent  %s:', 'aabot-toolkit'), $name),
			'edit_item' => sprintf(esc_html__('Edit  %s:', 'aabot-toolkit'), $name),
			'update_item' => sprintf(esc_html__('Update %s:', 'aabot-toolkit'), $name),
			'add_new_item' => sprintf(esc_html__('Add New %s:', 'aabot-toolkit'), $name),
			'new_item_name' => sprintf(esc_html__('New  %s Name:', 'aabot-toolkit'), $name),
			'menu_name' => esc_html($name),
		);

		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'category'),
		);

		register_taxonomy('service_categories', 'aabot-service', $args);
	}


	public function add_meta(array $aabot)
	{

		$aabot[] = array(
			'id' => 'aabot-service',
			'title' => esc_html__('Service Details Image', 'aabot-toolkit'),
			'object_types' => array('aabot-service'),
			'fields' => array(
				array(
					'name' => esc_html__('Service Icon', 'aabot-toolkit'),
					'id' => 'service_icon',
					'default' => esc_html__('pe-7s-helm'),
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Service Details Image', 'aabot-toolkit'),
					'type' => 'file',
					'id' => 'service_thumb'
				),
			)
		);

		return $aabot;
	}

}


new AabotServicePost();