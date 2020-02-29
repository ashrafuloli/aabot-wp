<?php
namespace AabotElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Aabot Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class AabotContact extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Aabot Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aabot-contact';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Aabot Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Contact Form', 'aabot-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Aabot Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Aabot Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'aabot-elementor' ];
	}

	public function get_keywords() {
		return [ 'contact' ];
	}

	public function get_script_depends() {
		return [ 'aabot-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'aabot-elementor'),
	        'top-left'      => esc_html__('Top Left', 'aabot-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'aabot-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'aabot-elementor') ,
	        'center'        => esc_html__('Center', 'aabot-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'aabot-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'aabot-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'aabot-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'aabot-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'aabot-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Contact From', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'tab_image',
			[
				'label'   => esc_html__( 'Hero Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your hero image', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading_f',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'aabot-elementor' ),
				'default'     => __( 'Awesome Features', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'heading_f',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
			]
		);

		
		$this->add_control(
			'shortcode',
			[
				'label'   => esc_html__( 'Shortcode', 'aabot-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [ 'active' => true ],
				'default'		=> __('Contact Shortcode here', 'aabot-elementor'),
				'description' => esc_html__( 'Add Your shortcode here', 'aabot-elementor' ),
				'label_block' => true,
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'aabot-elementor' ),
				'default'     => __( 'Awesome Features', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Contact List', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Contact One', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Contact Two', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],					
					[
						'tab_title'   => esc_html__( 'Contact Three', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
				],
				'fields' => [	
					[
						'name'        => 'tab_icon',
						'label'       => esc_html__( 'Title', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_attr__( 'pe-7s-call' , 'aabot-elementor' ),
						'label_block' => true,
					],		

					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Sub Title', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Call Me Now', 'aabot-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Title here' , 'aabot-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'aabot-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'aabot-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'aabot-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'aabot-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'aabot-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'aabot-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);		

		$this->end_controls_section();
	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);		

	   	?>

 		<div class="theme-bg">
	        <div class="footer-top-wrap pb-110">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12">
							<?php 
						   	if ( '' !== $settings['tab_image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $settings['tab_image']['id'], 'full' );
								$image = $image_src ? $image_src[0] : ''; 
						   		?>
							<?php endif; ?>

							<?php if ($image) : ?>
	                        <div class="footer-logo text-center pb-115">
	                            <a href="<?php print home_url(); ?>"><img src="<?php print esc_url($image); ?>" alt="img"></a>
	                        </div>
	                        <?php endif; ?>

	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-lg-6">
	                        <div class="footer-widget wow fadeInLeft" data-wow-delay="0.2s">
	                        	<?php if (( $settings['sub_heading'] ) || ( $settings['heading'] )) : ?>
	                            <div class="section-title mb-55">
	                                <span class="sub-title"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
	                            	<h2 class="title"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                            </div>
	                            <?php endif; ?>
	                            <div class="footer-contact-list">
	                                <ul>
	                                	<?php  foreach ( $settings['tabs'] as $item ) : ?>
	                                    <li>
	                                        <div class="footer-contact-icon">
	                                            <i class="<?php echo wp_kses_post($item['tab_icon']); ?>"></i>
	                                        </div>
	                                        <div class="footer-contact-content">
	                                            <span><?php echo wp_kses_post($item['tab_content']); ?></span>
	                                            <h3><a><?php echo wp_kses_post($item['tab_title']); ?></a></h3>
	                                        </div>
	                                    </li>
	                                	<?php endforeach; ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-6 pl-75 wow fadeInRight" data-wow-delay="0.2s">
	                    	<?php if (( $settings['sub_heading_f'] ) || ( $settings['heading_f'] )) : ?>
	                        <div class="section-title mb-55">
	                            <span class="sub-title"><?php echo wp_kses_post($settings['sub_heading_f']); ?></span>
	                            <h2 class="title"><?php echo wp_kses_post($settings['heading_f']); ?></h2>
	                        </div>
	                        <?php endif; ?>
	                        <div class="footer-contact-form">
	                        	<?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        	
	<?php
	}

}