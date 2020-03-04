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
class AabotVideo extends \Elementor\Widget_Base
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
		return 'aabot-videos';
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
		return __('Videos', 'aabot-elementor');
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
		return ['videos'];
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
			'video_link',
			[
				'label' => __('Link', 'aabot-elementor'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('https://www.youtube.com/watch?', 'aabot-elementor'),
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
				'default' => 'center',
			]
		);

		$this->end_controls_section();

	}

	public function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		?>

		<?php if (!empty($settings['video_link'])): ?>
			<a href="<?php echo esc_url($settings['video_link']); ?>" class="popup-video video-popup">
				<i class="fas fa-play"></i>
			</a>
		<?php endif; ?>

		<?php
	}

}