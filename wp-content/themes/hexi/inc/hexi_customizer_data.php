<?php
/** 
 * hexi Customizer data
 */
function hexi_customizer( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'hexi',
			'name' => esc_html__('hexi Customizer','hexi'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'hexi' ),
					'priority' => 10,
					'fields' => array(							
						/** button **/							
						array(
							'name' => esc_html__( 'Show Button', 'hexi' ),
							'id' => 'hexi_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Side Bar', 'hexi' ),
							'id' => 'hexi_header_side',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Header Right', 'hexi' ),
							'id' => 'hexi_header_ride_info',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Button Text', 'hexi' ),
							'id' => 'hexi_btn_text',
							'default' => esc_html__('Get A Quote','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'hexi' ),
							'id' => 'hexi_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
					) 
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'hexi' ),
					'priority' => 11,
					'fields' => array(
						array(
							'name' => esc_html__( 'Header Logo', 'hexi' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Retina Logo', 'hexi' ),
							'id' => 'retina_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo@2x.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'hexi' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),

					) 
				),	
				'hexi_ex_setting'=> array(
					'name'=> esc_html__('Extra Info Setting','hexi'),
					'priority'=> 12,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Extra Info', 'hexi' ),
							'id' => 'hexi_show_extra_info',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name'=>esc_html__('Logo','hexi'),
							'id'=>'hexi_extra_info_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh'  
						),	
						array(
							'name' => esc_html__( 'Office Address', 'hexi' ),
							'id' => 'hexi_office_address',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Phone Number', 'hexi' ),
							'id' => 'hexi_phone_number',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Email Address', 'hexi' ),
							'id' => 'hexi_email_address',
							'default' => '#',
							'type' => 'textarea' 
						),
						array(
							'name' => esc_html__( 'Show Portfolios', 'hexi' ),
							'id' => 'hexi_portfolios',
							'default' => false,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Facebook Url', 'hexi' ),
							'id' => 'hexi_extra_info_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'hexi' ),
							'id' => 'hexi_extra_info_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Behance Url', 'hexi' ),
							'id' => 'hexi_extra_info_behance_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Google Plus Url', 'hexi' ),
							'id' => 'hexi_extra_info_google_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'hexi' ),
							'id' => 'hexi_extra_info_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
					)
				),
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','hexi'),
					'priority'=> 13,
					'fields'=> array(
						array(
							'name'=>esc_html__('Breadcrumb BG Color','hexi'),
							'id'=>'hexi_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','hexi'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','hexi'),
							'id'=>'hexi_breadcrumb_spacing',
							'default'=> esc_html__('160px','hexi'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','hexi'),
							'id'=>'hexi_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','hexi'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'hexi' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'hexi' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'hexi' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'hexi' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'hexi' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'hexi' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'hexi' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'hexi' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','hexi'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'hexi' ),
							'id' => 'hexi_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Show Blog Btn Icon', 'hexi' ),
							'id' => 'hexi_blog_btn_icon_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'hexi' ),
							'id' => 'hexi_blog_btn',
							'default' => esc_html__('Read More','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),							
						array(
							'name' => esc_html__( 'Blog Button Icon', 'hexi' ),
							'id' => 'hexi_blog_btn_icon',
							'default' => esc_html__('fas fa-angle-double-right','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Title', 'hexi' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'hexi' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','hexi'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','hexi'),
					'priority'=> 15,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Footer Social', 'hexi' ),
							'id' => 'hexi_footer_social_switch',
							'default' => false,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Facebook Url', 'hexi' ),
							'id' => 'footer_fb_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'hexi' ),
							'id' => 'vome_topbar_twitter_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Google Url', 'hexi' ),
							'id' => 'footer_google_url',
							'default' => '#',
							'type' => 'text' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'hexi' ),
							'id' => 'footer_instagram_url',
							'default' => '#',
							'type' => 'text'
						),						
						array(
							'name' => esc_html__( 'Behance Url', 'hexi' ),
							'id' => 'footer_behance_url',
							'default' => '#',
							'type' => 'text'
						),
						array(
							'name'=>esc_html__('Copyright','hexi'),
							'id'=>'hexi_copyright',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme All Rights Reserved ','hexi'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','hexi'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','hexi'),
							'id'=>'hexi_color_option',
							'default'=> esc_html__('#e12454','hexi'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Theme Sec Color','hexi'),
							'id'=>'hexi_sec_color_option',
							'default'=> esc_html__('#8fb569','hexi'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Theme btn Color','hexi'),
							'id'=>'hexi_theme_btn_color',
							'default'=> esc_html__('#e12454','hexi'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Theme btn sec Color','hexi'),
							'id'=>'hexi_btn_sec_color',
							'default'=> esc_html__('#8fb569','hexi'),
							'transport'	=> 'refresh'  
						)												
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','hexi'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','hexi'),
							'id'=>'hexi_error_404_text',
							'default'=> esc_html__('404','hexi'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','hexi'),
							'id'=>'hexi_error_title',
							'default'=> esc_html__('Page not found','hexi'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','hexi'),
							'id'=>'hexi_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','hexi'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','hexi'),
							'id'=>'hexi_error_link_text',
							'default'=> esc_html__('Back To Home','hexi'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'rtl_setting'=> array(
					'name'=> esc_html__('RTL Setting','hexi'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Switch RTL','hexi'),
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

add_filter('hexi_customizer_data', 'hexi_customizer');


