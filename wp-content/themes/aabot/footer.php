<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aabot
 */
$aabot_copyright_column = get_theme_mod('aabot_footer_social_switch') ? '6': '12';
$aabot_copyright_center = get_theme_mod('aabot_footer_social_switch') ? 'right': 'center';
?>

	<!-- footer start -->
    <!-- <footer class="theme-bg">
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright-content text-center">
                                <p><?php print aabot_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- footer end --> 

    <?php do_action('aabot_footer_style');  ?>


    <?php wp_footer(); ?>
    </body>
</html>
