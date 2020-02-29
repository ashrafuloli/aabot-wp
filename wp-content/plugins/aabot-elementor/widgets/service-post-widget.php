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
class AabotServicePost extends \Elementor\Widget_Base {

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
		return 'aabot-service-post';
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
		return __( 'Post Services', 'aabot-elementor' );
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
		return 'eicon-post-content';
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
		return [ 'service-post' ];
	}

	public function get_script_depends() {
		return [ 'aabot-elementor'];
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_service_post',
			[
				'label' => esc_html__( 'Section Service Post', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'aabot-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '3', 'aabot-elementor' ),
					'6' => esc_html__( '6', 'aabot-elementor' ),
					'9' => esc_html__( '9', 'aabot-elementor' ),
					'12' => esc_html__( '12', 'aabot-elementor' ),
				],
				'default'   => '8',
			]
		);

		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'aabot-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'aabot-elementor' ),
					'desc' => esc_html__( 'DESC', 'aabot-elementor' ),
				],
				'default'   => 'desc',
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
		$order = $settings['post_order'];
		$post_number = $settings['post_number'];

		?>

        <section class="services-area theme-bg pt-115 pb-155">
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
                
                <div class="row services-active">
					<?php 
					$q = new \WP_Query(array(
						'post_type'     => 'aabot-service',
					    'posts_per_page'=> $post_number,
					    'orderby' 		=> 'menu_order title',
					   	'order'			=> $order,
					));
					if($q->have_posts()):
						$number = 0;
						while($q->have_posts()): $q->the_post(); 
						$number++;
						$service_icon = get_post_meta(get_the_ID(),'service_icon',true);
					?>
                    <div class="col-xl-4">
                        <div class="single-services mb-50">
                            <div class="services-icon mb-35">
                                <i class="<?php print wp_kses_post( $service_icon ); ?>"></i>
                            </div>
                            <div class="services-content">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php print wp_trim_words(get_the_content(), 16, ''); ?></p>
                                <a href="<?php the_permalink(); ?>"><span>Discuss Now</span></a>
                            </div>
                        </div>
                    </div>
					<?php endwhile; 
						wp_reset_postdata(); 
						endif; 
					?>
                </div>
            </div>
        </section>

	<?php
	}

}