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
class AabotSlider extends \Elementor\Widget_Base {

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
		return 'aabot-slider';
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
		return __( 'Slider', 'aabot-elementor' );
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
		return 'eicon-slideshow';
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
		return [ 'hero', 'carousel' ];
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
			'section_content_sliders',
			[
				'label' => esc_html__( 'Hero', 'aabot-elementor' ),
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
			'hero_title',
			[
				'label'       => __( 'Hero Title', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_sub_title',
			[
				'label'       => __( 'Hero Sub Title', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'aabot-elementor' ),
				'default'     => __( 'It is sub heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'hero_title_long',
			[
				'label'       => __( 'Hero Title Long', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Your Hero Title Long', 'aabot-elementor' ),
				'default'     => __( 'Hero Title Long', 'aabot-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'hero_desc',
			[
				'label'       => __( 'Hero Description', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Your Hero Description', 'aabot-elementor' ),
				'default'     => __( 'Hero Description', 'aabot-elementor' ),
				'label_block' => true,
			]
		);			

		$this->add_control(
			'tab_phone',
			[
				'label'       => __( 'Hero Phone', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Phone', 'aabot-elementor' ),
				'default'     => __( '+33 (0)1 48 87 08 19', 'aabot-elementor' ),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'tab_email',
			[
				'label'       => __( 'Hero Email', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Email', 'aabot-elementor' ),
				'default'     => __( 'quart@hexbo.com', 'aabot-elementor' ),
				'label_block' => true,
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

		$this->add_control(
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);			

		$this->add_control(
			'shape_switch',
			[
				'label'   => esc_html__( 'Show Shape', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);			

		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract( $settings);
		?>

        <section class="slider-area theme-bg">
            <div class="container-fluid">
                <div class="slider-overflow">
					<?php 
				   	if ( '' !== $settings['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $settings['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
					<?php endif; ?>
                    <div class="row justify-content-between">
                        <div class="col-xl-5 col-lg-5">
                            <div class="slider-content">
                            	<?php if ($settings['hero_title']) : ?>
                                <h2 class="wow fadeInLeft" data-wow-delay="0.2s"><?php echo wp_kses_post($settings['hero_title']); ?></h2>
                                <?php endif; ?>	
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="avatar-info wow fadeInRight" data-wow-delay="0.2s">
                            	<?php if ($settings['hero_sub_title']) : ?>
                                <h6><?php echo wp_kses_post($settings['hero_sub_title']); ?></h6>
                                <?php endif; ?>
                                <?php if ($settings['hero_title_long']) : ?>
                                <h3><?php echo wp_kses_post($settings['hero_title_long']); ?></h3>
                                <?php endif; ?>
                                <?php if ($settings['hero_desc']) : ?>
                                <p><?php echo wp_kses_post($settings['hero_desc']); ?></p>
                                <?php endif; ?>
                                <ul>
                                	<?php if ($settings['tab_phone']) : ?>
                                    <li>
                                    	<a href="tel:<?php echo wp_kses_post($settings['tab_phone']); ?>">
                                    	P : <?php echo wp_kses_post($settings['tab_phone']); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if ($settings['tab_email']) : ?>
                                    <li>
                                    	<a href="mailto:<?php echo wp_kses_post($settings['tab_email']); ?>">E : <?php echo wp_kses_post($settings['tab_email']); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if ($image) : ?>
                    <div class="slider-img">
                        <img src="<?php print esc_url($image); ?>" alt="img">
                    </div>
                    <?php endif; ?>

                    <div class="slider-social">
                        <ul>
                            <li><a href="#">FB</a></li>
                            <li><a href="#">TW</a></li>
                            <li><a href="#">BE</a></li>
                        </ul>
                    </div>
                    <div class="slider-circle"></div>

					<?php if ($settings['shape_switch']) : ?>
                    <div class="slider-shape">
                    	<img src="<?php print get_template_directory_uri(); ?>/img/slider/slider_shape01.png" alt="img" data-paroller-factor="0.1" data-paroller-type="foreground" data-paroller-direction="vertical">
                    </div>
                    <div class="slider-shape s-shape-two">
                    	<img src="<?php print get_template_directory_uri(); ?>/img/slider/slider_shape02.png" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>	

	<?php
	}

}
