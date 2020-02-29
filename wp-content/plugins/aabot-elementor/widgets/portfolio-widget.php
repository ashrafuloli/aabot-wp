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
class AabotPortfolio extends \Elementor\Widget_Base {

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
		return 'aabot-portfolio-post';
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
		return __( 'Portfolio', 'aabot-elementor' );
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
		return [ 'portfolio' ];
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
			'section_content_portfolio_post',
			[
				'label' => esc_html__( 'Portfolio Post', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'aabot-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'portfolio_two_collumn'  => esc_html__( 'Portfolio Two Collumn', 'aabot-elementor' ),
					'portfolio_three_collumn' => esc_html__( 'Portfolio Three Collumn', 'aabot-elementor' ),
					'portfolio_three_collumn_btn' => esc_html__( 'Portfolio Three Collumn Btn', 'aabot-elementor' ),
				],
				'default'   => 'portfolio_three_collumn',
				'label_block'   => 'true',
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
				'default'   => '6',
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
		extract( $settings );
		$order = $settings['post_order'];
		$post_number = $settings['post_number'];
		$chose_style = $settings['chose_style'];

		// sub heading info
		$sub_heading_font_size = !empty($settings['sub_heading_font_size']) ? 'font-size:'.$settings['sub_heading_font_size'] : '';
		$sub_heading_n_title_gap = !empty($settings['sub_heading_n_title_gap']) ? 'margin-bottom:'.$settings['sub_heading_n_title_gap'] : '';
		$sub_heading_color = !empty($settings['sub_heading_color']) ? 'color:'.$settings['sub_heading_color'] : '';

		
		// heading info
		$heading_font_size = !empty($settings['heading_font_size']) ? 'font-size:'.$settings['heading_font_size'] : '';
		$heading_line_height = !empty($settings['heading_line_height']) ? 'line-height:'.$settings['heading_line_height'] : '';
		$heading_color = !empty($settings['heading_color']) ? 'color:'.$settings['heading_color'] : '';

	    $q = new \WP_Query(array(
	    	'posts_per_page' => $post_number,
	    	'post_type' => 'aabot-portfolio',
	    	'orderby' => 'menu_order title',
	    	'order' => $order
	    ));
	    

	    //other style
	    $args = array(
	    	'posts_per_page' => $post_number,
	    	'post_type' => 'aabot-portfolio',
	    	'orderby' => 'menu_order title',
	    	'order' => $order
	    );
	    $filteArr = array();
	    $postArr = new \WP_Query($args);

	    if( is_array($postArr->posts) && !empty($postArr->posts) ) {

	        foreach($postArr->posts as $item) {
	            $taxsArr = wp_get_post_terms($item->ID, 'portfolio_categories', array("fields" => "all"));
	            if(is_array($taxsArr) && !empty($taxsArr)) {
	                foreach($taxsArr as $tax) {
	                    $filteArr[$tax->slug] = $tax->name;
	                }
	            }
	        }
	    }

	    // var_dump($filteArr);
	    if( is_array($filteArr) && !empty($filteArr) ):


		?>

		<?php if( $chose_style == 'portfolio_three_collumn' ): ?>

        <section class="pt-135 pb-105 gray-bg">
            <div class="section-header text-center mb-50">
                <?php 
                if (( '' !== $settings['sub_heading'] ) && ( $settings['show_sub_heading'] )) : ?>
					<span style="<?php print esc_attr( $sub_heading_font_size ); ?>;  <?php print esc_attr( $sub_heading_color ); ?>;  <?php print esc_attr( $sub_heading_n_title_gap ); ?>;"><?php echo wp_kses_post($settings['sub_heading']); ?></span>
				<?php 
				endif; ?>	

                <?php 
                if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
					<h2 style="<?php print esc_attr( $heading_font_size ); ?>;  <?php print esc_attr( $heading_color ); ?>; <?php print esc_attr( $heading_line_height ); ?>;"><?php echo wp_kses_post($settings['heading']); ?></h2>
				<?php 
				endif; ?>	
            </div>
            <div class="container">
                <div class="row">
                    <!-- START PORTFOLIO FILTER AREA -->
                    <div class="col-12">
                        <div class="my-masonry mb-30">
                            <div class="button-group filter-button-group text-center">
                                <button class="active" data-filter="*"><?php print esc_html__('Show all','aabot-elementor'); ?></button>
								<?php 
			                    foreach($filteArr as $tax_slug => $tax_name) { ?>
                                <button data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
								<?php 
			                    }
			                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTFOLIO FILTER AREA -->
                </div>
                <div class="row grid">
                    <div class="col-xl-4 col-lg-4 col-md-6 grid-sizer"></div>
			        <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j == 1 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
                    <div class="col-xl-<?php print esc_attr($column_num); ?> col-lg-4 col-md-6 grid-item <?php print esc_attr($item_classes); ?>">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-image">
                                    <?php the_post_thumbnail('aabot-gallery-thumb'); ?>
                                    <div class="view-icon">
                                    	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                        <a class="popup-image" href="<?php print esc_url($featured_img_url); ?>">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <span>
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? ', ' : '';
				                                     print esc_html($cat->slug . $exatra);

				                                    $count++;
				                                }
				                            }
				                        ?>
			                        </span>
			                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'portfolio_two_collumn' ): ?>
        <section class="portfolio-area pt-115 pb-90">
            <div class="container">
                <div class="row">
                    <!-- START PORTFOLIO FILTER AREA -->
                    <div class="col-12">
                        <div class="text-center">
                            <div class="portfolio-filter mb-40">
                                <button class="active" data-filter="*"><?php print esc_html__('Show all','aabot-elementor'); ?></button>
								<?php 
			                    foreach($filteArr as $tax_slug => $tax_name) { ?>
                                <button data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
								<?php 
			                    }
			                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTFOLIO FILTER AREA -->
                </div>
                <div id="portfolio-grid" class="row row-portfolio">
                    <div class="col-lg-6 col-md-6 grid-sizer"></div>
			        <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
                    <div class="col-lg-6 col-md-6 grid-item <?php print esc_attr($item_classes); ?>">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-image">
                                    <?php the_post_thumbnail('aabot-gallery-thumb'); ?>
                                    <div class="view-icon">
                                    	<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                        <a class="popup-image" href="<?php print esc_url($featured_img_url); ?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-caption">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p>
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? ', ' : '';
				                                     print esc_html($cat->slug . $exatra);

				                                    $count++;
				                                }
				                            }
				                        ?>
			                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
                </div>
            </div>
        </section>
        <?php elseif( $chose_style == 'portfolio_three_collumn_btn' ): ?>
	        <!-- Photo Gallery  -->
	        <div class="photo-gallery pt-180 pb-100">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
	                        <div class="section-title text-center pos-rel mb-75">
	                        	<?php 
	                        	if ( $settings['section_title_icon'] ) : ?>
	                            	<div class="section-icon">
	                                	<img class="section-back-icon" src="<?php print get_template_directory_uri(); ?>/img/section/section-back-icon.png" alt="">
	                            	</div>
	                            <?php 
	                        	endif; ?>

	                            <div class="section-text pos-rel">
									<?php 
									if (( '' !== $settings['sub_heading'] ) && ( $settings['show_sub_heading'] )) : ?>
										<h5 style="<?php print esc_attr( $sub_heading_font_size ); ?>;  <?php print esc_attr( $sub_heading_color ); ?>;  <?php print esc_attr( $sub_heading_n_title_gap ); ?>;"><?php echo wp_kses_post($settings['sub_heading']); ?></h5>
									<?php 
									endif; ?>	

	                                <?php 
	                                if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
										<h1 style="<?php print esc_attr( $heading_font_size ); ?>;  <?php print esc_attr( $heading_color ); ?>; <?php print esc_attr( $heading_line_height ); ?>;"><?php echo wp_kses_post($settings['heading']); ?></h1>
									<?php 
									endif; ?>
	                            </div>

		                        <?php 
		                        if ( $settings['section_title_line'] ) : ?>
		                            <div class="section-line pos-rel">
		                                <img src="<?php print get_template_directory_uri(); ?>/img/shape/section-title-line.png" alt="">
		                            </div>
	                            <?php 
	                        	endif; ?>
	                        </div>
	                    </div>
	                    <div class="col-sm-12">
	                        <div class="gallery-button mb-50">
	                            <div class="gallery-filter">
		                            <button class="active" data-filter="*"><?php print esc_html__('Show all','aabot-elementor'); ?></button>
									<?php 
				                    foreach($filteArr as $tax_slug => $tax_name) { ?>
	                                <button data-filter=".<?php print esc_attr($tax_slug); ?>"><?php print esc_html($tax_name); ?></button>
									<?php 
				                    }
				                    ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row gallery-portfolio">
	                <?php 
			        $j = 0;
			        while($q->have_posts()) : $q->the_post(); 

			        $j++;
			        $column_num = ( $j%1 == 0 AND $j < 2 ) ? 8 : 4;    
			        $item_classes = '';
			        $item_cats = get_the_terms( get_the_id(), 'portfolio_categories' );
			        if($item_cats):
			            foreach($item_cats as $item_cat) {
			                $item_classes .= $item_cat->slug . ' ';
			            }
			        endif;//endif

			        ?>
	                    <div class="col-lg-4 col-md-6 grid-gallery <?php print esc_attr($item_classes); ?>">
	                        <div class="h5gallery__wrapper pos-rel text-center mb-30">
	                            <div class="h5gallery-thumb">
	                                <?php the_post_thumbnail('aabot-gallery-thumb'); ?>
	                            </div>
	                            <div class="h5gallery-content">
	                                <a class="popup-image" href="<?php the_post_thumbnail_url(); ?>"><i class="fal fa-plus"></i></a>
	                                <h4 class="white-color"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                <span>
	                                    <?php 
				                            $cats = get_the_terms(get_the_ID(), 'portfolio_categories');

				                            if( is_array($cats) ){
				                                $cats_count = count($cats); $count = 1;
				                                 foreach ( $cats as $cat ) {
				                                    $exatra = ( $cats_count > $count ) ? '. ' : ''; ?>
				                                    <a href="#"><?php print esc_html($cat->slug . $exatra); ?></a>
													
													<?php 
				                                    $count++;
				                                }
				                            }
				                        ?>
									</span>
	                            </div>
	                        </div>
	                    </div>
					<?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
	                </div>
	            </div>
	        </div>
	        <!-- Photo Gallery end -->
        <?php endif; ?>		


		<?php endif; ?>
	<?php
	}

}