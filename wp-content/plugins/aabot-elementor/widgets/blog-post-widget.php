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
class AabotBlogPost extends \Elementor\Widget_Base {

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
		return 'aabot-blog-post';
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
		return __( 'Latest Blog', 'aabot-elementor' );
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
		return [ 'blog-post' ];
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
				'label' => esc_html__( 'Blog Post', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'order',
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

		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'aabot-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'3'  => esc_html__( '2', 'aabot-elementor' ),
					'6' => esc_html__( '4', 'aabot-elementor' ),
					'9' => esc_html__( '6', 'aabot-elementor' ),
					'12' => esc_html__( '8', 'aabot-elementor' ),
				],
				'default'   => '2',
			]
		);

		$this->add_control(
			'cat',
			[
				'label'       => __( 'Category Slug', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter category slug here...', 'aabot-elementor' ),
				'label_block' => true,
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
		extract($settings);

	    $cat = get_term_by('slug', $cat, 'category');

	    if( !empty($cat->term_id) ){
	        $term_id = $cat->term_id;
	    }else{
	        $term_id = 1;
	    }

		?>

        <section class="blog-area pt-115 pb-160">
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

                <div class="row">
                	<?php 
	                $q = new \WP_Query(array(
	                    'post_type'     => 'post',
	                    'posts_per_page'=> $number,
	                    'orderby'       => 'menu_order title',
	                    'order'         => $order,
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'post_format',
	                            'field'    => 'slug',
								'terms' => array( 
					                'post-format-image', 
					            ),
	                            'operator' => 'IN',
	                        ),
	                    ),
	                ));

	                if($q->have_posts()):
	                    while($q->have_posts()): $q->the_post();  ?>
                    <div class="col-xl-6 col-lg-4 col-md-6">
                        <div class="single-blog wow fadeInLeft" data-wow-delay="0.2s">
                        	<?php if(has_post_thumbnail()): ?>
                            <div class="blog-thumb">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('hexi-blog-thumb'); ?></a>
                            </div>
                            <?php endif; ?>
                            <div class="blog-content">
                            	<div class="blog-s-meta mb-20">
	                                <span>
	                                	<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
								            <i class="far fa-user"></i> <?php print get_the_author(); ?> 
								        </a>
	                                </span>
	                                <span>
		                                <a href="<?php comments_link(); ?>">
		                                	<i class="far fa-comments"></i> <?php comments_number(); ?>
		                                </a>
	                                </span>
                                </div>
                                <h5>
                                	<a href="<?php the_permalink(); ?>">
                                		<?php print wp_trim_words(get_the_title(), 6, ''); ?>
                                	</a>
                                </h5>
                                <a href="<?php the_permalink(); ?>"><i class="fal fa-long-arrow-right"></i></a>
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