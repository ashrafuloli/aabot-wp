<?php
/** 
 * aabot Customizer data
 */
function aabot_customizer( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'aabot',
			'name' => esc_html__('Aabot Customizer','aabot'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'aabot' ),
					'priority' => 10,
					'fields' => array(							
						/** button **/							
						array(
							'name' => esc_html__( 'Show Button', 'aabot' ),
							'id' => 'aabot_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Side Bar', 'aabot' ),
							'id' => 'aabot_header_side',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Header Right', 'aabot' ),
							'id' => 'aabot_header_ride_info',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Button Text', 'aabot' ),
							'id' => 'aabot_btn_text',
							'default' => esc_html__('Get A Quote','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'aabot' ),
							'id' => 'aabot_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
					) 
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'aabot' ),
					'priority' => 11,
					'fields' => array(
						array(
							'name' => esc_html__( 'Header Logo', 'aabot' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina Logo', 'aabot' ),
							'id' => 'retina_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'aabot' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Sidebar Logo', 'aabot' ),
							'id' => 'sidebar_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh'
						),

					) 
				),	
				'aabot_ex_setting'=> array(
					'name'=> esc_html__('Extra Info Setting','aabot'),
					'priority'=> 12,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Extra Info', 'aabot' ),
							'id' => 'aabot_show_extra_info',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name'=>esc_html__('Logo','aabot'),
							'id'=>'aabot_extra_info_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh'  
						),	
						array(
							'name' => esc_html__( 'Office Address', 'aabot' ),
							'id' => 'aabot_office_address',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Phone Number', 'aabot' ),
							'id' => 'aabot_phone_number',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Email Address', 'aabot' ),
							'id' => 'aabot_email_address',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Show Portfolios', 'aabot' ),
							'id' => 'aabot_portfolios',
							'default' => false,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Facebook Url', 'aabot' ),
							'id' => 'aabot_extra_info_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'aabot' ),
							'id' => 'aabot_extra_info_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Behance Url', 'aabot' ),
							'id' => 'aabot_extra_info_behance_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Google Plus Url', 'aabot' ),
							'id' => 'aabot_extra_info_google_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'aabot' ),
							'id' => 'aabot_extra_info_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
					)
				),
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','aabot'),
					'priority'=> 13,
					'fields'=> array(
						array(
							'name'=>esc_html__('Breadcrumb BG Color','aabot'),
							'id'=>'aabot_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','aabot'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','aabot'),
							'id'=>'aabot_breadcrumb_spacing',
							'default'=> esc_html__('160px','aabot'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','aabot'),
							'id'=>'aabot_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','aabot'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'aabot' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'aabot' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'aabot' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'aabot' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'aabot' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'aabot' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'aabot' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'aabot' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','aabot'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'aabot' ),
							'id' => 'aabot_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Show Blog Btn Icon', 'aabot' ),
							'id' => 'aabot_blog_btn_icon_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'aabot' ),
							'id' => 'aabot_blog_btn',
							'default' => esc_html__('Read More','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),							
						array(
							'name' => esc_html__( 'Blog Button Icon', 'aabot' ),
							'id' => 'aabot_blog_btn_icon',
							'default' => esc_html__('fas fa-angle-double-right','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Title', 'aabot' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'aabot' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','aabot'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','aabot'),
					'priority'=> 15,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Footer Social', 'aabot' ),
							'id' => 'aabot_footer_social_switch',
							'default' => false,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Footer Logo', 'aabot' ),
							'id' => 'vome_footer_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Facebook Url', 'aabot' ),
							'id' => 'vome_footer_fb_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'aabot' ),
							'id' => 'vome_footer_twitter_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'aabot' ),
							'id' => 'vome_footer_youtube_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'aabot' ),
							'id' => 'vome_footer_linkedin_url',
							'default' => '#',
							'type' => 'text'
						),						
						array(
							'name' => esc_html__( 'Behance Url', 'aabot' ),
							'id' => 'vome_footer_behance_url',
							'default' => '#',
							'type' => 'text'
						),
						array(
							'name'=>esc_html__('Copyright','aabot'),
							'id'=>'aabot_copyright',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme All Rights Reserved ','aabot'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','aabot'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','aabot'),
							'id'=>'aabot_color_option',
							'default'=> esc_html__('#e12454','aabot'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Theme Sec Color','aabot'),
							'id'=>'aabot_sec_color_option',
							'default'=> esc_html__('#8fb569','aabot'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Theme btn Color','aabot'),
							'id'=>'aabot_theme_btn_color',
							'default'=> esc_html__('#e12454','aabot'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Theme btn sec Color','aabot'),
							'id'=>'aabot_btn_sec_color',
							'default'=> esc_html__('#8fb569','aabot'),
							'transport'	=> 'refresh'  
						)												
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','aabot'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','aabot'),
							'id'=>'aabot_error_404_text',
							'default'=> esc_html__('404','aabot'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','aabot'),
							'id'=>'aabot_error_title',
							'default'=> esc_html__('Page not found','aabot'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','aabot'),
							'id'=>'aabot_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','aabot'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','aabot'),
							'id'=>'aabot_error_link_text',
							'default'=> esc_html__('Back To Home','aabot'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'rtl_setting'=> array(
					'name'=> esc_html__('RTL Setting','aabot'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Switch RTL','aabot'),
							'id'=>'rtl_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						)
					)
				),
			),
		)
	);

}

add_filter('aabot_customizer_data', 'aabot_customizer');


