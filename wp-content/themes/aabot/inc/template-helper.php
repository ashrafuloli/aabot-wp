<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aabot
 */

/**
*
* aabot header
*/
add_action('aabot_header_style', 'aabot_check_header', 10);

function aabot_check_header() {
    aabot_header_default();
}

/**
* default header style
*/
function aabot_header_default() {
    $aabot_header_side = get_theme_mod('aabot_header_side');
    $aabot_header_ride_info = get_theme_mod('aabot_header_ride_info');
    $evo_menu_column = get_theme_mod('aabot_header_ride_info') ? '7': '10' ;
    $aabot_menu_center = get_theme_mod('aabot_header_ride_info') ? 'left': 'right' ;
    ?>

<!-- start body overlay -->
<div class="body-overlay"></div>
<!-- end body overlay -->

<!-- start header area -->
<header class="header-area">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-2 col-lg-2 col-md-6 col-5">
                <!-- start site logo -->
                <div class="logo">
                    <?php aabot_header_logo(); ?>
                </div>
                <!-- end site logo -->
            </div>
            <div class="col-xl-8 col-lg-8 d-xl-block d-lg-block d-none">
                <!-- start site menu -->
                <nav class="site-menu">
                    <?php aabot_header_menu(); ?>
                </nav>
                <!-- end site menu -->
            </div>
            <?php if ($aabot_header_ride_info) : ?> 
            <div class="col-xl-2 col-lg-1 col-md-3 col-5 d-xl-block d-lg-block d-none">
                <div class="bar text-right">
                    <a href="#" class="open-side"><i class="far fa-bars"></i></a>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xl-12">
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
</header>
<!-- end header area -->

<!-- start side bar -->
<aside class="side-bar">
    <a href="#" class="close-side"><i class="fa fa-times"></i></a>

	<?php $aabot_logo_sidebar = get_theme_mod('sidebar_logo'); ?>
	<?php if (!empty($aabot_logo_sidebar)): ?>
	    <!-- start side widget -->
	    <div class="sidebar-widget logo-side">
	        <a href="<?php print home_url(); ?>">
		        <img src="<?php print esc_url( $aabot_logo_sidebar ); ?>" alt="<?php print esc_attr__('Logo', 'aabot'); ?>">
	        </a>
	    </div>
	    <!-- end side widget -->
	<?php endif; ?>

	<?php
		if ( is_active_sidebar( 'hamburger-sidebar' ) ) {
			dynamic_sidebar( 'hamburger-sidebar' );
		}
	?>

</aside>
<!-- end side bar -->

<?php 
}


/** 
 * [aabot_slide_extra_info description]
 * @return [type] [description]
 */
function aabot_slide_extra_info() { 
    $aabot_logo_white = get_template_directory_uri() . '/img/logo/logo.png';
    $logo   = get_theme_mod('aabot_extra_info_logo', $aabot_logo_white);
    $office_address     = get_theme_mod('aabot_office_address');
    $phone_number   = get_theme_mod('aabot_phone_number');
    $email_address  = get_theme_mod('aabot_email_address');
    $portfolios     = get_theme_mod('aabot_portfolios');

    $aabot_extra_info_fb_url           = get_theme_mod('aabot_extra_info_fb_url');
    $aabot_extra_info_twitter_url      = get_theme_mod('aabot_extra_info_twitter_url');
    $aabot_extra_info_behance_url      = get_theme_mod('aabot_extra_info_behance_url');
    $aabot_extra_info_instagram_url    = get_theme_mod('aabot_extra_info_instagram_url');
    ?>
                       
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>

        <div class="logo-side mb-30">
            <a href="<?php print home_url(); ?>">
                <img src="<?php print esc_url( $logo ); ?>" alt="<?php print esc_attr__('Icon', 'aabot'); ?>">
            </a>
        </div>

        <div class="side-info mb-30">

            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Office Address', 'aabot'); ?></h4>
                <?php print wp_kses_post( $office_address ); ?>
            </div>

            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Phone Number', 'aabot'); ?></h4>
                <?php print wp_kses_post( $phone_number ); ?>
            </div>
            
            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Email Address', 'aabot'); ?></h4>
                <?php print wp_kses_post( $email_address ); ?>
            </div>
        </div>

        <div class="social-icon-right mt-20">
            <?php  if($aabot_extra_info_fb_url) : ?>
            <a href="<?php print esc_url( $aabot_extra_info_fb_url ); ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
            <?php endif; ?>

            <?php  if($aabot_extra_info_twitter_url) : ?>
            <a href="<?php print esc_url( $aabot_extra_info_twitter_url ); ?>">
                <i class="fab fa-twitter"></i>
            </a>
            <?php endif; ?>
            
            <?php  if($aabot_extra_info_behance_url) : ?>
            <a href="<?php print esc_url( $aabot_extra_info_behance_url ); ?>">
                <i class="fab fa-google-plus-g"></i>
            </a>
            <?php endif; ?>

            <?php  if($aabot_extra_info_instagram_url) : ?>
            <a href="<?php print esc_url( $aabot_extra_info_instagram_url ); ?>">
                <i class="fab fa-instagram"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="offcanvas-overly"></div>

<?php } 


// favicon logo
function aabot_favicon_logo_func() {
    $aabot_favicon = get_template_directory_uri() . '/img/logo/favicon.png';
    $aabot_favicon_url = get_theme_mod('favicon_url', $aabot_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $aabot_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'aabot_favicon_logo_func');

// header logo
function aabot_header_logo() {
    ?>
            <?php 
            $aabot_logo_on = get_post_meta(get_the_ID(), 'aabot_enable_sec_logo', true);
            $aabot_logo = get_template_directory_uri() . '/img/logo/logo.png';
            $aabot_logo_white = get_template_directory_uri() . '/img/logo/logo-white.png';

            $aabot_retina_logo = get_template_directory_uri().'/img/logo/logo@2x.png';
            $aabot_retina_logo_white = get_template_directory_uri().'/img/logo/logo-white@2x.png';

            $aabot_retina_logo  = get_theme_mod('retina_logo',$aabot_retina_logo);
            $aabot_retina_logo_white  = get_theme_mod('retina_secondary_logo',$aabot_retina_logo_white);

            $aabot_site_logo = get_theme_mod('logo', $aabot_logo);
            $aabot_secondary_logo = get_theme_mod('seconday_logo', $aabot_logo_white);
            ?>
             
             <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if($aabot_logo_on === 'on') { ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($aabot_secondary_logo); ?>" alt="<?php print esc_attr('logo','aabot'); ?>" />
                    </a>
                    <a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($aabot_retina_logo_white); ?>" alt="<?php print esc_attr('logo','aabot'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($aabot_site_logo); ?>" alt="<?php print esc_attr('logo','aabot'); ?>" />
                    </a>
                    <a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($aabot_retina_logo); ?>" alt="<?php print esc_attr('logo','aabot'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 


/** 
 * [aabot_header_social_profiles description]
 * @return [type] [description]
 */
function aabot_header_social_profiles() {
    $aabot_topbar_fb_url             = get_theme_mod('aabot_topbar_fb_url', '#');
    $aabot_topbar_instagram_url      = get_theme_mod('aabot_topbar_instagram_url', '#');
    $aabot_topbar_youtube_url        = get_theme_mod('aabot_topbar_youtube_url', '#');
    $aabot_topbar_linkedin_url       = get_theme_mod('aabot_topbar_linkedin_url', '#');
    $aabot_topbar_pinterest_url      = get_theme_mod('aabot_topbar_pinterest_url', '#');
    ?>
        <ul>
        <?php if ($aabot_topbar_fb_url != '#'): ?>
            <li><a href="<?php print esc_url($aabot_topbar_fb_url); ?>">
                  <i class="fab fa-facebook-f"></i>
              </a></li>
        <?php endif; ?>

        <?php if ($aabot_topbar_instagram_url != '#'): ?>
            <li><a href="<?php print esc_url($aabot_topbar_instagram_url); ?>">
                  <i class="fab fa-instagram"></i>
              </a></li>
        <?php endif; ?>

        <?php if ($aabot_topbar_youtube_url != '#'): ?>
            <li><a href="<?php print esc_url($aabot_topbar_youtube_url); ?>">
              <i class="fab fa-youtube"></i>
            </a></li>
        <?php endif; ?>

        <?php if ($aabot_topbar_linkedin_url != '#'): ?>
            <li><a href="<?php print esc_url($aabot_topbar_linkedin_url); ?>">
              <i class="fab fa-linkedin"></i>
            </a></li> 
        <?php endif; ?>

        <?php if ($aabot_topbar_pinterest_url != '#'): ?>
            <li><a href="<?php print esc_url($aabot_topbar_pinterest_url); ?>">
              <i class="fab fa-pinterest"></i>
            </a></li> 
        <?php endif; ?>
        </ul>
<?php 
}


/** 
 * [aabot_header_address description]
 * @return [type] [description]
 */
function aabot_message_icon() {
    $aabot_message_icon = get_template_directory_uri() . '/img/icon/message-icon.png';
    $aabot_message_icon = get_theme_mod('icon_message', $aabot_message_icon);

    ?>
        <?php if ($aabot_message_icon): ?>
            <img src="<?php print esc_url($aabot_message_icon); ?>" alt="<?php print esc_attr_e('Message Icon', 'aabot'); ?>">
        <?php endif; ?>
<?php 
}

/** 
 * [aabot_header_address description]
 * @return [type] [description]
 */
function aabot_phone_icon() {
    $aabot_phone_icon = get_template_directory_uri() . '/img/icon/phone-icon.png';
    $aabot_phone_icon = get_theme_mod('icon_phone', $aabot_phone_icon);

    ?>
        <?php if ($aabot_phone_icon): ?>
            <img src="<?php print esc_url($aabot_phone_icon); ?>" alt="<?php print esc_attr_e('Phone Icon', 'aabot'); ?>">
        <?php endif; ?>
<?php 
}


/** 
 * [aabot_header_address description]
 * @return [type] [description]
 */
function aabot_header_address() {
    $aabot_header_address    = get_theme_mod('aabot_header_address', '#');
    ?>
        <?php if ($aabot_header_address != '#'): ?>
            <span class="h-map"><i class="fas fa-map-marker-alt"></i><?php print esc_html($aabot_header_address); ?></span>
        <?php endif; ?>
<?php 
}

/** 
 * [aabot_header_time description]
 * @return [type] [description]
 */
function aabot_header_time() {
    $aabot_header_time            = get_theme_mod('aabot_header_time', '#');
    ?>
        <?php if ($aabot_header_time != '#'): ?>
            <span class="h-time"><i class="far fa-clock"></i> <?php print esc_html($aabot_header_time); ?> </span>
        <?php endif; ?>
<?php 
}


/** 
 * [aabot_header_phone_number description]
 * @return [type] [description]
 */
function aabot_header_phone_number() {
    $header_phone_number            = get_theme_mod('aabot_header_phone_number', '#');
    ?>
        <?php if ($header_phone_number != '#'): ?>
            <span><i class="fas fa-phone"></i> <?php print esc_html($header_phone_number); ?></span>
        <?php endif; ?>
<?php 
}


/** 
 * [aabot_header_email_address description]
 * @return [type] [description]
 */
function aabot_header_email_address() {
    $header_email_address            = get_theme_mod('aabot_header_email_address', '#');
    ?>
        <?php if ($header_email_address != '#'): ?>
            <span><i class="fas fa-envelope"></i> <?php print esc_html($header_email_address); ?></span>
        <?php endif; ?>
<?php 
}

function aabot_header_email_title() {
    $header_email_address_title            = get_theme_mod('aabot_header_email_title');
    ?>
        <?php if ($header_email_address_title): ?>
            <h5 class="theme-color"><?php print esc_html($header_email_address_title); ?> </h5>
        <?php endif; ?>
<?php 
}

function aabot_header_phone_title() {
    $header_phone_title            = get_theme_mod('aabot_header_phone_title');
    ?>
        <?php if ($header_phone_title): ?>
            <h5 class="theme-color"><?php print esc_html($header_phone_title); ?> </h5>
        <?php endif; ?>
<?php 
}


/** 
 * [aabot_header_button description]
 * @return [type] [description]
 */
function aabot_header_button() {
    $aabot_show_button      = get_theme_mod('aabot_show_button');
    $aabot_btn_text     = get_theme_mod('aabot_btn_text');
    $aabot_btn_link     = get_theme_mod('aabot_btn_link');

    if($aabot_show_button && !empty( $aabot_btn_text )): ?>
        <div class="f-right lp-none">
        <a href="<?php print esc_url($aabot_btn_link); ?>" class="uppercase btn header-btn"><?php print esc_html($aabot_btn_text); ?></a> 
        </div>   
    <?php endif; ?>

<?php 
} 

/** 
 * [aabot_contact_us description]
 * @return [type] [description]
 */
function aabot_contact_us() {
    $aabot_show_button      = get_theme_mod('aabot_contact_button');
    $aabot_contact_text     = get_theme_mod('aabot_contact_text');
    $aabot_contact_link     = get_theme_mod('aabot_contact_link');

    if($aabot_show_button && !empty( $aabot_contact_text )): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($aabot_contact_link); ?>" class="btn btn-icon btn-icon-green"><span><?php print esc_html_e('+', 'aabot'); ?></span><?php print esc_html($aabot_contact_text); ?></a>
    <?php endif; ?>

<?php 
} 

/** 
 * [aabot_make_a_call description]
 * @return [type] [description]
 */
function aabot_make_a_call() {
    $aabot_show_button      = get_theme_mod('aabot_call_button');
    $aabot_call_text     = get_theme_mod('aabot_call_text');
    $aabot_call_link     = get_theme_mod('aabot_call_link');

    if($aabot_show_button && !empty( $aabot_call_text )): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($aabot_call_link); ?>" class="btn-icon btn-icon-white"><i class="fas fa-phone"></i><?php print esc_html($aabot_call_text); ?></a>
    <?php endif; ?>

<?php 
} 

/** 
 * [aabot_header_menu description]
 * @return [type] [description]
 */
function aabot_header_menu() { ?>
    <?php 
        wp_nav_menu(array(
            'theme_location'    => 'main-menu',
            'menu_class'        => 'basic-menu',
            'container'         => '',
            'fallback_cb'       => 'aabot_Navwalker::fallback',
            'walker'            => new aabot_Navwalker
        ));
       ?>
    <?php 
}

/** 
 * [aabot_header_top_menu description]
 * @return [type] [description]
 */
function aabot_header_top_menu() { ?>

        <div class="top4-menu">
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'header-top-menu',
                'menu_class'        => 'list-inline',
                'container'         => '',
                'fallback_cb'       => 'aabot_Navwalker::fallback',
                'walker'            => new aabot_Navwalker
            ));
           ?>
        </div>
    <?php 
}


/** 
 * [header_social_profiles description]
 * @return [type] [description]
 */

function vome_footer_social_profiles() {
    $vome_footer_fb_url             = get_theme_mod('vome_footer_fb_url', '#');
    $vome_footer_twitter_url       = get_theme_mod('vome_footer_twitter_url', '#');
    $vome_footer_behance_url      = get_theme_mod('vome_footer_behance_url', '#');
    $vome_footer_youtube_url        = get_theme_mod('vome_footer_youtube_url', '#');
    $vome_footer_linkedin_url        = get_theme_mod('vome_footer_linkedin_url', '#');
    ?>
        <ul class="mb-0">
            <?php if ($vome_footer_fb_url): ?>
            <li class="facebook"><a href="<?php print esc_url($vome_footer_fb_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
            <?php endif; ?>

            <?php if ($vome_footer_twitter_url): ?>
            <li class="twitter"><a href="<?php print esc_url($vome_footer_twitter_url); ?>"><i class="fab fa-twitter"></i></a></li>
            <?php endif; ?>

            <?php if ($vome_footer_behance_url): ?>
            <li class="behance"><a href="<?php print esc_url($vome_footer_behance_url); ?>"><i class="fab fa-behance"></i></a></li>
            <?php endif; ?>

            <?php if ($vome_footer_youtube_url): ?>
            <li class="youtube"><a href="<?php print esc_url($vome_footer_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
            <?php endif; ?>

            <?php if ($vome_footer_linkedin_url): ?>
            <li class="linkedin"><a href="<?php print esc_url($vome_footer_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a></li>
            <?php endif; ?>
        </ul>
<?php 
}




/**
*
* vome footer
*/
add_action('vome_footer_style', 'vome_check_footer', 10);

function vome_check_footer() {
    $vome_footer_style = get_post_meta( get_the_ID(), 'vome_choice_footer_style', true );
    $vome_default_footer_style = get_theme_mod('choose_default_footer', 'footer-style-1' );
   

    if( $vome_footer_style == 'footer-style-1' ) {
        vome_footer_style_1();
    }
    elseif( $vome_footer_style == 'footer-style-2' ) {
        vome_footer_style_2();
    }
    elseif( $vome_footer_style == 'footer-style-3' ) {
        vome_footer_style_3();
    }
    elseif( $vome_footer_style == 'footer-style-4' ) {
        vome_footer_style_4();
    }
    else{

        /** default footer style **/
        if($vome_default_footer_style == 'footer-style-1'){
            vome_footer_style_1();
        }elseif($vome_default_footer_style == 'footer-style-2'){
           vome_footer_style_2();
        }elseif($vome_default_footer_style == 'footer-style-3'){
           vome_footer_style_3();
        }elseif($vome_default_footer_style == 'footer-style-4'){
           vome_footer_style_4();
        }

    }
}

/**
* footer  style 1 + default
*/
function vome_footer_style_1() {

    $vome_footer_bg_url_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    $vome_footer_bg_color_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    $vome_footer_logo = get_theme_mod('vome_footer_logo',get_template_directory_uri() . '/img/logo/logo.png');
    $vome_copyright_center =  has_nav_menu( 'footer-menu' ) ? 'col-xl-6 col-lg-6 col-md-6' : 'col-xl-12 col-lg-12 col-md-12 text-center';

    if( $vome_footer_bg_url_from_page ){
            $bg_img = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    }else{
            $bg_img = get_theme_mod('vome_footer_bg');
    }  

    if( $vome_footer_bg_color_from_page ){
            $bg_color = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    }else{
            $bg_color = get_theme_mod('vome_footer_bg_color');
    }      

?>

    <!-- start footer area -->
    <footer class="footer-area">
        <div class="footer-top-main pt-100 pb-30">
            <div class="container">
                <!-- footer-logo & socal -->
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <!-- start footer logo -->
                        <div class="footer-logo mb-30 f-left">
                            <img src="<?php print esc_url($vome_footer_logo); ?>" alt="<?php esc_attr__("Footer Logo", 'aabot'); ?>">
                        </div>
                        <!-- end footer logo -->
                    </div>
                    <!-- social -->
                    <div class="col-xl-10 col-lg-10 col-md-9">
                        <!-- start footer social -->
                        <div class="footer-social mb-80">
                            <?php print vome_footer_social_profiles(); ?>
                        </div>
                        <!-- end footer social -->
                    </div>
                </div>
                <!-- footer-content -->
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <?php dynamic_sidebar('footer-widget-one'); ?>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-4">
                                <?php dynamic_sidebar('footer-widget-two'); ?>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-4">
                                <?php dynamic_sidebar('footer-widget-three'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="footer-bottom-main">
            <div class="container">
                <div class="footer-area-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- start copyright -->
                            <div class="copy-right">
                                <p>Copyright © 2020 Example – All Rights Reserved</p>
                            </div>
                            <!-- end copyright -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- start footer menu -->
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Legal</a></li>
                                    <li><a href="#">Make Request</a></li>
                                </ul>
                            </div>
                            <!-- end footer menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </footer>
    <!-- end footer area -->

<?php 
}

/**
* footer  style 2
*/
function vome_footer_style_2() {

    $vome_footer_bg_url_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    $vome_footer_bg_color_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    $vome_footer_2_bg_left = get_theme_mod('vome_footer_2_bg_left');
    $vome_footer_2_bg_right = get_theme_mod('vome_footer_2_bg_right');
    $vome_footer_2_logo = get_theme_mod('vome_footer_2_logo');

    if( $vome_footer_bg_url_from_page ){
            $bg_img = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    }else{
            $bg_img = get_theme_mod('vome_footer_bg');
    }  

    if( $vome_footer_bg_color_from_page ){
            $bg_color = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    }else{
            $bg_color = get_theme_mod('vome_footer_bg_color');
    } 
?>

        </main>

        <footer>
            <!-- footer_start -->
            <div class="h2-footer-area black-bg position-relative fix">
                <!-- footer-bg -->
                <div class="footer-left-img">
                    <img src="<?php print esc_url($vome_footer_2_bg_left); ?>" alt="<?php print esc_attr__('Logo', 'vome'); ?>" >
                </div>
                <div class="footer-right-img">
                    <img src="<?php print esc_url($vome_footer_2_bg_right); ?>" alt="<?php print esc_attr__('Logo', 'vome'); ?>">
                </div>
                <!-- footer-content -->
                <div class="h2-footer-content pt-120 pb-100">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 ">
                                <div class="h2-footer-contnet-left">
                                    <div class="footer-icon"><img src="<?php print esc_url($vome_footer_2_logo); ?>" alt="<?php print esc_attr__('Logo', 'vome'); ?>"></div>
                                    <div class="footer-copyright"><p><?php print vome_copyright_text(); ?></p></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="h2-footer-contnet-right">
                                    <?php dynamic_sidebar('footer-2-widget'); ?>
                                    <div class="h2-footer-social">
                                        <?php print vome_footer_social_profiles(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer_end -->
        </footer>

<?php 
}

/**
* footer style 3
*/
function vome_footer_style_3() {
    $vome_footer_bg_url_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    $vome_footer_bg_color_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    $vome_footer_3_logo = get_theme_mod('vome_footer_3_logo');

    if( $vome_footer_bg_url_from_page ){
            $bg_img = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    }else{
            $bg_img = get_theme_mod('vome_footer_bg');
    }  

    if( $vome_footer_bg_color_from_page ){
            $bg_color = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    }else{
            $bg_color = get_theme_mod('vome_footer_bg_color');
    } 
?>

        </main>

        <footer>
            <!-- footer_start -->
                <div class="footer-wrap">
                    <div class="footer-top-main pt-100 pb-30">
                        <div class="container">
                            <!-- footer-logo & socal -->
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-3">
                                    <div class="h3-footer-logo mb-30 f-left">
                                        <img src="<?php print esc_url($vome_footer_3_logo); ?>" alt="<?php print esc_attr__('Logo', 'vome'); ?>">
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="col-xl-10 col-lg-10 col-md-9">
                                    <div class="h3-footer-social f-right mb-80">
                                        <?php print vome_footer_social_profiles(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-content -->
                            <div class="row">
                                <div class="col-xl-7 col-lg-6">
                                    <div class="h3-footer-tittle mb-30">
                                        <?php dynamic_sidebar('footer-3-widget-one'); ?>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-6 col-md-4">
                                            <?php dynamic_sidebar('footer-3-widget-two'); ?>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-4">
                                            <?php dynamic_sidebar('footer-3-widget-three'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer-bottom -->
                    <div class="footer-bottom-main">
                        <div class="container">
                            <div class="footer-area-bottom footer-area-bottom2 fix">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="copy-right copy-right2 f-left">
                                            <p><?php print vome_copyright_text(); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="footer-social footer-terms f-right">
                                            <?php print vome_footer_menu(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            <!-- footer_end -->
        </footer>

<?php 
}

/**
* footer style 4 
*/
function vome_footer_style_4() {
    $vome_footer_bg_url_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    $vome_footer_bg_color_from_page = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    $vome_footer_4_logo = get_theme_mod('vome_footer_4_logo');

    if( $vome_footer_bg_url_from_page ){
            $bg_img = get_post_meta( get_the_ID(), 'vome_footer_bg', true );
    }else{
            $bg_img = get_theme_mod('vome_footer_bg');
    }  

    if( $vome_footer_bg_color_from_page ){
            $bg_color = get_post_meta( get_the_ID(), 'vome_footer_bg_color', true );
    }else{
            $bg_color = get_theme_mod('vome_footer_bg_color');
    } 
?>


        </main>

        <footer class="black-bg">
            <!-- footer_stat -->
            <div class="footer-4-wrapper pt-120">
                <div class="container">
                    <div class="f-4-border">
                        <div class="f-4-logo-border">
                            <div class="row">
                                <div class="col-xl-5 col-lg-2 col-md-3">
                                    <div class="h4-footer-logo mb-30">
                                        <img src="<?php print esc_url($vome_footer_4_logo); ?>" alt="Footer Logo">
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="col-xl-7 col-lg-10 col-md-9">
                                    <div class="h4-footer-social text-left text-md-right mb-30">
                                        <?php print vome_footer_social_profiles(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-box">
                            <div class="row">
                                <?php dynamic_sidebar('footer-4-widget'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-wrap">
                <div class="footer-bottom-main pt-30 pb-30">
                   <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="copy-right text-center">
                                    <p><?php print vome_copyright_text(); ?></p>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- footer_end -->
        </footer>
<?php 
}







/** 
 * [header_social_profiles description]
 * @return [type] [description]
 */
function aabot_footer_social() {
    $footer_fb_url          = get_theme_mod('footer_fb_url', '#');
    $footer_twitter_url     = get_theme_mod('footer_twitter_url', '#');
    $footer_behance_url     = get_theme_mod('footer_behance_url', '#');
    $footer_google_url      = get_theme_mod('footer_google_url', '#');
    $footer_instagram_url   = get_theme_mod('footer_instagram_url', '#');
    ?>
    <div class="footer-icon">
        <?php 
        if ($footer_fb_url): ?>
          <a href="<?php print esc_url($footer_fb_url); ?>">
              <i class="fab fa-facebook-f"></i>
          </a><?php 
          endif; ?>

        <?php 
        if ($footer_twitter_url): ?>
          <a href="<?php print esc_url($footer_twitter_url); ?>">
              <i class="fab fa-twitter"></i>
          </a><?php 
          endif; ?>

        <?php 
        if ($footer_behance_url): ?>
          <a href="<?php print esc_url($footer_behance_url); ?>">
              <i class="fab fa-behance-square"></i>
          </a><?php 
          endif; ?>

        <?php 
        if ($footer_google_url): ?>
          <a href="<?php print esc_url($footer_google_url); ?>">
              <i class="fab fa-google-plus-g"></i>
          </a>
          <?php 
          endif; ?>

        <?php 
        if ($footer_instagram_url): ?>
          <a href="<?php print esc_url($footer_instagram_url); ?>">
              <i class="fab fa-instagram"></i>
          </a> <?php 
          endif; ?>
    </div>
<?php 
}

add_action('aabot_footer','aabot_footer_social',20);

function aabot_copyright_text(){
    return get_theme_mod('aabot_copyright', esc_html__('Copyright ©2020 BasicTheme. All Rights Reserved','aabot'));
}





/** 
 * [aabot_breadcrumb_func description]
 * @return [type] [description]
 */
function aabot_breadcrumb_func() { 
    $aabot_invisible_breadcrumb = get_post_meta( get_the_ID(), 'aabot_invisible_breadcrumb', true );
    if( !$aabot_invisible_breadcrumb ) {

        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $breadcrumb_blog_title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_blog_title_details = get_theme_mod('breadcrumb_blog_title_details','Blog Details');

        $aabot_blog_breadcrumb = get_theme_mod('aabot_blog_breadcrumb', '');
        if ( is_front_page() && is_home() ) { ?>
            <div class="breadcrumb-area breadcrumb-bg front-home">
                <div class="breadcrumb-bg gray-bg front-page-space" data-background="<?php print esc_attr($bg_img);?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title text-center">
                                    <h2><?php print esc_html($breadcrumb_blog_title); ?> </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php   
        } elseif ( is_front_page()){?>
        <div class="breadcrumb-area breadcrumb-bg only-front-page">
        </div>
        <?php
        } elseif ( is_home()){ ?>

            <div class="breadcrumb-area breadcrumb-bg gray-bg breadcrumb-blog-area pt-170 pb-160 breadcrumb-spacing" data-background="<?php print esc_attr($bg_img);?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title text-center">
                                <?php 
                                if ( is_single() && 'post' == get_post_type() ) { 
                                    if ( $aabot_blog_breadcrumb == '' ) { ?>
                                        <h2><?php print esc_html($breadcrumb_blog_title_details); ?></h2>
                                    <?php 
                                    }
                                    else { ?>
                                        <h2> <?php print esc_html($aabot_blog_breadcrumb);?></h2>
                                    <?php 
                                    } ?>
                                    
                                    <?php 
                                }
                                else { ?>
                                    <h2><?php wp_title(''); ?></h2>
                                <?php 
                                } ?>
                                <nav>
                                    <ol class="breadcrumb-menu">
                                        <?php aabot_breadcrumbs(); ?>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        else { ?>
            <div class="breadcrumb-area breadcrumb-bg gray-bg secondary-bg breadcrumb-area breadcrumb-others-page pt-170 pb-160 breadcrumb-spacing" data-background="<?php print esc_attr($bg_img);?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title text-center">
                                <?php 
                                if ( is_single() && 'post' == get_post_type() ) { 
                                    if ( $aabot_blog_breadcrumb == '' ) { ?>
                                        <h2><?php print esc_html($breadcrumb_blog_title_details); ?></h2>
                                    <?php 
                                    }
                                    else { ?>
                                        <h2> <?php print esc_html($aabot_blog_breadcrumb);?></h2>
                                    <?php 
                                    } ?>
                                    
                                    <?php 
                                }
                                else { ?>
                                    <h2><?php wp_title(''); ?></h2>
                                <?php 
                                } ?>
                                <nav>
                                    <ol class="breadcrumb-menu">
                                        <?php aabot_breadcrumbs(); ?>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }       
    }
}
add_action('aabot_before_main_content', 'aabot_breadcrumb_func');


// gru_search_form
function aabot_search_form() { ?>
        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                        <input type="search" name="s" value="<?php print esc_attr( get_search_query() ) ?>" placeholder="<?php print esc_attr('Search here...', 'gru'); ?>">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

    <?php 
}

add_action('aabot_before_main_content', 'aabot_search_form');


if(!function_exists('aabot_breadcrumbs')) {

    function _aabot_home_callback($home) {
        return $home;
    }

    function _aabot_breadcrumbs_callback($breadcrumbs) {
        return $breadcrumbs;
    }

    function aabot_breadcrumbs() {
        global $post;

        $breadcrumb_archive = get_theme_mod('breadcrumb_archive','Archive for category ');
        $breadcrumb_search = get_theme_mod('breadcrumb_search','Search results for ');
        $breadcrumb_post_tags = get_theme_mod('breadcrumb_post_tags','Posts tagged ');
        $breadcrumb_artitle_post_by = get_theme_mod('breadcrumb_artitle_post_by','Articles posted by ');
        $breadcrumb_404 = get_theme_mod('breadcrumb_404','Page Not Found ');
        $breadcrumb_page = get_theme_mod('breadcrumb_page','Page ');
        $breadcrumb_shop = get_theme_mod('breadcrumb_shop','Shop ');
        $breadcrumb_home = get_theme_mod('breadcrumb_home','Home ');

        $home = '<li class="breadcrumb-list"><a href="'.esc_url(home_url('/')).'" title="'.esc_attr($breadcrumb_home).'">'.esc_html($breadcrumb_home).'</a></li>';
        $showCurrent = 1;               
        $homeLink = esc_url(home_url('/'));
        if ( is_front_page() ) { return; }  // don't display breadcrumbs on the homepage (yet)

        print _aabot_home_callback($home);

        if ( is_category() ) {
            // category section
            $thisCat = get_category(get_query_var('cat'), false);
            if (!empty($thisCat->parent)) print get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
            print '<li class="active">'.  esc_html($breadcrumb_archive).' "' . single_cat_title('', false) . '"' . '</li>';
        } 
        elseif ( is_search() ) {
            // search section
            print '<li class="active">' .  esc_html($breadcrumb_search).' "' . get_search_query() . '"' .'</li>';
        } 
        elseif ( is_day() ) {
            print '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            print '<li class="breadcrumb-list"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
            print '<li class="active">' . get_the_time('d') .'</li>';
        } 
        elseif ( is_month() ) {
            // monthly archive
            print '<li class="breadcrumb-list"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
            print '<li class=" active">' . get_the_time('F') .'</li>';
        } 
        elseif ( is_year() ) {
            // yearly archive
            print '<li class="active">'. get_the_time('Y') .'</li>';
        } 
        elseif ( is_single() && !is_attachment() ) {
            // single post or page
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                print '<li class="breadcrumb-list"><a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
                if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
            } 
            else {
                $cat = get_the_category(); if (isset($cat[0])) {$cat = $cat[0];} else {$cat = false;}
                if ($cat) {$cats = get_category_parents($cat, TRUE, ' ' .' ' . ' ');} else {$cats=false;}
                if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
                print '<li class="breadcrumb-list">'.$cats.'</li>';
                if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
            }
        } 
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            // some other single item
            $post_type = get_post_type_object(get_post_type());
            print '<li class="breadcrumb-list">' . $post_type->labels->singular_name .'<li>';
            if ( function_exists('is_shop') AND is_shop() && !get_query_var('paged') ) {
                print '<span class="active">'. esc_html($breadcrumb_shop) .'</span>';
            }
        } 
        elseif ( is_attachment() ) {
            // attachment section
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); if (isset($cat[0])) {$cat = $cat[0];} else {$cat=false;}
            if ($cat) print get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
            print '<li class="breadcrumb-list"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
            if ($showCurrent) print  '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_page() && !$post->post_parent ) {

            // parent page
            if ($showCurrent) 
                print '<li class="breadcrumb-list"><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';
        } 
        elseif ( is_page() && $post->post_parent ) {
            // child page
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();

            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-list"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                print _aabot_breadcrumbs_callback($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1);
            }
            if ($showCurrent) print '<li class="active">'. get_the_title() .'</li>';
        } 
        elseif ( is_tag() ) {
            // tags archive
            print '<li class="breadcrumb-list">' .  esc_html($breadcrumb_post_tags).' "' . single_tag_title('', false) . '"' . '</li>';
        } 
        elseif ( is_author() ) {
            // author archive 
            global $author;
            $userdata = get_userdata($author);
            print '<li class="breadcrumb-list">' .  esc_html($breadcrumb_artitle_post_by). ' ' . $userdata->display_name . '</li>';
        } 
        elseif ( is_404() ) {
            // 404
            print '<li class="active salim">'. esc_html($breadcrumb_404) .'</li>';
        }
      
        if ( get_query_var('paged') ) {

            if ( function_exists('is_shop') AND is_shop() ) {
                print '<span class="active">'. esc_html($breadcrumb_page) . ' ' . get_query_var('paged') .'</span>';
            }
            else {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print '<li class="breadcrumb-list"> (';
                print  '<li class="active">'.esc_html($breadcrumb_page) . ' ' . get_query_var('paged').'</li>';
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print ')</li>';
            }

        }
    }
}

/**
*
* pagination
*/
if( !function_exists('aabot_pagination') ) {

    function _aabot_pagi_callback($home) {
        return $home;
    }

    //page navegation
    function aabot_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        
        if( $pages=='' ){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            
            if(!$pages)
                $pages = 1;
        }

        $pagination = array(
            'base' => add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        //rewrite permalinks
        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        $pagi = '';
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
                        foreach ($paginations as $key => $pg) {
                            $pagi.= '<li>'.$pg.'</li>';
                        }
            $pagi .= '</ul>';
        }

        print _aabot_home_callback($pagi);
    }
}


add_action('admin_print_scripts', 'aabot_scripts_for_admin_panel', 1000);

function aabot_scripts_for_admin_panel(){
    if( get_post_type() == 'post' ) :
    ?>
        <script>
            (function ($) {
            "use strict";
                jQuery(document).ready(function(){

                    var tanveer = jQuery("input[name='post_format']:checked").attr('id');

                    if(tanveer == 'post-format-video'){
                        jQuery('.cmb2-id--video-url').show();
                    }else{
                        jQuery('.cmb2-id--video-url').hide();
                    }

                    if(tanveer == 'post-format-audio'){
                        jQuery('.cmb2-id--audio-url').show();
                    }else{
                        jQuery('.cmb2-id--audio-url').hide();
                    }

                    if(tanveer == 'post-format-gallery'){
                        jQuery('.cmb2-id--gallery-images').show();
                    }else{
                        jQuery('.cmb2-id--gallery-images').hide();
                    }

                    jQuery('input[name="post_format"]').change(function(){

                        var tanveer = jQuery("input[name='post_format']:checked").attr('id');

                        if(tanveer == 'post-format-video'){
                            jQuery('.cmb2-id--video-url').show();
                        }else{
                            jQuery('.cmb2-id--video-url').hide();
                        }

                        if(tanveer == 'post-format-audio'){
                            jQuery('.cmb2-id--audio-url').show();
                        }else{
                            jQuery('.cmb2-id--audio-url').hide();
                        }

                        if(tanveer == 'post-format-gallery'){
                            jQuery('.cmb2-id--gallery-images').show();
                        }else{
                            jQuery('.cmb2-id--gallery-images').hide();
                        }
                    });
                })

            })(jQuery);
        </script>

    <?php endif;

}


// breadcrumb bg color
function aabot_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'aabot_breadcrumb_bg_color','#FFF9F9');
    wp_enqueue_style( 'aabot-breadcrumb-bg', AABOT_THEME_CSS_DIR . 'aabot-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('aabot-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aabot_breadcrumb_bg_color');

// breadcrumb-spacing top
function aabot_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'aabot_breadcrumb_spacing','250px');
    wp_enqueue_style( 'aabot-breadcrumb-top-spacing', AABOT_THEME_CSS_DIR . 'aabot-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('aabot-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aabot_breadcrumb_spacing');

// breadcrumb-spacing bottom
function aabot_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'aabot_breadcrumb_bottom_spacing','150px');
    wp_enqueue_style( 'aabot-breadcrumb-bottom-spacing', AABOT_THEME_CSS_DIR . 'aabot-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('aabot-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aabot_breadcrumb_bottom_spacing');




// slider 3 height
function aabot_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'aabot_scrollup_switch');
    wp_enqueue_style( 'aabot-scrollup-switch', AABOT_THEME_CSS_DIR . 'aabot-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('aabot-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'aabot_scrollup_switch');


