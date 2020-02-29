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
class AabotSkills extends \Elementor\Widget_Base {

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
		return 'aabot-skills';
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
		return __( 'Skills', 'aabot-elementor' );
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
		return [ 'skills' ];
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
			'section_heading',
			[
				'label' => esc_html__( 'Section Title', 'aabot-elementor' ),
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
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_skill',
			[
				'label' => esc_html__( 'Skills', 'aabot-elementor' ),
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Contact Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Contact One', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Admin@BasicTheme.com', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Contact Two', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Admin@BasicTheme.com', 'aabot-elementor' ),
					],					
					[
						'tab_title'   => esc_html__( 'Contact Three', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'Admin@BasicTheme.com', 'aabot-elementor' ),
					],
				],
				'fields' => [	
					[
						'name'        => 'skill_no',
						'label'       => esc_html__( 'Skill Number', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_attr__( '73' , 'aabot-elementor' ),
						'label_block' => true,
					],		

					[
						'name'        => 'skill_color',
						'label'       => esc_html__( 'Skill Color', 'aabot-elementor' ),
						'type'        => Controls_Manager::COLOR,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#F26C4F' , 'aabot-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'       => 'tab_content',
						'label'      => esc_html__( 'Title', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Counter Text', 'aabot-elementor' ),
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
		

		$this->end_controls_section();


	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);	

	   	?>


        <section class="skill-area pt-115 pb-65">
            <div class="container">
            	<?php if (( $settings['sub_heading'] ) && ( $settings['heading'] )) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-70">
                            <span class="sub-title"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
                            <h2 class="title"><?php echo wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
               <?php endif; ?>
                <div class="row">
                	<?php  foreach ( $settings['tabs'] as $item ) : ?>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="single-skill text-center mb-50">
                            <div class="skill-circular">
                                <input type="text" class="knob" value="0" data-rel="<?php echo wp_kses_post($item['skill_no']); ?>" data-linecap="round" data-width="200" data-height="200"
                                    data-bgcolor="#f4f4f4" data-fgcolor="<?php echo wp_kses_post($item['skill_color']); ?>" data-thickness=".10" data-readonly="true" disabled>
                            </div>
                            <div class="skill-content">
                                <h5><?php echo wp_kses_post($item['tab_content']); ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        	
	<?php
	}

}