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
			'section_heading',
			[
				'label'       => __( 'Section Heading', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'News Feeds', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'section_description',
			[
				'label'       => __( 'Section Description', 'aabot-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur.', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'section_bg',
			[
				'label'   => esc_html__( 'Section Background', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add your Section Background', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'section_bg_overlay',
			[
				'label' => __( 'Background Overlay', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .news-area:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'section_bg_overlay_opacity',
			[
				'label' => __( 'Background Overlay Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => .5,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} > .news-area:before' => 'opacity: {{SIZE}};',
				],
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
					'3'  => esc_html__( '3', 'aabot-elementor' ),
					'6' => esc_html__( '6', 'aabot-elementor' ),
					'9' => esc_html__( '9', 'aabot-elementor' ),
					'12' => esc_html__( '122', 'aabot-elementor' ),
				],
				'default'   => '2',
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
			'section_heading_switch',
			[
				'label'   => esc_html__( 'Show Section Heading', 'aabot-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		extract($settings);

		$section_bg_src = wp_get_attachment_image_src( $settings['section_bg']['id'], 'full' );
		$section_bg = $section_bg_src ? $section_bg_src[0] : '';

		?>
		<?php if ($settings['section_heading_switch']) : ?>
		<div id="news" class="news-area pt-100" style="background-image: url(<?php print esc_url($section_bg); ?>)">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 mb-60">
						<!-- start section title -->
						<div class="section-title text-center light-title">
							<?php if ($settings['section_heading']) : ?>
								<h3><?php echo wp_kses_post($settings['section_heading']); ?></h3>
							<?php endif; ?>

							<?php if ($settings['section_description']) : ?>
								<p><?php echo wp_kses_post($settings['section_description']); ?></p>
							<?php endif; ?>
						</div>
						<!-- end section title -->
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="blog-area">
			<div class="container">
				<div class="row">
					<?php
					$q = new \WP_Query(array(
						'post_type'     => 'post',
						'posts_per_page'=> $settings['number'],
						'orderby'       => 'menu_order title',
						'order'         => $settings['order'],
					));

					if($q->have_posts()):
						while($q->have_posts()): $q->the_post();  ?>
							<div class="col-xl-4 col-lg-4 col-md-6">
								<!-- start skill -->
								<div class="blog-wrap">
									<?php if(has_post_thumbnail()): ?>
										<div class="blog-thumb">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('aabot-blog-thumb'); ?></a>
										</div>
									<?php endif; ?>
									<div class="blog-details">
										<ul class="blog-meta">
											<li>
												<a href="<?php print esc_url(get_day_link('y','m','j'))?>"><i class="fal fa-calendar-alt"></i> <?php print esc_html(get_the_date('jS F Y'))?></a>
											</li>
											<li>
												<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
													<i class="fal fa-user"></i> <?php print get_the_author(); ?>
												</a>
											</li>
										</ul>
										<h3 class="blog-title">
											<a href="<?php the_permalink(); ?>"><?php print wp_trim_words(the_title(), 6, ''); ?></a>
										</h3>
										<p>
											<?php print wp_trim_words(get_the_content(), 18, ''); ?>
										</p>
										<div class="tags">
											<?php echo get_the_category_list(esc_html_x(' ', 'Used between list items, there is a space after the comma.', 'aabot-elementor')); ?>
										</div>
									</div>
								</div>
								<!-- end skill -->
							</div>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>

				</div>
			</div>
		</div>

	<?php
	}
}