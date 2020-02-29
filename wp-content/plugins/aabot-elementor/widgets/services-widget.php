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
class AabotService extends \Elementor\Widget_Base {

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
		return 'aabot-services';
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
		return __( 'Services', 'aabot-elementor' );
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
		return [ 'services' ];
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
			'section_content_heading',
			[
				'label' => esc_html__( 'Section Heading', 'aabot-elementor' ),
			]
		);
		
		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your prefix Heading', 'aabot-elementor' ),
				'default'     => __( 'Awesome Features', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
			]
		);		

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button ', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Hire Me Now', 'aabot-elementor' ),
				'default'     => __( 'Hire Me Now', 'aabot-elementor' ),
			]
		);		

		$this->add_control(
			'tab_link',
			[
				'label'       => __( 'Link', 'aabot-elementor' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'www.test.com', 'aabot-elementor' ),
				'default'     => [
					'url' => '#',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_contact_info',
			[
				'label' => esc_html__( 'Services', 'aabot-elementor' ),
			]
		);


		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Services Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Services One', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Services Two', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],					
					[
						'tab_title'   => esc_html__( 'Services Three', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Here your content', 'aabot-elementor' ),
					],
				],
				'fields' => [	
					[
						'name'        => 'tab_icon',
						'label'       => esc_html__( 'Number', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_attr__( 'i' , 'aabot-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'tab_icon_color',
						'label'       => esc_html__( 'Number Color', 'aabot-elementor' ),
						'type'        => Controls_Manager::COLOR,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( '#16ffdb' , 'aabot-elementor' ),
						'label_block' => true,
					],	
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Title here' , 'aabot-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Content', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Contact Text', 'aabot-elementor' ),
						'label_block' => true,
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
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_content',
			[
				'label'   => esc_html__( 'Show Content', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);			

		$this->add_control(
			'show_icon',
			[
				'label'   => esc_html__( 'Show Icon', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_sub_heading',
			[
				'label'   => esc_html__( 'Show Sub Heading', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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

		$this->end_controls_section();

				/** typography **/
		$this->start_controls_section(
			'typography_section',
			[
				'label' => esc_html__( 'Custom Typography', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading_font_size',
			[
				'label'       => __( 'Sub Heading Font Size', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter font size here', 'aabot-elementor' ),
			]
		);


		$this->add_control(
			'sub_heading_line_height',
			[
				'label'       => __( 'Sub Heading Line Height', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Line Height here', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label'       => __( 'Sub Heading Color', 'aabot-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter Color Code', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'divider-10',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'heading_font_size',
			[
				'label'       => __( 'Heading Font Size', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter font size here', 'aabot-elementor' ),
			]
		);


		$this->add_control(
			'heading_line_height',
			[
				'label'       => __( 'Heading Line Height', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Line Height here', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'       => __( 'Heading Color', 'aabot-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter Color Code', 'aabot-elementor' ),
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);	

		$this->add_render_attribute(
			[
				'slider-link' => [
					'class' => [
						'btn primary-btn radious-0',
					],
					'href'   => $settings['tab_link']['url'] ? esc_url($settings['tab_link']['url']) : '#',
					'target' => $settings['tab_link']['is_external'] ? '_blank' : '_self'
				]
			], '', '', true
		); 

		// sub heading info
		$sub_heading_font_size = !empty($settings['sub_heading_font_size']) ? 'font-size:'.$settings['sub_heading_font_size'] : '';
		$sub_heading_n_title_gap = !empty($settings['sub_heading_n_title_gap']) ? 'margin-bottom:'.$settings['sub_heading_n_title_gap'] : '';
		$sub_heading_color = !empty($settings['sub_heading_color']) ? 'color:'.$settings['sub_heading_color'] : '';

		
		// heading info
		$heading_font_size = !empty($settings['heading_font_size']) ? 'font-size:'.$settings['heading_font_size'] : '';
		$heading_line_height = !empty($settings['heading_line_height']) ? 'line-height:'.$settings['heading_line_height'] : '';
		$heading_color = !empty($settings['heading_color']) ? 'color:'.$settings['heading_color'] : '';

	   	?>

        <section class="pt-135 pb-85 black-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="section-header services-header mb-50">
		                    <?php 
		                    if (( '' !== $settings['sub_heading'] ) && ( $settings['show_sub_heading'] )) : ?>
								<span style="<?php print esc_attr( $sub_heading_font_size ); ?>;  <?php print esc_attr( $sub_heading_color ); ?>;  <?php print esc_attr( $sub_heading_n_title_gap ); ?>;"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
							<?php 
							endif; ?>	

		                    <?php 
		                    if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
								<h2 class="text-white" style="color:<?php print esc_attr( $heading_font_size ); ?>;  <?php print esc_attr( $heading_color ); ?>; <?php print esc_attr( $heading_line_height ); ?>;"><?php echo wp_kses_post($settings['heading']); ?></h2>
							<?php 
							endif; ?>	
                        </div>
                    </div>
                    <?php if (( ! empty( $settings['tab_link']['url'] )) && ( $settings['show_button'] )): ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 d-flex justify-content-start justify-content-md-end">
                        <div class="services-btn mt-20 mb-50">
                            <a <?php echo $this->get_render_attribute_string( 'slider-link' ); ?>>
                            	<?php echo esc_html($settings['button_text']); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
					<?php  foreach ( $settings['tabs'] as $item ) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-content mb-45"> 
                        	<?php 
							if (( '' !== $item['tab_icon'] ) && ( $settings['show_icon'] )) : ?>
                            <span class="color-1" style="color:<?php echo wp_kses_post($item['tab_icon_color']); ?>">
                            	<?php echo wp_kses_post($item['tab_icon']); ?>
                            </span>
                        	<?php endif; ?>	

							<?php if (( '' !== $item['tab_title'] ) && ( $settings['show_title'] )) : ?>
                            <h2 class="text-white"><?php echo wp_kses_post($item['tab_title']); ?></h2>
                            <?php endif; ?>	

                            <?php if (( '' !== $item['tab_content'] ) && ( $settings['show_content'] )) : ?>
                            <p><?php echo wp_kses_post($item['tab_content']); ?></p>
                            <?php endif; ?>	
                        </div>
                    </div>
					<?php endforeach; ?>	
                </div>
            </div>
        </section>
        	
	<?php
	}

}