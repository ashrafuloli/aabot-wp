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
class AabotSkills extends \Elementor\Widget_Base
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
		return 'aabot-skills';
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
		return __('Skills', 'aabot-elementor');
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
		return ['skills'];
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
			'section_heading',
			[
				'label' => esc_html__('Section Title', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __('Heading', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter your Heading', 'aabot-elementor'),
				'default' => __('My Skills', 'aabot-elementor'),
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
			'section_content_skill',
			[
				'label' => esc_html__('Skills', 'aabot-elementor'),
			]
		);

		$this->add_control(

			'skills',
			[
				'label' => esc_html__('Contact Items', 'aabot-elementor'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'skill_number' => ['unit' => '%', 'size' => 50],
						'skill_icon' => 'far fa-code',
						'skill_title' => esc_html__('Skill One', 'aabot-elementor'),
						'skill_content' => esc_html__('Skill Content', 'aabot-elementor'),
					],
					[
						'skill_number' => ['unit' => '%', 'size' => 60],
						'skill_icon' => 'far fa-code',
						'skill_title' => esc_html__('Skill Two', 'aabot-elementor'),
						'skill_content' => esc_html__('Skill Content', 'aabot-elementor'),
					],
					[
						'skill_number' => ['unit' => '%', 'size' => 70],
						'skill_icon' => 'far fa-code',
						'skill_title' => esc_html__('Skill Three', 'aabot-elementor'),
						'skill_content' => esc_html__('Skill Content', 'aabot-elementor'),
					],
					[
						'skill_number' => ['unit' => '%', 'size' => 80],
						'skill_icon' => 'far fa-code',
						'skill_title' => esc_html__('Skill Four', 'aabot-elementor'),
						'skill_content' => esc_html__('Skill Content', 'aabot-elementor'),
					],
				],
				'fields' => [
					[
						'name' => 'skill_number',
						'label' => esc_html__('Skill Number', 'aabot-elementor'),
						'type' => Controls_Manager::SLIDER,
						'size_units' => ['%'],
						'range' => [
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'dynamic' => ['active' => true],
						'default' => [
							'unit' => '%',
							'size' => 50,
						],
						'label_block' => true,
					],

					[
						'name' => 'skill_icon',
						'label' => esc_html__('Icon', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => 'far fa-code',
						'label_block' => true,
					],
					[
						'name' => 'skill_title',
						'label' => esc_html__('Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Title here', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name' => 'skill_content',
						'label' => esc_html__('Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Counter Text', 'aabot-elementor'),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();

		// layout
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
			'show_heading',
			[
				'label' => esc_html__('Show Heading', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => __('Padding', 'aabot-elementor'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .skill-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'   => [
					'top' => '100',
					'right' => '0',
					'bottom' => '70',
					'left' => '0',
					'unit' => 'px',
				]
			]
		);

		$this->end_controls_section();


	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);

		?>

		<div class="skill-area">
			<div class="container">
				<?php if ($settings['show_heading'] == true) : ?>
					<div class="row justify-content-center">
						<div class="col-xl-8 mb-60">
							<!-- start section title -->
							<div class="section-title light-title text-center">
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
							<!-- end section title -->
						</div>
					</div>
				<?php endif; ?>

				<div class="row">
					<?php foreach ($settings['skills'] as $item) : ?>
						<div class="col-xl-3 col-lg-3 col-md-6">
							<!-- start skill -->
							<div class="skill-wrap mb-90">
								<?php if ('' !== $item['skill_icon']) : ?>
									<div class="icon">
										<i class="<?php echo esc_attr($item['skill_icon']); ?>"></i>
									</div>
								<?php endif; ?>

								<?php if ('' !== $item['skill_number']['size']) : ?>
									<div class="skill-bar">
										<span class="bar-point"
										      style="height: <?php echo esc_attr($item['skill_number']['size'] . $item['skill_number']['unit']); ?>"></span>
									</div>
								<?php endif; ?>

								<div class="skill-details">
									<?php if ('' !== $item['skill_number']['size']) : ?>
										<h3 class="skill-point"><?php echo wp_kses_post($item['skill_number']['size']); ?></h3>
									<?php endif; ?>
									<?php if ('' !== $item['skill_title']) : ?>
										<h5><?php echo wp_kses_post($item['skill_title']); ?></h5>
									<?php endif; ?>
									<?php if ('' !== $item['skill_content']) : ?>
										<p><?php echo wp_kses_post($item['skill_content']); ?></p>
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