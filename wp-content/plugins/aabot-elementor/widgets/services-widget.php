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
class AabotService extends \Elementor\Widget_Base
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
		return 'aabot-services';
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
		return __('Services', 'aabot-elementor');
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
		return ['services'];
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
				'default' => __('What I Do', 'aabot-elementor'),
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
				'label' => esc_html__('Services', 'aabot-elementor'),
			]
		);


		$this->add_control(

			'services',
			[
				'label' => esc_html__('Services Items', 'aabot-elementor'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'service_icon' => 'fal fa-briefcase',
						'service_title' => esc_html__('Services One', 'aabot-elementor'),
						'service_content' => esc_html__('Here your content', 'aabot-elementor'),
						'service_btn_text' => esc_html__('Learn More', 'aabot-elementor'),
						'service_btn_url' => '#',
					],
					[
						'service_icon' => 'fal fa-briefcase',
						'service_title' => esc_html__('Services Two', 'aabot-elementor'),
						'service_content' => esc_html__('Here your content', 'aabot-elementor'),
						'service_btn_text' => esc_html__('Learn More', 'aabot-elementor'),
						'service_btn_url' => '#',
					],
					[
						'service_icon' => 'fal fa-briefcase',
						'service_title' => esc_html__('Services Three', 'aabot-elementor'),
						'service_content' => esc_html__('Here your content', 'aabot-elementor'),
						'service_btn_text' => esc_html__('Learn More', 'aabot-elementor'),
						'service_btn_url' => '#',
					],
				],
				'fields' => [
					[
						'name' => 'service_icon',
						'label' => esc_html__('Icon', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_attr__('fal fa-briefcase', 'aabot-elementor'),
						'label_block' => true,
					],
					[
						'name' => 'service_title',
						'label' => esc_html__('Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Title here', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name' => 'service_content',
						'label' => esc_html__('Content', 'aabot-elementor'),
						'type' => Controls_Manager::TEXTAREA,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Text', 'aabot-elementor'),
						'label_block' => true,
					],
					[
						'name' => 'service_btn_text',
						'label' => esc_html__('Button Text', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Learn More', 'aabot-elementor'),
						'label_block' => true,
					],
					[
						'name' => 'service_btn_url',
						'label' => esc_html__('Button Url', 'aabot-elementor'),
						'type'        => Controls_Manager::URL,
						'placeholder' => __( 'www.test.com', 'aabot-elementor' ),
						'dynamic' => ['active' => true],
						'default'     => [
							'url' => '#',
						],
						'label_block' => true,
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
			'show_icon',
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
			'show_button',
			[
				'label' => esc_html__('Show Button', 'aabot-elementor'),
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

		$this->end_controls_section();

	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		?>

		<div id="service" class="service-area">
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

				<div class="row">
					<?php foreach ($settings['services'] as $item) :

						$this->add_render_attribute(
							[
								'service-btn-attr' => [
									'class' => [
										'a-btn',
									],
									'href' => $item['service_btn_url']['url'] ? esc_url($item['service_btn_url']['url']) : '#',
									'target' => $item['service_btn_url']['is_external'] ? '_blank' : '_self'
								]
							], '', '', true
						);

						?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<!-- start service -->
							<div class="service-wrap mt-40 mb-40">
								<?php
								if (('' !== $item['service_icon']) && ($settings['show_icon'])) : ?>
									<div class="icon">
										<i class="<?php echo wp_kses_post($item['service_icon']); ?>"></i>
									</div>
								<?php endif; ?>

								<div class="details">
									<?php if (('' !== $item['service_title']) && ($settings['show_title'])) : ?>
										<h4><?php echo wp_kses_post($item['service_title']); ?></h4>
									<?php endif; ?>

									<?php if (('' !== $item['service_content']) && ($settings['show_content'])) : ?>
										<p><?php echo wp_kses_post($item['service_content']); ?></p>
									<?php endif; ?>

									<?php if ((!empty($item['service_btn_url']['url'])) && ($settings['show_button'])): ?>
										<a <?php echo $this->get_render_attribute_string('service-btn-attr'); ?>>
											<i class="far fa-arrow-right"></i> <?php echo esc_html($item['service_btn_text']); ?>
										</a>
									<?php endif; ?>

								</div>
							</div>
							<!-- end service -->
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}

}