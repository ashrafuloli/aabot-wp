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
class AabotTestimonials extends \Elementor\Widget_Base {

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
		return 'aabot-testimonials';
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
		return __( 'Testimonials', 'aabot-elementor' );
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
		return [ 'testimonial' ];
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
			'section_content_features',
			[
				'label' => esc_html__( 'Testimonials', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'background_image',
			[
				'label'   => esc_html__( 'BG Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your BG Image', 'aabot-elementor' ),
			]
		);		

		$this->add_control(
			'test_img',
			[
				'label'   => esc_html__( 'Testimonial Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Testimonial Image', 'aabot-elementor' ),
			]
		);

		$this->add_control(

			'tabs',
			[
				'label' => esc_html__( 'Testimonial Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Testimonial #1', 'aabot-elementor' ),
					]
				],
				'fields' => [	
				    [
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Testimonial Image', 'aabot-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],					    	
					[
						'name'        => 'tab_title',
						'label'       => esc_html__( 'Title', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Jon Haris' , 'aabot-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'designation_name',
						'label'       => esc_html__( 'Designation Name ', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Founder At' , 'aabot-elementor' ),
						'label_block' => true,
					],		
					[
						'name'       => 'tab_desc',
						'label'      => esc_html__( 'Description', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Description here....', 'aabot-elementor' ),
						'placeholder'    => esc_html__( 'Enter Description here....', 'aabot-elementor' ),
						'show_label' => true,
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

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract( $settings );

   		$image_src = wp_get_attachment_image_src( $settings['background_image']['id'], 'full' );
		$background_image_url = $image_src ? $image_src[0] : '';    		

		$test_image_src = wp_get_attachment_image_src( $settings['test_img']['id'], 'full' );
		$test_image_src_url = $test_image_src ? $test_image_src[0] : ''; 

		?>

        <section id="journey" class="testimonial-area pt-120">
            <div class="container">
                <div class="testi-bg theme-bg" style="background-image: url(<?php print esc_url($background_image_url); ?>)">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-0 order-lg-2">
                        	<?php if($test_image_src_url) : ?>
                            <div class="testimonial-img">
                                <img src="<?php print esc_url($test_image_src_url); ?>" alt="img">
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-active">
								<?php foreach ( $settings['tabs'] as $item ) : 
									extract($item);
									$bg_src = wp_get_attachment_image_src( $tab_image['id'], 'full' );
									$author_image = $bg_src ? $bg_src[0] : ''; 
								?>
                                <div class="testi-content">
                                    <div class="testi-icon">
                                        <i class="pe-7s-chat"></i>
                                    </div>
                                    <h4><?php print wp_kses_post( $tab_desc ); ?></h4>
                                    <div class="testi-avatar">
                                    	<?php if($test_image_src_url) : ?>
                                        <div class="testi-avatar-thumb">
                                            <img src="<?php echo esc_url($author_image); ?>" alt="img">
                                        </div>
                                        <?php endif; ?>
                                        <div class="testi-avatar-info">
                                            <h5><?php print wp_kses_post( $tab_title ); ?></h5>
                                            <span><?php print wp_kses_post( $designation_name ); ?></span>
                                        </div>
                                    </div>
                                </div>
								<?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	<?php
	}

}