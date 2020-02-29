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
class AabotCTA extends \Elementor\Widget_Base {

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
		return 'aabot-cta';
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
		return __( 'CTA', 'aabot-elementor' );
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
		return [ 'cta' ];
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
			'section_content_features',
			[
				'label' => esc_html__( 'Call To Action', 'aabot-elementor' ),
			]	
		);

		$this->add_control(
			'tab_image',
			[
				'label'   => esc_html__( 'CTA BG Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your cta image', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'aabot-elementor' ),
				'default'     => __( 'Estimate Your Project', 'aabot-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'Don’t Worry For Contact', 'aabot-elementor' ),
				'label_block' => true,
			]
		);						

		$this->add_control(
			'cta_link',
			[
				'label'       => __( 'CTA Link', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://demo.net', 'aabot-elementor' ),
				'default'     => __( '#', 'aabot-elementor' ),
				'label_block' => true,
			]
		);			
		

		$this->end_controls_section();	

		/** 
		*	Layout section 
		**/
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

		<?php 
	   	if ( '' !== $settings['tab_image'] )  : 
	   		$image_src = wp_get_attachment_image_src( $settings['tab_image']['id'], 'full' );
			$image = $image_src ? $image_src[0] : ''; 
	   		?>
		<?php endif; ?>
        <section class="cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-bg wow fadeInUp" data-wow-delay="0.2s" style="background-image: url(<?php print esc_url($image); ?>)">
                            <div class="section-title white-title">
                            <?php if ($settings['sub_heading']) : ?>
                            <span  class="sub-title"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
                            <?php endif; ?>

                            <?php if ($settings['heading']) : ?>
                            <h2 class="title"><?php echo wp_kses_post($settings['heading']); ?></h2>
                            <?php endif; ?>
                            </div>

                            <div class="cta-link">
                                <a href="<?php echo wp_kses_post($settings['cta_link']); ?>"><i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php
	}

}