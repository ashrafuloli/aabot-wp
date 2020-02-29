<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hexi
 */
$hexi_copyright_column = get_theme_mod('hexi_footer_social_switch') ? '6': '12';
$hexi_copyright_center = get_theme_mod('hexi_footer_social_switch') ? 'right': 'center';
?>

	<!-- footer start -->
    <footer class="theme-bg">
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright-content text-center">
                                <p><?php print hexi_copyright_text(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end --> 
    <?php wp_footer(); ?>
    </body>
</html>
