<?php 
class AabotPriceTablePost
{
	function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'init', array( $this, 'create_cat' ) );
		add_filter( 'cmb2_meta_boxes', array( $this, 'add_meta' ) );
	}
	

	
	
	public function register_custom_post_type() {

		$labels = array(
			'name'               => __( 'Price Tables', 'Post Type General Name', 'aabot-toolkit'),
			'singular_name'      => __( 'Price Tables', 'Post Type Singular Name', 'aabot-toolkit'),
			'menu_name'          => __( 'Price Tables', 'aabot-toolkit'),
			'parent_item_colon'  => __( 'Parent Price Table', 'aabot-toolkit'),
			'all_items'          => __( 'All  Price Tables', 'aabot-toolkit'),
			'view_item'          => __( 'View  Price Table', 'aabot-toolkit'),
			'add_new_item'       => __( 'Add New  Price Table', 'aabot-toolkit'),
			'add_new'            => __( 'Add New  Price Table', 'aabot-toolkit'),
			'edit_item'          => __( 'Edit  Price Table', 'aabot-toolkit'),
			'update_item'        => __( 'Update  Price Table', 'aabot-toolkit'),
			'search_items'       => __( 'Search  Price Table', 'aabot-toolkit'),
			'not_found'          => __( 'Not found', 'aabot-toolkit'),
			'not_found_in_trash' => __( 'Not found in Trash', 'aabot-toolkit'),
		);

		$args   = array(
			'label'               => __( 'Price Tables', 'aabot-toolkit'),
			'description'         => __( 'Create and manage all aabot biography', 'aabot-toolkit'),
			'labels'              => $labels,
			'supports'            => array( 'title','thumbnail', 'editor'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 14,
			'rewrite'             =>  array( 'slug' => 'price-tables', 'with_front' => false ),
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-grid-view',
		);

		register_post_type( 'aabot-pricetables', $args );
	}
	
	public function create_cat() {

		$name = 'Category';

		$labels = array(
			'name'              => esc_html($name),
			'singular_name'     => esc_html($name),
			'search_items'      => sprintf(esc_html__( 'Search %s:', 'aabot-toolkit' ),$name),
			'all_items'      	=> sprintf(esc_html__( 'All %s:', 'aabot-toolkit' ),$name),
			'parent_item'      	=> sprintf(esc_html__( 'Parent  %s:', 'aabot-toolkit' ),$name),
			'parent_item_colon' => sprintf(esc_html__( 'Parent  %s:', 'aabot-toolkit' ),$name),
			'edit_item'     	=> sprintf(esc_html__( 'Edit  %s:', 'aabot-toolkit' ),$name),
			'update_item'     	=> sprintf(esc_html__( 'Update %s:', 'aabot-toolkit' ),$name),
			'add_new_item'      => sprintf(esc_html__( 'Add New %s:', 'aabot-toolkit' ),$name),
			'new_item_name'     => sprintf(esc_html__( 'New  %s Name:', 'aabot-toolkit' ),$name),
			'menu_name'      	=> esc_html($name),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'price-table-cat' ),
		);

		register_taxonomy('price_tables_categories','aabot-pricetables', $args );
	}


	public function add_meta(array $aabot) {
		$prefix = 'price_table_';
		$aabot[] = array(
			'id'           => 'aabot-pricetable-sec',
			'title'        => esc_html__( 'Pricing Info Detials', 'aabot-toolkit' ),
			'object_types' => array( 'aabot-pricetables'),
			'fields'       => array(
				
		      	array(
			        'name' => esc_html__('Price','aabot-toolkit'),
			        'type' => 'text',
			        'id'   => $prefix . 'price'
		      	),				
		      	array(
			        'name' => esc_html__('Info Text','aabot-toolkit'),
			        'type' => 'textarea',
			        'id'   => $prefix . 'info_text'
		      	),				
		      	array(
			        'name' => esc_html__('Button Url','aabot-toolkit'),
			        'type' => 'text',
			        'id'   => $prefix . 'link_url'
		      	),
			)
		);
		
		return $aabot;
	}

}

new AabotPriceTablePost();