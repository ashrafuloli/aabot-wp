<?php

class AabotRoutinePost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('cmb2_admin_init', array($this, 'add_educational_meta'));
		add_filter('template_include', array($this, 'routine_template_include'));
	}

	public function routine_template_include($template)
	{
		if (is_singular('aabot-routine')) {
			return $this->get_template('single-aabot-routine.php');
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
			'name' => __('Routines', 'Post Type General Name', 'aabot-toolkit'),
			'singular_name' => __('Routine', 'Post Type Singular Name', 'aabot-toolkit'),
			'menu_name' => __('Routines', 'aabot-toolkit'),
			'parent_item_colon' => __('Parent Routine', 'aabot-toolkit'),
			'all_items' => __('All  Routines', 'aabot-toolkit'),
			'view_item' => __('View  Routine', 'aabot-toolkit'),
			'add_new_item' => __('Add New  Routine', 'aabot-toolkit'),
			'add_new' => __('Add New  Routine', 'aabot-toolkit'),
			'edit_item' => __('Edit  Routine', 'aabot-toolkit'),
			'update_item' => __('Update  Routine', 'aabot-toolkit'),
			'search_items' => __('Search  Routine', 'aabot-toolkit'),
			'not_found' => __('Not found', 'aabot-toolkit'),
			'not_found_in_trash' => __('Not found in Trash', 'aabot-toolkit'),
		);

		$args = array(
			'label' => __('Routine', 'aabot-toolkit'),
			'description' => __('Create and manage all Aabot Routine', 'aabot-toolkit'),
			'labels' => $labels,
			'supports' => array('title', 'thumbnail', 'editor'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 14,
			'rewrite' => array('slug' => 'routine', 'with_front' => false),
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'post',
			'menu_icon' => 'dashicons-id-alt',
		);

		register_post_type('aabot-routine', $args);
	}

	public function create_cat()
	{

		$name = 'Routine';

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
			'rewrite' => array('slug' => 'routine_cat'),
		);

		register_taxonomy('routine_categories', 'aabot-routine', $args);
	}


	public function add_educational_meta()
	{

		$education = new_cmb2_box(array(
			'title' => 'DR Routine Section',
			'id' => 'dr-routine-section',
			'object_types' => array('aabot-routine')
		));


		$group_field_id = $education->add_field(array(
			'id' => 'rutine_info_repeat_group',
			'type' => 'group',
			'description' => __('Routine in details', 'aabot-toolkit'),
			'repeatable' => true, // use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('Routine Extra Info', 'aabot-toolkit'), // since version 1.1.4, {#} gets replaced by row number
				'add_button' => __('Add Another Entry', 'aabot-toolkit'),
				'remove_button' => __('Remove Entry', 'aabot-toolkit'),
				'sortable' => true, // beta
				'closed' => false, // true to have the groups closed by default
			),
		));

		// your name
		$education->add_group_field($group_field_id, array(
			'name' => esc_html__('Dr. Name', 'aabot-toolkit'),
			'type' => 'text',
			'id' => 'dr_name'
		));

		// your picture
		$education->add_group_field($group_field_id, array(
			'name' => esc_html__('Time Period', 'aabot-toolkit'),
			'type' => 'text',
			'id' => 'dr_time'
		));

	}


}

new AabotRoutinePost();
