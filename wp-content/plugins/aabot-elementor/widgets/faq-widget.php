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
class AabotFAQ extends \Elementor\Widget_Base {

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
		return 'aabot-faq-info';
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
		return __( 'FAQ Info', 'aabot-elementor' );
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
		return [ 'faq info' ];
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
			'section_heading',
			[
				'label' => esc_html__( 'FAQ Section', 'aabot-elementor' ),
			]	
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'aabot-elementor' ),
				'default'     => __( 'It is sub heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);	

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_contact_info',
			[
				'label' => esc_html__( 'FAQ Info', 'aabot-elementor' ),
			]
		);


		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'FAQ Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Faq One', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Faq Two', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],					
					[
						'tab_title'   => esc_html__( 'Faq Three', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
				],
				'fields' => [	
					[
						'name'        => 'tab_icon',
						'label'       => esc_html__( 'Number', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_attr__( '01' , 'aabot-elementor' ),
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
					
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Contact Text', 'aabot-elementor' ),
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


		<section class="faq-area theme-bg">
            <div class="container">
                <div class="faq-area-p">
	            	<?php if (( $settings['sub_heading'] ) || ( $settings['heading'] )) : ?>
	                <div class="row justify-content-center">
	                    <div class="col-lg-6">
	                        <div class="section-title text-center mb-70">
	                            <span class="sub-title"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
	                            <h2 class="title"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                        </div>
	                    </div>
	                </div>
	                <?php endif; ?>
                    <div class="row">
						<?php  foreach ( $settings['tabs'] as $item ) : ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single-faq mb-30">
                                <div class="faq-top">
                                    <a>
                                        <span class="faq-count"><?php echo wp_kses_post($item['tab_icon']); ?></span>
                                        <h6><?php echo wp_kses_post($item['tab_title']); ?></h6>
                                        <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="faq-content">
                                    <p><?php echo wp_kses_post($item['tab_content']); ?></p>
                                </div>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        	
	<?php
	}

}