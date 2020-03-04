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
class AabotContact extends \Elementor\Widget_Base
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
		return 'aabot-contact';
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
		return __('Contact Form', 'aabot-elementor');
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
		return ['contact'];
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
				'label' => esc_html__('Contact From', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => __('Heading', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter Your Heading', 'aabot-elementor'),
				'default' => __('Enter Your Heading', 'aabot-elementor'),
			]
		);

		$this->add_control(
			'section_description',
			[
				'label' => __('Description', 'aabot-elementor'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __('Enter Your Description', 'aabot-elementor'),
				'default' => __('Enter Your Description', 'aabot-elementor'),
			]
		);


		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__('Shortcode', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => ['active' => true],
				'placeholder' => __('Contact Shortcode here', 'aabot-elementor'),
				'description' => esc_html__('Add Your shortcode here', 'aabot-elementor'),
				'label_block' => true,
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_contact_info',
			[
				'label' => esc_html__('Contact Info', 'aabot-elementor'),
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__('Contact List', 'aabot-elementor'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_style' => 'default',
						'tab_title' => esc_html__('Contact Title', 'aabot-elementor'),
						'tab_content' => esc_html__('Contact Content', 'aabot-elementor'),
						'tab_title_2' => esc_html__('Contact Title', 'aabot-elementor'),
						'tab_content_2' => esc_html__('Contact Content', 'aabot-elementor'),
					],
					[
						'tab_style' => 'contact-bg',
						'tab_title' => esc_html__('Contact Title', 'aabot-elementor'),
						'tab_content' => esc_html__('Contact Content', 'aabot-elementor'),
						'tab_title_2' => esc_html__('Contact Title', 'aabot-elementor'),
						'tab_content_2' => esc_html__('Contact Content', 'aabot-elementor'),
					]
				],
				'fields' => [
					[
						'name' => 'tab_style',
						'label' => esc_html__('Contact Style', 'aabot-elementor'),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'default' => esc_html__('Style One', 'aabot-elementor'),
							'contact-bg' => esc_html__('Style Two', 'aabot-elementor'),
						],
						'default' => 'default',
					],

					[
						'name' => 'tab_title',
						'label' => esc_html__('Contact Title', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Title', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name' => 'tab_content',
						'label' => esc_html__('Contact Content', 'aabot-elementor'),
						'type' => Controls_Manager::TEXTAREA,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Content', 'aabot-elementor'),
						'label_block' => true,
					],

					[
						'name' => 'tab_style_bg',
						'label' => esc_html__('Contact Background', 'aabot-elementor'),
						'type' => Controls_Manager::MEDIA,
						'dynamic' => ['active' => true],
						'condition' => [
							'tab_style' => 'contact-bg'
						],
					],

					[
						'name' => 'tab_content_show',
						'label' => esc_html__('Contact Info 2nd', 'aabot-elementor'),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
					],

					[
						'name' => 'tab_title_2',
						'label' => esc_html__('Contact Title 2', 'aabot-elementor'),
						'type' => Controls_Manager::TEXT,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Title', 'aabot-elementor'),
						'label_block' => true,
						'condition' => [
							'tab_content_show' => 'yes'
						],
					],

					[
						'name' => 'tab_content_2',
						'label' => esc_html__('Contact Content 2', 'aabot-elementor'),
						'type' => Controls_Manager::TEXTAREA,
						'dynamic' => ['active' => true],
						'default' => esc_html__('Contact Description', 'aabot-elementor'),
						'label_block' => true,
						'condition' => [
							'tab_content_show' => 'yes'
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

		$this->end_controls_section();
	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		?>
		<div id="contact" class="contact-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8">
						<!-- start section title -->
						<div class="section-title">
							<?php if ($settings['section_title']) : ?>
								<h3><?php echo wp_kses_post($settings['section_title']); ?></h3>
							<?php endif; ?>
							<?php if ($settings['section_description']) : ?>
								<p class="p-0">
									<?php echo wp_kses_post($settings['section_description']); ?>
								</p>
							<?php endif; ?>
						</div>
						<!-- end section title -->

						<!-- start contact form -->
						<div class="contact-form">
							<?php print do_shortcode(html_entity_decode($settings['shortcode'])); ?>
						</div>
						<!-- end contact form -->
					</div>
					<div class="col-xl-4 col-lg-4 mt-md-50 mt-xs-50">
						<?php foreach ($settings['tabs'] as $item) :
							$contact_bg_src = wp_get_attachment_image_src($item['tab_style_bg']['id'], 'full');
							$contact_bg = $contact_bg_src ? $contact_bg_src[0] : '';
							?>

							<div class="contact-info-wrap <?php echo esc_attr($item['tab_style']); ?>"
							     style="background-image: url(<?php print esc_url($contact_bg); ?>)">
								<div class="contact-wrap">
									<?php if ($item['tab_title']) : ?>
										<h3><?php echo wp_kses_post($item['tab_title']); ?></h3>
									<?php endif; ?>
									<?php if ($item['tab_content']) : ?>
										<p><?php echo wp_kses_post($item['tab_content']); ?></p>
									<?php endif; ?>
								</div>
								<?php if ($item['tab_content_show'] == true) : ?>
									<div class="contact-separator"></div>
									<div class="contact-wrap">
										<?php if ($item['tab_title_2']) : ?>
											<h3><?php echo wp_kses_post($item['tab_title_2']); ?></h3>
										<?php endif; ?>
										<?php if ($item['tab_content_2']) : ?>
											<p><?php echo wp_kses_post($item['tab_content_2']); ?></p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
						<!-- start contact info -->
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}