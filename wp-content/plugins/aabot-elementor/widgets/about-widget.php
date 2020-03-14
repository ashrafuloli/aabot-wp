<?php

namespace AabotElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;

/**
 * Aabot Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class AabotAbout extends \Elementor\Widget_Base
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
		return 'aabot-about';
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
		return __('About', 'aabot-elementor');
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
		return ['about'];
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
			'section_content_about',
			[
				'label' => esc_html__('About', 'aabot-elementor'),
			]
		);


		$this->add_control(
			'about_thumb_1',
			[
				'label' => esc_html__('About Image 1', 'aabot-elementor'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => ['active' => true],
				'description' => esc_html__('Add your about image', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'about_thumb_2',
			[
				'label' => esc_html__('About Image 2', 'aabot-elementor'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => ['active' => true],
				'description' => esc_html__('Add your about image', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'about_thumb_3',
			[
				'label' => esc_html__('About Image 3', 'aabot-elementor'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => ['active' => true],
				'description' => esc_html__('Add your about image', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'about_thumb_shape',
			[
				'label' => esc_html__('About Shape Image', 'aabot-elementor'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => ['active' => true],
				'description' => esc_html__('Add your about image', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'about_thumb_shape_color1',
			[
				'label' => esc_html__('Thumb 1 Shape Color', 'aabot-elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'egg-blue' => esc_html__('Egg Blue', 'aabot-elementor'),
					'yellow' => esc_html__('Yellow', 'aabot-elementor'),
					'blue' => esc_html__('Blue', 'aabot-elementor'),
					'custom' => esc_html__('Custom', 'aabot-elementor'),
				],
				'default' => 'egg-blue',
			]
		);

		$this->add_control(
			'about_thumb_shape_custom_color1',
			[
				'label' => esc_html__('Thumb 1 Shape Custom Color', 'aabot-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff6666',
				'condition' => [
					'about_thumb_shape_color1' => 'custom'
				],
			]
		);

		$this->add_control(
			'about_thumb_shape_color2',
			[
				'label' => esc_html__('Thumb 2 Shape Color', 'aabot-elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'egg-blue' => esc_html__('Egg Blue', 'aabot-elementor'),
					'yellow' => esc_html__('Yellow', 'aabot-elementor'),
					'blue' => esc_html__('Blue', 'aabot-elementor'),
					'custom' => esc_html__('Custom', 'aabot-elementor'),
				],
				'default' => 'egg-blue',
			]
		);

		$this->add_control(
			'about_thumb_shape_custom_color2',
			[
				'label' => esc_html__('Thumb 2 Shape Custom Color', 'aabot-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff6666',
				'condition' => [
					'about_thumb_shape_color2' => 'custom'
				],
			]
		);

		$this->add_control(
			'about_thumb_shape_color3',
			[
				'label' => esc_html__('Thumb 3 Shape Color', 'aabot-elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'egg-blue' => esc_html__('Egg Blue', 'aabot-elementor'),
					'yellow' => esc_html__('Yellow', 'aabot-elementor'),
					'blue' => esc_html__('Blue', 'aabot-elementor'),
					'custom' => esc_html__('Custom', 'aabot-elementor'),
				],
				'default' => 'egg-blue',
			]
		);

		$this->add_control(
			'about_thumb_shape_custom_color3',
			[
				'label' => esc_html__('Thumb 3 Shape Custom Color', 'aabot-elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff6666',
				'condition' => [
					'about_thumb_shape_color3' => 'custom'
				],
			]
		);


		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'about_sub_heading',
			[
				'label' => __('Sub Heading', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter your sub heading', 'aabot-elementor'),
				'default' => __('About Me', 'aabot-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_heading',
			[
				'label' => __('Heading', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter your heading', 'aabot-elementor'),
				'default' => __('Designing With The Passion While.', 'aabot-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_sub_desc',
			[
				'label' => __('Sub Desc Text', 'aabot-elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __('Desc Text', 'aabot-elementor'),
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed tempor incididunt ut labore et dolore magna aliqua.', 'aabot-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_desc',
			[
				'label' => __('Desc Text', 'aabot-elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __('Desc Text', 'aabot-elementor'),
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed tempor incididunt ut labore et dolore magna aliqua.', 'aabot-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);


		$this->add_control(

			'about_info',
			[
				'label' => esc_html__('About Info', 'aabot-elementor'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'info_icon' => 'fal fa-briefcase',
						'info_title' => esc_html__('Full Name', 'aabot-elementor'),
						'info_desc' => esc_html__('Rosalina D. Williamson', 'aabot-elementor'),
						'dot_color' => 'egg-blue',
					],
					[
						'info_icon' => 'fal fa-phone',
						'info_title' => esc_html__('Phone No.', 'aabot-elementor'),
						'info_desc' => esc_html__('+876 675 67 67 8', 'aabot-elementor'),
						'dot_color' => 'yellow',
					],
					[
						'info_icon' => 'fal fa-envelope',
						'info_title' => esc_html__('Email Address', 'aabot-elementor'),
						'info_desc' => esc_html__('info@webmail.com', 'aabot-elementor'),
						'dot_color' => 'egg-blue',
					],
					[
						'info_icon' => 'fal fa-globe',
						'info_title' => esc_html__('Co Website', 'aabot-elementor'),
						'info_desc' => esc_html__('www.example.com', 'aabot-elementor'),
						'dot_color' => 'purple',
					],
				],
				'fields' => [
					[
						'name' => 'info_icon',
						'label' => esc_html__('Icon', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'label_block' => true,
					],
					[
						'name' => 'info_title',
						'label' => esc_html__('Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'label_block' => true,
					],

					[
						'name' => 'info_desc',
						'label' => esc_html__('Desc', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'label_block' => true,
					],

					[
						'name' => 'info_icon_color',
						'label' => esc_html__('Icon Bg Color', 'aabot-elementor'),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'egg-blue' => esc_html__('Egg Blue', 'aabot-elementor'),
							'yellow' => esc_html__('Yellow', 'aabot-elementor'),
							'blue' => esc_html__('Blue', 'aabot-elementor'),
							'custom' => esc_html__('Custom', 'aabot-elementor'),
						],
						'default' => 'egg-blue',
					],

					[
						'name' => 'info_icon_custom_color',
						'label' => esc_html__('Icon Custom Bg Color', 'aabot-elementor'),
						'type' => Controls_Manager::COLOR,
						'default' => '#ff6666',
						'condition' => [
							'info_icon_color' => 'custom'
						],
					],
				],
			]
		);

		$this->end_controls_section();

		/**
		 *    Layout section
		 **/
		$this->start_controls_section(
			'section_content_about_layout',
			[
				'label' => esc_html__('Layout', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'about_info_show',
			[
				'label' => esc_html__('About Info Show', 'aabot-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		?>

		<?php
		$about_thumb_1_src = wp_get_attachment_image_src($settings['about_thumb_1']['id'], 'full');
		$about_thumb_1 = $about_thumb_1_src ? $about_thumb_1_src[0] : '';

		$about_thumb_2_src = wp_get_attachment_image_src($settings['about_thumb_2']['id'], 'full');
		$about_thumb_2 = $about_thumb_2_src ? $about_thumb_2_src[0] : '';

		$about_thumb_3_src = wp_get_attachment_image_src($settings['about_thumb_3']['id'], 'full');
		$about_thumb_3 = $about_thumb_3_src ? $about_thumb_3_src[0] : '';

		$about_thumb_shape_src = wp_get_attachment_image_src($settings['about_thumb_shape']['id'], 'full');
		$about_thumb_shape = $about_thumb_shape_src ? $about_thumb_shape_src[0] : '';
		?>

		<section id="about" class="about-area">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-6 col-lg-6">
						<div class="about-thumb">
							<?php if (!empty($about_thumb_1)): ?>
								<div class="thumb-1">
									<img src="<?php print esc_url($about_thumb_1); ?>" alt="about-1">
									<span class="shape <?php print esc_attr($settings['about_thumb_shape_color1']); ?>"
									      style="background: <?php if ($settings['about_thumb_shape_color1'] == 'custom') {
										      echo esc_attr($settings['about_thumb_shape_custom_color1']);
									      } ?>"></span>
								</div>
							<?php endif; ?>

							<?php if (!empty($about_thumb_2)): ?>
								<div class="thumb-2">
									<img src="<?php print esc_url($about_thumb_2); ?>" alt="about-2">
									<span class="shape <?php print esc_attr($settings['about_thumb_shape_color2']); ?>"
									      style="background: <?php if ($settings['about_thumb_shape_color2'] == 'custom') {
										      echo esc_attr($settings['about_thumb_shape_custom_color2']);
									      } ?>"></span>
								</div>
							<?php endif; ?>

							<?php if (!empty($about_thumb_3)): ?>
								<div class="thumb-3">
									<img src="<?php print esc_url($about_thumb_3); ?>" alt="about-3">
									<span class="shape <?php print esc_attr($settings['about_thumb_shape_color3']); ?>"
									      style="background: <?php if ($settings['about_thumb_shape_color3'] == 'custom') {
										      echo esc_attr($settings['about_thumb_shape_custom_color3']);
									      } ?>"></span>
									<span class="dots-shape"
									      style="background-image: url(<?php if (!empty($about_thumb_shape)) {
										      echo esc_attr($about_thumb_shape);
									      } ?>)"></span>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="about-details mt-lg-50 mt-md-50 mt-xs-50">
							<h6 class="sub-title"><?php echo wp_kses_post($settings['about_sub_heading']); ?></h6>
							<h3 class="title"><?php echo wp_kses_post($settings['about_heading']); ?></h3>
							<p class="shape">
								<?php echo wp_kses_post($settings['about_sub_desc']); ?>
							</p>
							<p>
								<?php echo wp_kses_post($settings['about_desc']); ?>
							</p>
						</div>
						<?php if ($settings['about_info_show'] == true): ?>
							<div class="info-wrapper">
								<div class="row">
									<?php foreach ($settings['about_info'] as $info) : ?>
										<div class="col-xl-6 col-lg-6 col-md-6">
											<div class="info-wrap mb-40">
												<div class="icon <?php echo wp_kses_post($info['info_icon_color']); ?>">
													<i class="<?php echo wp_kses_post($info['info_icon']); ?>"
													   style="background: <?php if ($info['info_icon_color'] == 'custom') {
														   echo esc_attr($info['info_icon_custom_color']);
													   } ?>"></i>
												</div>
												<div class="details">
													<h4><?php echo wp_kses_post($info['info_title']); ?></h4>
													<p><?php echo wp_kses_post($info['info_desc']); ?></p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}

}