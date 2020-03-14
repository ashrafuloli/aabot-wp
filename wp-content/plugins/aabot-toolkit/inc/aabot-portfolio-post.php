<?php

class AabotPortfolioPost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('cmb2_meta_boxes', array($this, 'add_meta'));
		add_filter('template_include', array($this, 'portfolio_template_include'));
	}

	public function portfolio_template_include($template)
	{
		if (is_singular('aabot-portfolio')) {
			return $this->get_template('single-aabot-portfolio.php');
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
			'name' => __('Portfolio', 'Post Type General Name', 'aabot-toolkit'),
			'singular_name' => __('Portfolio', 'Post Type Singular Name', 'aabot-toolkit'),
			'menu_name' => __('Portfolio', 'aabot-toolkit'),
			'parent_item_colon' => __('Parent portfolio', 'aabot-toolkit'),
			'all_items' => __('All  portfolio', 'aabot-toolkit'),
			'view_item' => __('View  portfolio', 'aabot-toolkit'),
			'add_new_item' => __('Add New  portfolio', 'aabot-toolkit'),
			'add_new' => __('Add New  portfolio', 'aabot-toolkit'),
			'edit_item' => __('Edit  portfolio', 'aabot-toolkit'),
			'update_item' => __('Update  portfolio', 'aabot-toolkit'),
			'search_items' => __('Search  portfolio', 'aabot-toolkit'),
			'not_found' => __('Not found', 'aabot-toolkit'),
			'not_found_in_trash' => __('Not found in Trash', 'aabot-toolkit'),
		);

		$args = array(
			'label' => __('Portfolio', 'aabot-toolkit'),
			'description' => __('Create and manage all aabot portfolio', 'aabot-toolkit'),
			'labels' => $labels,
			'supports' => array('title', 'thumbnail', 'editor'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 14,
			'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-awards',
		);

		register_post_type('aabot-portfolio', $args);
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

		register_taxonomy('portfolio_categories', 'aabot-portfolio', $args);
	}


	public function add_meta(array $aabot)
	{

		$aabot[] = array(
			'id' => 'aabot-portfolio',
			'title' => esc_html__('Portfolio Info', 'aabot-toolkit'),
			'object_types' => array('aabot-portfolio'),
			'fields' => array(
				array(
					'name' => esc_html__('Date', 'aabot-toolkit'),
					'id' => 'portfolio_date',
					'type' => 'text_date',
				),
				array(
					'name' => esc_html__('Company Name', 'aabot-toolkit'),
					'id' => 'company_name',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Company Location', 'aabot-toolkit'),
					'id' => 'company_location',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Gallery Image', 'aabot-toolkit'),
					'id' => 'project_images',
					'type' => 'file_list',
				),
				array(
					'name' => esc_html__('Project URL', 'aabot-toolkit'),
					'id' => 'project_link',
					'type' => 'text',
				),
				array(
					'name' => esc_html__('Gallery Image', 'aabot-toolkit'),
					'type' => 'file',
					'id' => 'portfolio_thumb'
				)
			)
		);

		return $aabot;
	}

}

new AabotPortfolioPost();