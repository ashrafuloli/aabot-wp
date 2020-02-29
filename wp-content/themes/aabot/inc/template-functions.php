<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aabot
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aabot_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'aabot_body_classes' );

/**
 * Get tags.
 */
function aabot_get_tag() {
	$html = '';
	if(has_tag()) {
		$html .= '<div class="blog-post-tag"><span>'. esc_html__('Post Tags','aabot') .'</span>';
			$html .= get_the_tag_list('',' ','');
		$html .= '</div>';
	}
	return $html;
}

/**
 * Get categories.
 */
function aabot_get_category() {

$categories = get_the_category( get_the_ID() );
	$x = 0;
	foreach ($categories as $category){
		
	if($x==2){
		break;
	}	
	$x++;

	$extra = ($x <= 1 ) ? ', ' : '';

	print '<span><a class="f-500 green-color" href="' . get_category_link($category->term_id) . '">'  . $category->cat_name . '</a></span>'.$extra.'';

	}
}

// aabot_member_sidebar_func
function aabot_member_sidebar_func() {
	if(is_active_sidebar('members-sidebar')){

		dynamic_sidebar( 'members-sidebar');
	}
}
add_action('aabot_member_sidebar','aabot_member_sidebar_func',20);

// aabot_service_sidebar
function aabot_service_sidebar_func() {
	if(is_active_sidebar('services-sidebar')){

		dynamic_sidebar( 'services-sidebar');
	}
}
add_action('aabot_service_sidebar','aabot_service_sidebar_func',20);

// aabot_portfolio_sidebar
function aabot_portfolio_sidebar_func() {
	if(is_active_sidebar('portfolio-sidebar')){

		dynamic_sidebar( 'portfolio-sidebar');
	}
}
add_action('aabot_portfolio_sidebar','aabot_portfolio_sidebar_func',20);