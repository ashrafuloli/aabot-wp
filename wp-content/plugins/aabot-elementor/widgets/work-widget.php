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
class AabotWork extends \Elementor\Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Aabot Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name()
	{
		return 'aabot-works';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Aabot Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title()
	{
		return __('Works', 'aabot-elementor');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Aabot Slider widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon()
	{
		return 'eicon-favorite';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Aabot Slider widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories()
	{
		return ['aabot-elementor'];
	}

	public function get_keywords()
	{
		return ['works'];
	}

	public function get_script_depends()
	{
		return ['aabot-elementor'];
	}

	// BDT Position
	protected function element_pack_position()
	{
		$position_options = [
			'' => esc_html__('Default', 'aabot-elementor'),
			'top-left' => esc_html__('Top Left', 'aabot-elementor'),
			'top-center' => esc_html__('Top Center', 'aabot-elementor'),
			'top-right' => esc_html__('Top Right', 'aabot-elementor'),
			'center' => esc_html__('Center', 'aabot-elementor'),
			'center-left' => esc_html__('Center Left', 'aabot-elementor'),
			'center-right' => esc_html__('Center Right', 'aabot-elementor'),
			'bottom-left' => esc_html__('Bottom Left', 'aabot-elementor'),
			'bottom-center' => esc_html__('Bottom Center', 'aabot-elementor'),
			'bottom-right' => esc_html__('Bottom Right', 'aabot-elementor'),
		];

		return $position_options;
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__('Section Heading', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __('Heading', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter your Heading', 'aabot-elementor'),
				'default' => __('How It Works', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __('Description', 'aabot-elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('This is Description', 'aabot-elementor'),
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_contact_info',
			[
				'label' => esc_html__('Works', 'aabot-elementor'),
			]
		);


		$this->add_control(

			'works',
			[
				'label' => esc_html__('Works Items', 'aabot-elementor'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'work_number' => '01',
						'work_title' => esc_html__('Works One', 'aabot-elementor'),
						'work_content' => esc_html__('Here your content', 'aabot-elementor'),
						'number_color' => 'custom',
					],
					[
						'work_number' => '02',
						'work_title' => esc_html__('Works Two', 'aabot-elementor'),
						'work_content' => esc_html__('Here your content', 'aabot-elementor'),
						'number_color' => 'egg-blue',
					],
					[
						'work_number' => '03',
						'work_title' => esc_html__('Works Three', 'aabot-elementor'),
						'work_content' => esc_html__('Here your content', 'aabot-elementor'),
						'number_color' => 'yellow',
					],
				],
				'fields' => [
					[
						'name' => 'work_number',
						'label' => esc_html__('Number', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_attr__('01', 'aabot-elementor'),
						'label_block' => true,
					],
					[
						'name' => 'work_title',
						'label' => esc_html__('Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Title here', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name' => 'work_content',
						'label' => esc_html__('Content', 'aabot-elementor'),
						'type' => Controls_Manager::TEXTAREA,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Text', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name'        => 'number_color',
						'label'   => esc_html__( 'Dot Color', 'aabot-elementor' ),
						'type'    => Controls_Manager::SELECT,
						'options' => [
							'egg-blue' => esc_html__( 'Egg Blue', 'aabot-elementor' ),
							'yellow' => esc_html__( 'Yellow', 'aabot-elementor' ),
							'custom' => esc_html__( 'Custom', 'aabot-elementor' ),
						],
						'default' => 'egg-blue',
					],

					[
						'name'        => 'number_custom_color',
						'label'     => esc_html__( 'Dot Custom Color', 'aabot-elementor' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ff6666',
						'condition' => [
							'number_color' => 'custom'
						],
					],

				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__('Layout', 'aabot-elementor'),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'aabot-elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'aabot-elementor'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'aabot-elementor'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'aabot-elementor'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'aabot-elementor'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description' => 'Use align to match position',
				'default' => 'left',
			]
		);

		$this->add_control(
			'show_number',
			[
				'label' => esc_html__('Show Icon', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => esc_html__('Show Title', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_content',
			[
				'label' => esc_html__('Show Content', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->add_control(
			'show_heading',
			[
				'label' => esc_html__('Show Heading', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_icon',
			[
				'label'   => esc_html__( 'Show Icon', 'aabot-elementor' ),
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
					'{{WRAPPER}} .work-wrap:before' => 'display: {{VALUE}};'
				],
				'default' => 'inline-block',
			]
		);

		$this->add_control(
			'show_container',
			[
				'label'   => esc_html__( 'Show Container Border', 'aabot-elementor' ),
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
					'{{WRAPPER}} .work-bg:after' => 'display: {{VALUE}};'
				],
				'default' => 'inline-block',
			]
		);

		$this->add_control(
			'show_container_color',
			[
				'label'     => esc_html__( 'Container Color', 'aabot-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#0c2fa8',
				'selectors' => [
					'{{WRAPPER}} .work-bg:after' => 'background: {{VALUE}};'
				],
			]
		);

		$this->end_controls_section();

	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		?>

		<div class="work-area">
			<div class="container">
				<?php if ( $settings['show_heading'] == true) : ?>
					<div class="row justify-content-center">
						<div class="col-xl-8 mb-60">
							<div class="section-title text-center">
								<?php
								if ('' !== $settings['heading']) : ?>
									<h3><?php echo wp_kses_post($settings['heading']); ?></h3>
								<?php
								endif; ?>

								<?php
								if ('' !== $settings['description']) : ?>
									<p>
										<?php echo wp_kses_post($settings['description']); ?>
									</p>
								<?php
								endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="container work-bg">
				<div class="row">
					<?php foreach ($settings['works'] as $item) : ?>
						<div class="col-xl-4 col-lg-4">
							<!-- start skill -->
							<div class="work-wrap mb-md-30 mb-xs-30">
								<?php
								if (('' !== $item['work_number']) && ($settings['show_number'])) : ?>
									<span class="count <?php echo esc_attr($item['number_color']); ?>"
									      style="background: <?php if ($item['number_color'] == 'custom'){echo esc_attr($item['number_custom_color']);} ?>">
										<?php echo wp_kses_post($item['work_number']); ?>
									</span>
								<?php endif; ?>

								<div class="work-details">
									<?php if (('' !== $item['work_title']) && ($settings['show_title'])) : ?>
										<h4><?php echo wp_kses_post($item['work_title']); ?></h4>
									<?php endif; ?>
									<?php if (('' !== $item['work_content']) && ($settings['show_content'])) : ?>
										<p><?php echo wp_kses_post($item['work_content']); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<!-- end skill -->
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
		<?php
	}

}