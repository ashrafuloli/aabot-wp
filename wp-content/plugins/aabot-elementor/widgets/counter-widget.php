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
class AabotCounter extends \Elementor\Widget_Base {

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
		return 'aabot-counter';
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
		return __( 'Counter', 'aabot-elementor' );
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
		return 'eicon-counter';
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
		return [ 'hero', 'counter' ];
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
			'section_content_counter',
			[
				'label' => esc_html__( 'Counter', 'aabot-elementor' ),
			]
		);



		$this->add_control(

			'counters',
			[
				'label' => esc_html__( 'Counter Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'title'   => esc_html__( 'Projects Done', 'aabot-elementor' ),
						'number' => esc_html__( '500', 'aabot-elementor' ),
						'dot_color' => 'egg-blue',
					],
					[
						'title'   => esc_html__( 'Happy Users', 'aabot-elementor' ),
						'number' => esc_html__( '40', 'aabot-elementor' ),
						'dot_color' => 'yellow',
					],
					[
						'title'   => esc_html__( 'Get Awards', 'aabot-elementor' ),
						'number' => esc_html__( '10', 'aabot-elementor' ),
						'dot_color' => 'purple',
					],
					[
						'title'   => esc_html__( 'Cup Of Coffee', 'aabot-elementor' ),
						'number' => esc_html__( '8k', 'aabot-elementor' ),
						'dot_color' => 'egg-blue',
					],
				],
				'fields' => [
					[
						'name'       => 'title',
						'label'      => esc_html__( 'Title', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Projects Done', 'aabot-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '10' , 'aabot-elementor' ),
						'label_block' => true,
					],

					[
						'name'        => 'dot_color',
						'label'   => esc_html__( 'Dot Color', 'aabot-elementor' ),
						'type'    => Controls_Manager::SELECT,
						'options' => [
							'egg-blue' => esc_html__( 'Egg Blue', 'aabot-elementor' ),
							'yellow' => esc_html__( 'Yellow', 'aabot-elementor' ),
							'purple' => esc_html__( 'Purple', 'aabot-elementor' ),
							'custom' => esc_html__( 'Custom', 'aabot-elementor' ),
						],
						'default' => 'egg-blue',
					],

					[
						'name'        => 'dot_custom_color',
						'label'     => esc_html__( 'Dot Custom Color', 'aabot-elementor' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ff6666',
						'condition' => [
							'dot_color' => 'custom'
						],
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
				'description'  => 'Use align to match position',
				'default'      => 'center',
				'selectors' => [
					'{{WRAPPER}} .counter-wrap' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'counter_dots',
			[
				'label'   => esc_html__( 'Counter Dots', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'counter_suffix',
			[
				'label'   => esc_html__( 'Counter Suffix', 'aabot-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'none'    => [
						'title' =>esc_html__( 'None', 'aabot-elementor' ),
						'icon' => 'fa fa-ban',
					],
					'inline-block' => [
						'title' =>esc_html__( 'Show', 'aabot-elementor' ),
						'icon' => 'fa fa-eye',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-wrap h3:after' => 'display: {{VALUE}};'
				],
				'default' => 'inline-block',
			]
		);

		$this->add_control(
			'counter_shape',
			[
				'label'   => esc_html__( 'Counter Shape', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'counter_shape_color',
			[
				'label'     => esc_html__( 'Counter Shape Color', 'aabot-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffd0d0',
				'selectors' => [
					'{{WRAPPER}} .counter-bg:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract( $settings);
		?>

		<section class="counter-area">
			<div class="container <?php if($settings['counter_shape'] == 'yes') { echo 'counter-bg'; } ?>">
				<div class="row">
					<?php  foreach ( $settings['counters'] as $counter ) : ?>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<!-- start counter -->
						<div class="counter-wrap">

							<?php if ($settings['counter_dots'] == 'yes'): ?>
								<span class="shape <?php echo esc_attr($counter['dot_color']); ?>"
								      style="background: <?php if ($counter['dot_color'] == 'custom'){echo esc_attr($counter['dot_custom_color']);} ?>">
								</span>
							<?php endif; ?>

							<h3 class="counter">
								<?php echo wp_kses_post($counter['number']); ?>
							</h3>
							<h6><?php echo wp_kses_post($counter['title']); ?></h6>
						</div>
						<!-- end counter -->
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php
	}

}
