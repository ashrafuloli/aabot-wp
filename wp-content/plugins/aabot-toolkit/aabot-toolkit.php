<?php
if (!defined('ABSPATH'))
	exit;

/*
Plugin Name: Aabot Toolkit
Plugin URI: http://aabot.net/
Description: Aabot Toolkit Plugin
Version: 1.0.0
Author: Aabot
Author URI: http://aabot.net
*/

define('AABOT_TOOLKIT_VER', '1.0.1');
define('AABOT_TOOLKIT_DIR', plugin_dir_path(__FILE__));
define('AABOT_TOOLKIT_URL', plugin_dir_url(__FILE__));

define('AABOT_TOOLKIT_METABOX_ACTIVED', in_array('cmb2/init.php', apply_filters('active_plugins', get_option('active_plugins'))));

final class Aabot_toolkit
{

	private static $instance;

	function __construct()
	{

		require_once AABOT_TOOLKIT_DIR . '/inc/aabot-portfolio-post.php';
		require_once AABOT_TOOLKIT_DIR . '/inc/aabot-meta-boxes.php';
		require_once AABOT_TOOLKIT_DIR . '/inc/aabot-service-post.php';

		/**
		 * widgets
		 */
		require_once AABOT_TOOLKIT_DIR . '/widgets/aabot-latest-posts-sidebar.php';

		add_filter('template_include', array($this, '_portfolio_template_include'));
		add_filter('template_include', array($this, '_service_template_include'));

		add_filter('excerpt_length', array($this, 'custom_post_excerpt'));
		add_filter('excerpt_more', array($this, 'custom_new_excerpt_more'));
	}

	public static function instance()
	{

		if (!isset(self::$instance) && !(self::$instance instanceof Aabot_toolkit)) {
			self::$instance = new Aabot_toolkit;
		}
		return self::$instance;
	}

	public function _portfolio_template_include($template)
	{
		if (is_singular('aabot-portfolio')) {
			return $this->_get_portfolio_template('single-aabot-portfolio.php');
		}
		return $template;
	}

	public function _get_portfolio_template($template)
	{
		if ($theme_file = locate_template(array($template))) {
			$file = $theme_file;
		} else {
			$file = AABOT_TOOLKIT_DIR . 'template/' . $template;
		}
		return apply_filters(__FUNCTION__, $file, $template);
	}

	public function _service_template_include($template)
	{
		if (is_singular('aabot-service')) {
			return $this->_get_service_template('single-aabot-service.php');
		}
		return $template;
	}

	public function _get_service_template($template)
	{
		if ($theme_file = locate_template(array($template))) {
			$file = $theme_file;
		} else {
			$file = AABOT_TOOLKIT_DIR . 'template/' . $template;
		}
		return apply_filters(__FUNCTION__, $file, $template);
	}


	function custom_post_excerpt($length)
	{
		global $post;
		if ($post->post_type == 'aabot-service')
			return 15;
		return $length;
	}

	function custom_new_excerpt_more($more)
	{
		global $post;
		if ($post->post_type == 'aabot-service')
			return '';
		return $more;
	}
}

function Aabot_toolkit()
{

	return Aabot_toolkit::instance();
}

Aabot_toolkit();


/**
 * taxonomy category
 */
function aabot_get_terms($id, $tax)
{
	$terms = get_the_terms(get_the_ID(), $tax);
	$list = '';
	if ($terms && !is_wp_error($terms)) :
		$i = 1;
		$cats_count = count($terms);
		foreach ($terms as $term) {
			$exatra = ($cats_count > $i) ? ', ' : '';
			$list .= $term->name . $exatra;
			$i++;
		}
	endif;
	return trim($list, ',');
}


/**
 * [aabot_loadscript description]
 * @return [type] [description]
 */
function aabot_loadscript()
{
	wp_enqueue_script('aabot-google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyBvEEMx3XDpByNzYNn0n62Zsq_sVYPx1zY', array('jquery'), false, false);
}

add_action('wp_enqueue_scripts', 'aabot_loadscript');


