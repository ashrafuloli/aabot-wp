<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hexi
 */ 
?>

<!doctype html>
<html <?php language_attributes(); ?> <?php print enable_rtl(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Add your site or application content here -->
    <!-- header start -->
    <?php do_action('hexi_header_style'); ?>
    <!-- header end -->
    <!-- wrapper-box start -->
    <?php do_action('hexi_before_main_content'); ?>
    





        