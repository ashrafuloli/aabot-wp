<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package hexi
 */

/**
*
* hexi header
*/
add_action('hexi_header_style', 'hexi_check_header', 10);

function hexi_check_header() {
    hexi_header_default();
}

/**
* default header style
*/
function hexi_header_default() {
    $hexi_header_side = get_theme_mod('hexi_header_side');
    $hexi_header_ride_info = get_theme_mod('hexi_header_ride_info');
    $evo_menu_column = get_theme_mod('hexi_header_ride_info') ? '7': '10' ;
    $hexi_menu_center = get_theme_mod('hexi_header_ride_info') ? 'left': 'right' ;
    ?>
    <!-- header strat -->
    <header id="sticky-header" class="transparent-menu pt-40 pb-40">
        <div class="container-fluid header-container-p">
            <div class="row">
                <div class="col-xl-12">
                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">

                            <?php hexi_header_logo(); ?>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <?php hexi_header_menu(); ?>
                            </div>

                            <?php if ($hexi_header_ride_info) : ?>    
                            <div class="header-link">
                                <a href="#" class="search-icon search-modal" data-toggle="modal" data-target="#search-modal"><i class="fal fa-search"></i></a>
                                <a href="#" class="sidebar-icon sidebar-menu menu-tigger">
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php hexi_slide_extra_info(); ?>
    </header>
    <!-- header end -->

<?php 
}


/** 
 * [hexi_slide_extra_info description]
 * @return [type] [description]
 */
function hexi_slide_extra_info() { 
    $hexi_logo_white = get_template_directory_uri() . '/img/logo/logo.png';
    $logo   = get_theme_mod('hexi_extra_info_logo', $hexi_logo_white);
    $office_address     = get_theme_mod('hexi_office_address');
    $phone_number   = get_theme_mod('hexi_phone_number');
    $email_address  = get_theme_mod('hexi_email_address');
    $portfolios     = get_theme_mod('hexi_portfolios');

    $hexi_extra_info_fb_url           = get_theme_mod('hexi_extra_info_fb_url');
    $hexi_extra_info_twitter_url      = get_theme_mod('hexi_extra_info_twitter_url');
    $hexi_extra_info_behance_url      = get_theme_mod('hexi_extra_info_behance_url');
    $hexi_extra_info_instagram_url    = get_theme_mod('hexi_extra_info_instagram_url');
    ?>
                       
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>

        <div class="logo-side mb-30">
            <a href="<?php print home_url(); ?>">
                <img src="<?php print esc_url( $logo ); ?>" alt="<?php print esc_attr__('Icon', 'hexi'); ?>">
            </a>
        </div>

        <div class="side-info mb-30">

            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Office Address', 'hexi'); ?></h4>
                <?php print wp_kses_post( $office_address ); ?>
            </div>

            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Phone Number', 'hexi'); ?></h4>
                <?php print wp_kses_post( $phone_number ); ?>
            </div>
            
            <div class="contact-list mb-30">
                <h4><?php print esc_html_e('Email Address', 'hexi'); ?></h4>
                <?php print wp_kses_post( $email_address ); ?>
            </div>
        </div>

        <div class="social-icon-right mt-20">
            <?php  if($hexi_extra_info_fb_url) : ?>
            <a href="<?php print esc_url( $hexi_extra_info_fb_url ); ?>">
                <i class="fab fa-facebook-f"></i>
            </a>
            <?php endif; ?>

            <?php  if($hexi_extra_info_twitter_url) : ?>
            <a href="<?php print esc_url( $hexi_extra_info_twitter_url ); ?>">
                <i class="fab fa-twitter"></i>
            </a>
            <?php endif; ?>
            
            <?php  if($hexi_extra_info_behance_url) : ?>
            <a href="<?php print esc_url( $hexi_extra_info_behance_url ); ?>">
                <i class="fab fa-google-plus-g"></i>
            </a>
            <?php endif; ?>

            <?php  if($hexi_extra_info_instagram_url) : ?>
            <a href="<?php print esc_url( $hexi_extra_info_instagram_url ); ?>">
                <i class="fab fa-instagram"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="offcanvas-overly"></div>

<?php } 


// favicon logo
function hexi_favicon_logo_func() {
    $hexi_favicon = get_template_directory_uri() . '/img/logo/favicon.png';
    $hexi_favicon_url = get_theme_mod('favicon_url', $hexi_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $hexi_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'hexi_favicon_logo_func');

// header logo
function hexi_header_logo() {
    ?>
            <?php 
            $hexi_logo_on = get_post_meta(get_the_ID(), 'hexi_enable_sec_logo', true);
            $hexi_logo = get_template_directory_uri() . '/img/logo/logo.png';
            $hexi_logo_white = get_template_directory_uri() . '/img/logo/logo-white.png';

            $hexi_retina_logo = get_template_directory_uri().'/img/logo/logo@2x.png';
            $hexi_retina_logo_white = get_template_directory_uri().'/img/logo/logo-white@2x.png';

            $hexi_retina_logo  = get_theme_mod('retina_logo',$hexi_retina_logo);
            $hexi_retina_logo_white  = get_theme_mod('retina_secondary_logo',$hexi_retina_logo_white);

            $hexi_site_logo = get_theme_mod('logo', $hexi_logo);
            $hexi_secondary_logo = get_theme_mod('seconday_logo', $hexi_logo_white);
            ?>
             
             <?php
            if( has_custom_logo()){
                the_custom_logo();
            }else{
                
                if($hexi_logo_on === 'on') { ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($hexi_secondary_logo); ?>" alt="<?php print esc_attr('logo','hexi'); ?>" />
                    </a>
                    <a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($hexi_retina_logo_white); ?>" alt="<?php print esc_attr('logo','hexi'); ?>" />
                    </a>
                <?php 
                }
                else{ ?>
                    <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($hexi_site_logo); ?>" alt="<?php print esc_attr('logo','hexi'); ?>" />
                    </a>
                    <a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($hexi_retina_logo); ?>" alt="<?php print esc_attr('logo','hexi'); ?>" />
                    </a>
                <?php 
                }
            }   
            ?>
    <?php 
} 


/** 
 * [hexi_header_social_profiles description]
 * @return [type] [description]
 */
function hexi_header_social_profiles() {
    $hexi_topbar_fb_url             = get_theme_mod('hexi_topbar_fb_url', '#');
    $hexi_topbar_instagram_url      = get_theme_mod('hexi_topbar_instagram_url', '#');
    $hexi_topbar_youtube_url        = get_theme_mod('hexi_topbar_youtube_url', '#');
    $hexi_topbar_linkedin_url       = get_theme_mod('hexi_topbar_linkedin_url', '#');
    $hexi_topbar_pinterest_url      = get_theme_mod('hexi_topbar_pinterest_url', '#');
    ?>
        <ul>
        <?php if ($hexi_topbar_fb_url != '#'): ?>
            <li><a href="<?php print esc_url($hexi_topbar_fb_url); ?>">
                  <i class="fab fa-facebook-f"></i>
              </a></li>
        <?php endif; ?>

        <?php if ($hexi_topbar_instagram_url != '#'): ?>
            <li><a href="<?php print esc_url($hexi_topbar_instagram_url); ?>">
                  <i class="fab fa-instagram"></i>
              </a></li>
        <?php endif; ?>

        <?php if ($hexi_topbar_youtube_url != '#'): ?>
            <li><a href="<?php print esc_url($hexi_topbar_youtube_url); ?>">
              <i class="fab fa-youtube"></i>
            </a></li>
        <?php endif; ?>

        <?php if ($hexi_topbar_linkedin_url != '#'): ?>
            <li><a href="<?php print esc_url($hexi_topbar_linkedin_url); ?>">
              <i class="fab fa-linkedin"></i>
            </a></li> 
        <?php endif; ?>

        <?php if ($hexi_topbar_pinterest_url != '#'): ?>
            <li><a href="<?php print esc_url($hexi_topbar_pinterest_url); ?>">
              <i class="fab fa-pinterest"></i>
            </a></li> 
        <?php endif; ?>
        </ul>
<?php 
}


/** 
 * [hexi_header_address description]
 * @return [type] [description]
 */
function hexi_message_icon() {
    $hexi_message_icon = get_template_directory_uri() . '/img/icon/message-icon.png';
    $hexi_message_icon = get_theme_mod('icon_message', $hexi_message_icon);

    ?>
        <?php if ($hexi_message_icon): ?>
            <img src="<?php print esc_url($hexi_message_icon); ?>" alt="<?php print esc_attr_e('Message Icon', 'hexi'); ?>">
        <?php endif; ?>
<?php 
}

/** 
 * [hexi_header_address description]
 * @return [type] [description]
 */
function hexi_phone_icon() {
    $hexi_phone_icon = get_template_directory_uri() . '/img/icon/phone-icon.png';
    $hexi_phone_icon = get_theme_mod('icon_phone', $hexi_phone_icon);

    ?>
        <?php if ($hexi_phone_icon): ?>
            <img src="<?php print esc_url($hexi_phone_icon); ?>" alt="<?php print esc_attr_e('Phone Icon', 'hexi'); ?>">
        <?php endif; ?>
<?php 
}


/** 
 * [hexi_header_address description]
 * @return [type] [description]
 */
function hexi_header_address() {
    $hexi_header_address    = get_theme_mod('hexi_header_address', '#');
    ?>
        <?php if ($hexi_header_address != '#'): ?>
            <span class="h-map"><i class="fas fa-map-marker-alt"></i><?php print esc_html($hexi_header_address); ?></span>
        <?php endif; ?>
<?php 
}

/** 
 * [hexi_header_time description]
 * @return [type] [description]
 */
function hexi_header_time() {
    $hexi_header_time            = get_theme_mod('hexi_header_time', '#');
    ?>
        <?php if ($hexi_header_time != '#'): ?>
            <span class="h-time"><i class="far fa-clock"></i> <?php print esc_html($hexi_header_time); ?> </span>
        <?php endif; ?>
<?php 
}


/** 
 * [hexi_header_phone_number description]
 * @return [type] [description]
 */
function hexi_header_phone_number() {
    $header_phone_number            = get_theme_mod('hexi_header_phone_number', '#');
    ?>
        <?php if ($header_phone_number != '#'): ?>
            <span><i class="fas fa-phone"></i> <?php print esc_html($header_phone_number); ?></span>
        <?php endif; ?>
<?php 
}


/** 
 * [hexi_header_email_address description]
 * @return [type] [description]
 */
function hexi_header_email_address() {
    $header_email_address            = get_theme_mod('hexi_header_email_address', '#');
    ?>
        <?php if ($header_email_address != '#'): ?>
            <span><i class="fas fa-envelope"></i> <?php print esc_html($header_email_address); ?></span>
        <?php endif; ?>
<?php 
}

function hexi_header_email_title() {
    $header_email_address_title            = get_theme_mod('hexi_header_email_title');
    ?>
        <?php if ($header_email_address_title): ?>
            <h5 class="theme-color"><?php print esc_html($header_email_address_title); ?> </h5>
        <?php endif; ?>
<?php 
}

function hexi_header_phone_title() {
    $header_phone_title            = get_theme_mod('hexi_header_phone_title');
    ?>
        <?php if ($header_phone_title): ?>
            <h5 class="theme-color"><?php print esc_html($header_phone_title); ?> </h5>
        <?php endif; ?>
<?php 
}


/** 
 * [hexi_header_button description]
 * @return [type] [description]
 */
function hexi_header_button() {
    $hexi_show_button      = get_theme_mod('hexi_show_button');
    $hexi_btn_text     = get_theme_mod('hexi_btn_text');
    $hexi_btn_link     = get_theme_mod('hexi_btn_link');

    if($hexi_show_button && !empty( $hexi_btn_text )): ?>
        <div class="f-right lp-none">
        <a href="<?php print esc_url($hexi_btn_link); ?>" class="uppercase btn header-btn"><?php print esc_html($hexi_btn_text); ?></a> 
        </div>   
    <?php endif; ?>

<?php 
} 

/** 
 * [hexi_contact_us description]
 * @return [type] [description]
 */
function hexi_contact_us() {
    $hexi_show_button      = get_theme_mod('hexi_contact_button');
    $hexi_contact_text     = get_theme_mod('hexi_contact_text');
    $hexi_contact_link     = get_theme_mod('hexi_contact_link');

    if($hexi_show_button && !empty( $hexi_contact_text )): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($hexi_contact_link); ?>" class="btn btn-icon btn-icon-green"><span><?php print esc_html_e('+', 'hexi'); ?></span><?php print esc_html($hexi_contact_text); ?></a>
    <?php endif; ?>

<?php 
} 

/** 
 * [hexi_make_a_call description]
 * @return [type] [description]
 */
function hexi_make_a_call() {
    $hexi_show_button      = get_theme_mod('hexi_call_button');
    $hexi_call_text     = get_theme_mod('hexi_call_text');
    $hexi_call_link     = get_theme_mod('hexi_call_link');

    if($hexi_show_button && !empty( $hexi_call_text )): ?>
        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php print esc_url($hexi_call_link); ?>" class="btn-icon btn-icon-white"><i class="fas fa-phone"></i><?php print esc_html($hexi_call_text); ?></a>
    <?php endif; ?>

<?php 
} 

/** 
 * [hexi_header_menu description]
 * @return [type] [description]
 */
function hexi_header_menu() { ?>
    <?php 
        wp_nav_menu(array(
            'theme_location'    => 'main-menu',
            'menu_class'        => 'navbar-nav basic-menu',
            'container'         => '',
            'fallback_cb'       => 'hexi_Navwalker::fallback',
            'walker'            => new hexi_Navwalker
        ));
       ?>
    <?php 
}

/** 
 * [hexi_header_top_menu description]
 * @return [type] [description]
 */
function hexi_header_top_menu() { ?>

        <div class="top4-menu">
            <?php 
            wp_nav_menu(array(
                'theme_location'    => 'header-top-menu',
                'menu_class'        => 'list-inline',
                'container'         => '',
                'fallback_cb'       => 'hexi_Navwalker::fallback',
                'walker'            => new hexi_Navwalker
            ));
           ?>
        </div>
    <?php 
}


/** 
 * [header_social_profiles description]
 * @return [type] [description]
 */

function hexi_footer_wrapper() { 
    $hexi_footer_text = get_theme_mod('hexi_footer_text'); 
    if( $hexi_footer_text ) { ?>

    <div class="footer-area blue-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                    <div class="footer-wrapper text-center">
                        <?php do_action('hexi_footer'); ?>
                    </div>
                </div>
            </div>
        </div>
      </div>

  <?php
  }
}

add_action('hexi_footer_wrapper','hexi_footer_wrapper',20);



/** 
 * [header_social_profiles description]
 * @return [type] [description]
 */
function hexi_footer_social() {
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

add_action('hexi_footer','hexi_footer_social',20);

function hexi_copyright_text(){
    return get_theme_mod('hexi_copyright', esc_html__('Copyright ©2020 BasicTheme. All Rights Reserved','hexi'));
}



/** 
 * [hexi_breadcrumb_func description]
 * @return [type] [description]
 */
function hexi_breadcrumb_func() { 
    $hexi_invisible_breadcrumb = get_post_meta( get_the_ID(), 'hexi_invisible_breadcrumb', true );
    if( !$hexi_invisible_breadcrumb ) {

        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $breadcrumb_blog_title = get_theme_mod('breadcrumb_blog_title','Blog ');
        $breadcrumb_blog_title_details = get_theme_mod('breadcrumb_blog_title_details','Blog Details');

        $hexi_blog_breadcrumb = get_theme_mod('hexi_blog_breadcrumb', '');
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
                                    if ( $hexi_blog_breadcrumb == '' ) { ?>
                                        <h2><?php print esc_html($breadcrumb_blog_title_details); ?></h2>
                                    <?php 
                                    }
                                    else { ?>
                                        <h2> <?php print esc_html($hexi_blog_breadcrumb);?></h2>
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
                                        <?php hexi_breadcrumbs(); ?>
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
                                    if ( $hexi_blog_breadcrumb == '' ) { ?>
                                        <h2><?php print esc_html($breadcrumb_blog_title_details); ?></h2>
                                    <?php 
                                    }
                                    else { ?>
                                        <h2> <?php print esc_html($hexi_blog_breadcrumb);?></h2>
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
                                        <?php hexi_breadcrumbs(); ?>
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
add_action('hexi_before_main_content', 'hexi_breadcrumb_func');


// gru_search_form
function hexi_search_form() { ?>
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

add_action('hexi_before_main_content', 'hexi_search_form');


if(!function_exists('hexi_breadcrumbs')) {

    function _hexi_home_callback($home) {
        return $home;
    }

    function _hexi_breadcrumbs_callback($breadcrumbs) {
        return $breadcrumbs;
    }

    function hexi_breadcrumbs() {
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

        print _hexi_home_callback($home);

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
                print _hexi_breadcrumbs_callback($breadcrumbs[$i]);
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
if( !function_exists('hexi_pagination') ) {

    function _hexi_pagi_callback($home) {
        return $home;
    }

    //page navegation
    function hexi_pagination( $prev, $next, $pages, $args ) {
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

        print _hexi_home_callback($pagi);
    }
}


add_action('admin_print_scripts', 'hexi_scripts_for_admin_panel', 1000);

function hexi_scripts_for_admin_panel(){
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
function hexi_breadcrumb_bg_color(){
    $color_code = get_theme_mod( 'hexi_breadcrumb_bg_color','#FFF9F9');
    wp_enqueue_style( 'hexi-breadcrumb-bg', HEXI_THEME_CSS_DIR . 'hexi-custom.css', array());
    if($color_code!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: ".$color_code."}";

        wp_add_inline_style('hexi-breadcrumb-bg',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'hexi_breadcrumb_bg_color');

// breadcrumb-spacing top
function hexi_breadcrumb_spacing(){
    $padding_px = get_theme_mod( 'hexi_breadcrumb_spacing','250px');
    wp_enqueue_style( 'hexi-breadcrumb-top-spacing', HEXI_THEME_CSS_DIR . 'hexi-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: ".$padding_px."}";

        wp_add_inline_style('hexi-breadcrumb-top-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'hexi_breadcrumb_spacing');

// breadcrumb-spacing bottom
function hexi_breadcrumb_bottom_spacing(){
    $padding_px = get_theme_mod( 'hexi_breadcrumb_bottom_spacing','150px');
    wp_enqueue_style( 'hexi-breadcrumb-bottom-spacing', HEXI_THEME_CSS_DIR . 'hexi-custom.css', array());
    if($padding_px!=''){
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: ".$padding_px."}";

        wp_add_inline_style('hexi-breadcrumb-bottom-spacing',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'hexi_breadcrumb_bottom_spacing');




// slider 3 height
function hexi_scrollup_switch(){
    $scrollup_switch = get_theme_mod( 'hexi_scrollup_switch');
    wp_enqueue_style( 'hexi-scrollup-switch', HEXI_THEME_CSS_DIR . 'hexi-custom.css', array());
    if($scrollup_switch){
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('hexi-scrollup-switch',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'hexi_scrollup_switch');


