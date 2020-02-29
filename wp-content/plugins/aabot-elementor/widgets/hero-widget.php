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
class AabotHero extends \Elementor\Widget_Base {

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
		return 'aabot-hero';
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
		return __( 'Hero', 'aabot-elementor' );
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
			'section_content_hero',
			[
				'label' => esc_html__( 'Hero', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'hero_red_shape',
			[
				'label'   => esc_html__( 'Hero Red Shape Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your hero image', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'hero_line_shape1',
			[
				'label'   => esc_html__( 'Hero Line 1 Shape Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your hero image', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'hero_line_shape2',
			[
				'label'   => esc_html__( 'Hero Line 2 Shape Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your hero image', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'hero_image',
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
			'hero_btn1_text',
			[
				'label'       => __( 'Button 1 Text', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Download CV', 'aabot-elementor' ),
				'default'     => __( 'Download CV', 'aabot-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_btn1_url',
			[
				'label'       => __( 'Button 1 Url', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://wordpress.org/', 'aabot-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_btn2_text',
			[
				'label'       => __( 'Button 2 Text', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Learn More', 'aabot-elementor' ),
				'default'     => __( 'Learn More', 'aabot-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_btn2_url',
			[
				'label'       => __( 'Button 2 Url', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://wordpress.org/', 'aabot-elementor' ),
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

		<?php
		$hero_red_image_src = wp_get_attachment_image_src( $settings['hero_red_shape']['id'], 'full' );
		$hero_red_shape = $hero_red_image_src ? $hero_red_image_src[0] : '';

		$hero_line_shape1_src = wp_get_attachment_image_src( $settings['hero_line_shape1']['id'], 'full' );
		$hero_line_shape1 = $hero_line_shape1_src ? $hero_line_shape1_src[0] : '';

		$hero_line_shape2_src = wp_get_attachment_image_src( $settings['hero_line_shape2']['id'], 'full' );
		$hero_line_shape2 = $hero_line_shape2_src ? $hero_line_shape2_src[0] : '';

		$hero_image_src = wp_get_attachment_image_src( $settings['hero_image']['id'], 'full' );
		$hero_image = $hero_image_src ? $hero_image_src[0] : '';
		?>
		<section id="home" class="hero-area">
			<?php if ($hero_red_shape) : ?>
				<div class="red-shape">
					<img src="<?php print esc_url($hero_red_shape); ?>" alt="shape-angle">
				</div>
			<?php endif; ?>

			<?php if ($hero_line_shape1 || $hero_line_shape2) : ?>
				<div class="line-shape">
					<img class="line-shape-1" src="<?php print esc_url($hero_line_shape1); ?>" alt="shape-line-1">
					<img class="line-shape-2" src="<?php print esc_url($hero_line_shape2); ?>" alt="shape-line-2">
				</div>
			<?php endif; ?>


			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="slider-content">

							<?php if ($settings['hero_sub_title']) : ?>
								<span class="sub-title"><?php echo wp_kses_post($settings['hero_sub_title']); ?></span>
							<?php endif; ?>

							<?php if ($settings['hero_title']) : ?>
								<h2><?php echo wp_kses_post($settings['hero_title']); ?></h2>
							<?php endif; ?>

							<?php if ($settings['hero_desc']) : ?>
								<p><?php echo wp_kses_post($settings['hero_desc']); ?></p>
							<?php endif; ?>

							<div class="slider-btn mt-40 pl-50">
								<?php if ($settings['hero_btn1_text']) : ?>
									<a href="<?php echo esc_html($settings['hero_btn1_url']); ?>" class="a-btn">
										<i class="far fa-download"></i>
										<?php echo esc_html($settings['hero_btn1_text']); ?>
									</a>
								<?php endif; ?>
								<?php if ($settings['hero_btn2_text']) : ?>
									<a href="<?php echo esc_html($settings['hero_btn1_url']); ?>" class="a-btn s-btn">
										<i class="far fa-arrow-right"></i>
										<?php echo esc_html($settings['hero_btn2_text']); ?>
									</a>
								<?php endif; ?>
							</div>

						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<?php if ($hero_image) : ?>
							<div class="slider-thumb">
								<div class="shape"></div>
								<img class="thumb" src="<?php print esc_url($hero_image); ?>" alt="hero-thumb">
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php
	}

}
