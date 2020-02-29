<?php
/**
 * hexi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hexi
 */

if ( ! function_exists( 'hexi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hexi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hexi, use a find and replace
		 * to change 'hexi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hexi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'hexi' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hexi_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Enable custom header
		 */
		add_theme_support('custom-header');
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'audio',
			'video',
			'gallery',
			'quote',
		) );

		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		add_image_size( 'hexi-blog-thumb', 570, 270,array('center','center') );
		add_image_size( 'hexi-team-thumb', 450, 530,array('center','center') );
		add_image_size( 'hexi-team-circle', 270, 270,array('center','center') );
		add_image_size( 'hexi-latest-blog', 740, 1000,array('center','center') );

	}
endif;
add_action( 'after_setup_theme', 'hexi_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hexi_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hexi_content_width', 640 );
}
add_action( 'after_setup_theme', 'hexi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hexi_widgets_init() {

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'hexi' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'hexi' ),
		'before_widget' => '<div id="%1$s" class="widget mb-40 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title mb-30">',
		'after_title'   => '</h3>',
	) );

	/**
	* Portfolio Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Portfolio Sidebar', 'hexi' ),
			'id' 			=> 'portfolio-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Portfolio Details Sidebar.', 'hexi' ),
			'before_title' 	=> '<h3>',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="portfolio-sidebar  %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Service Sidebar', 'hexi' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'hexi' ),
			'before_title' 	=> '<div class="widget-title-box mb-30">
                    <h3 class="widget-title">',
			'after_title' 	=> '</h3></div>',
			'before_widget' => '<div class="service-widget mb-50 %2$s">',
			'after_widget' 	=> '</div>',
		)
	);
}
add_action( 'widgets_init', 'hexi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
define('HEXI_THEME_DIR', get_template_directory() );
define('HEXI_THEME_URI', get_template_directory_uri());
define('HEXI_THEME_CSS_DIR', HEXI_THEME_URI.'/css/');
define('HEXI_THEME_JS_DIR', HEXI_THEME_URI.'/js/');
define('HEXI_THEME_INC', HEXI_THEME_DIR.'/inc/');

/** 
 * hexi_scripts description
 * @return [type] [description]
 */
function hexi_scripts() {
	/**
	* all css files
	*/
	wp_enqueue_style( 'hexi-fonts', hexi_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'bootstrap', HEXI_THEME_CSS_DIR.'bootstrap.min.css', array() );
	wp_enqueue_style( 'animate', HEXI_THEME_CSS_DIR.'animate.min.css', array() );
	wp_enqueue_style( 'magnific-popup', HEXI_THEME_CSS_DIR.'magnific-popup.css', array() );
	wp_enqueue_style( 'fontawesome-all', HEXI_THEME_CSS_DIR.'fontawesome-all.min.css', array() );
	wp_enqueue_style( 'pe-icon-7-stroke', HEXI_THEME_CSS_DIR.'Pe-icon-7-stroke.css', array() );
	wp_enqueue_style( 'slick', HEXI_THEME_CSS_DIR.'slick.css', array() );
	wp_enqueue_style( 'aos', HEXI_THEME_CSS_DIR.'aos.css', array() );
	wp_enqueue_style( 'hexi-default', HEXI_THEME_CSS_DIR.'default.css', array() );
	wp_enqueue_style( 'hexi-main', HEXI_THEME_CSS_DIR.'main.css', array() );
	wp_enqueue_style( 'hexi-style', get_stylesheet_uri() );
	wp_enqueue_style( 'hexi-responsive', HEXI_THEME_CSS_DIR.'responsive.css', array() );

	if(get_theme_mod( 'rtl_switch',false)) {
		wp_enqueue_style( 'hexi-rtl', HEXI_THEME_CSS_DIR . 'rtl.css', array() );
		wp_enqueue_style( 'hexi-rtl-responsive', HEXI_THEME_CSS_DIR . 'rtl-responsive.css', array() );
	}

	// all js
	wp_enqueue_script( 'popper', HEXI_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', HEXI_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'isotope-pkgd', HEXI_THEME_JS_DIR.'isotope.pkgd.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'one-page-nav-min', HEXI_THEME_JS_DIR.'one-page-nav-min.js', array('jquery'), false, true );
	wp_enqueue_script( 'slick', HEXI_THEME_JS_DIR.'slick.min.js', array('jquery','imagesloaded'), false, true );
	wp_enqueue_script( 'wow', HEXI_THEME_JS_DIR.'wow.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'aos', HEXI_THEME_JS_DIR.'aos.js', array('jquery'), false, true );
	wp_enqueue_script( 'paroller', HEXI_THEME_JS_DIR.'paroller.js', array('jquery'), false, true );
	wp_enqueue_script( 'js-jquery-appear', HEXI_THEME_JS_DIR.'js_jquery.appear.js', array('jquery'), false, true );
	wp_enqueue_script( 'js-jquery-knob', HEXI_THEME_JS_DIR.'js_jquery.knob.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-scrollup', HEXI_THEME_JS_DIR.'jquery.scrollUp.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-magnific-popup', HEXI_THEME_JS_DIR.'jquery.magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'hexi-plugins', HEXI_THEME_JS_DIR.'plugins.js', array('jquery'), false, true );

	if(get_theme_mod( 'rtl_switch',false)) {
		wp_enqueue_script( 'rtl-main', HEXI_THEME_JS_DIR.'rtl-main.js', array('jquery'), false, true );
	}
	else{
		wp_enqueue_script( 'hexi-rtl-main', HEXI_THEME_JS_DIR.'main.js', array('jquery'), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hexi_scripts' );

/*
Register Fonts
*/
function hexi_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'hexi' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Karla:400,400i,700,700i&display=swap' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require get_template_directory() . '/inc/template-helper.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* include hexi functions file
*/
require_once HEXI_THEME_INC . 'hexi_navwalker.php';
require_once HEXI_THEME_INC . 'hexi_customizer.php';
require_once HEXI_THEME_INC . 'hexi_customizer_data.php';
require_once HEXI_THEME_INC . 'class-tgm-plugin-activation.php';
require_once HEXI_THEME_INC . 'hexi_add_plugin.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hexi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hexi_pingback_header' );

/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'hexi_comment_form_default_fields_func');

function hexi_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
                            <div class="col-xl-6">
                            	<div class="contacts-name">
                            		<label>'.esc_html__('Your name *','hexi').'</label>
                                	<input type="text" name="author">
                                </div>
                            </div>';
	$default['email'] = '<div class="col-xl-6">
							<div class="contacts-email ">
							<label>'.esc_html__('Your email *','hexi').'</label>
                            <input type="text" name="email">
                        	</div>
                        </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
									<div class="contacts-message">
									<label>'.esc_html__('Comments *','hexi').'</label>
                                     <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
                                    </div>';
	return $default;
}

add_filter('comment_form_defaults', 'hexi_comment_form_defaults_func');

function hexi_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	}else {
		$info['comment_field'] = '<div class="comments-textarea contacts-message contact-icon">
											<label>'.esc_html__('Comments *','hexi').'</label>
                                                <textarea id="comment" name="comment" cols="30" rows="10"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="h-btn" type="submit"><code class="h-btn--inner">'.esc_html__('Post Comment','hexi').' </code></button>';

	$info['title_reply_before'] = '<div class="post-comments-title">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}

if( !function_exists('hexi_comment') ) {
	function hexi_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$args['reply_text'] = '<i class="fas fa-reply-all"></i> Reply';
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class($replayClass); ?>>
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}

/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'hexi_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function hexi_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}

/**
 * [ocdi_import_files description]
 * @return [type] [description]
 */
function hexi_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__('hexi Demo Data', 'hexi'),
            'import_file_url'            => 'https://themepure.net/plugins/hexi/hexi-demo-content.xml',
            'import_widget_file_url'     => 'https://themepure.net/plugins/hexi/hexi-widget.json',
            'import_customizer_file_url' => 'https://themepure.net/plugins/hexi/hexi-customizer.dat',
            'import_preview_image_url'   => 'https://themepure.net/ocdi/preview.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'hexi' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'hexi_import_files' );

/**
 * [ocdi_after_import_setup description]
 * @return [type] [description]
 */
function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

// hexi_search_filter_form
if(!function_exists('hexi_search_filter_form')){
  function hexi_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<div class="sidebar-form"><form class="search-form" action="%s" method="get">
      	<input type="text" value="%s" required name="s" placeholder="%s">
      	<button type="submit"> <i class="fas fa-search"></i>  </button>
		</form></div>',
		esc_url( home_url('/')),
		esc_attr( get_search_query()),
		esc_html__('Search','hexi')
	);

    return $form;
  }
  add_filter( 'get_search_form','hexi_search_filter_form');
}

function _html_markup_render( $markup ){
	return $markup;
}

add_action('admin_enqueue_scripts', 'hexi_admin_custom_scripts');
function hexi_admin_custom_scripts(){
	wp_enqueue_media();
	wp_register_script('hexi-admin-custom', get_template_directory_uri().'/inc/js/admin_custom.js', array('jquery'), '', true);
	wp_enqueue_script('hexi-admin-custom');

}


// enable_rtl
function enable_rtl(){
	if(get_theme_mod( 'rtl_switch',false)) {
		return ' dir="rtl" ';
	}
	else{
		return '';
	}
}