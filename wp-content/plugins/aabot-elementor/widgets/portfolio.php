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
class AabotWork extends \Elementor\Widget_Base {

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
		return 'aabot-work';
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
		return __( 'Works', 'aabot-elementor' );
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
		return [ 'Work' ];
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
			'member_section',
			[
				'label' => esc_html__( 'Work Section', 'aabot-elementor' ),
			]	
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'aabot-elementor' ),
				'default'     => __( 'It is sub heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'aabot-elementor' ),
				'default'     => __( 'It is Heading', 'aabot-elementor' ),
				'label_block' => true,
			]
		);	

		$this->end_controls_section();

		/** member info section **/
		$this->start_controls_section(
			'member_info_section',
			[
				'label' => esc_html__( 'Work Info', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Work Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Work #1', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Work #2', 'aabot-elementor' ),
					],
				],
				'fields' => [					
					[
						'name'        => 'work_photo',
						'label'       => esc_html__( 'Work Photo', 'aabot-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Work Image from here', 'aabot-elementor' ),
					]					
				],
			]
		);

		$this->end_controls_section();

		/** 
		*	Layout section 
		**/
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
        <section id="works" class="portfolio-area theme-bg portfolio-p pb-120">
            <div class="container">
            	<?php if (( $settings['sub_heading'] ) || ( $settings['heading'] )) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-70">
                            <span class="sub-title"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
                            <h2 class="title"><?php echo wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="container-fluid">
                <div class="row portfolio-active">
					<?php
					 $x = 1;
					 foreach ( $settings['tabs'] as $item ) : 
						if( $x == 2){
						$active_class = 'active';
						}else{
							$active_class = '';
						}
						extract($item);
					?>
                    <div class="col-12">
                    	<?php
							if ( '' !== $work_photo['id'] )  :  
								$work_image_src = wp_get_attachment_image_src( $work_photo['id'], 'full' );
								$work_image_url = $work_image_src ? $work_image_src[0] : '';
							?>
                        <div class="single-project">
                            <a class="popup-image" href="<?php print esc_url($work_image_url); ?>">
                            	<img src="<?php print esc_url($work_image_url); ?>" alt="img">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>
        </section>

	<?php
	}

}