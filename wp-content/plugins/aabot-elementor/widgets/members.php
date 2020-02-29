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
class AabotMembers extends \Elementor\Widget_Base {

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
		return 'aabot-members';
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
		return __( 'Members', 'aabot-elementor' );
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
		return [ 'Member' ];
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
				'label' => esc_html__( 'Member Section', 'aabot-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'aabot-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'member-style-1'  => esc_html__( 'Member Style 1', 'aabot-elementor' ),
					'member-style-2' => esc_html__( 'Member Style 2', 'aabot-elementor' ),
				],
				'default'   => 'member-style-1',
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
				'condition' => [
					'chose_style' => ['member-style-1']
				],
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
				'condition' => [
					'chose_style' => ['member-style-1']
				],
			]
		);	

		$this->add_control(
			'background_image',
			[
				'label'   => esc_html__( 'Background Image', 'aabot-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Background Image Here', 'aabot-elementor' ),
			]
		);

		$this->end_controls_section();

		/** member info section **/
		$this->start_controls_section(
			'member_info_section',
			[
				'label' => esc_html__( 'Member Info', 'aabot-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Member Items', 'aabot-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Member #1', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'aabot-elementor' ),
					],
					[
						'tab_title'   => esc_html__( 'Member #2', 'aabot-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'aabot-elementor' ),
					],
				],
				'fields' => [					
					[
						'name'        => 'member_photo',
						'label'       => esc_html__( 'Member Photo', 'aabot-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'label_block' => true,
						'description' => esc_html__( 'Upload Member Image from here', 'aabot-elementor' ),
					],					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'It is name here..', 'aabot-elementor' ),
						'label_block' => true,
					],					
					[
						'name'        => 'designation',
						'label'       => esc_html__( 'Designation', 'aabot-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => __( 'It is designation.', 'aabot-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'facebook',
						'label'      => esc_html__( 'Facebook URL', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'show_label' => true,
						'label_block' => true,
					],
					[
						'name'       => 'twitter',
						'label'      => esc_html__( 'Twitter URL', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'show_label' => true,
						'label_block' => true,
					],
					[
						'name'       => 'behance',
						'label'      => esc_html__( 'Behance URL', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'show_label' => true,
						'label_block' => true,
					],
					[
						'name'       => 'linkedin',
						'label'      => esc_html__( 'Linkedin URL', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'show_label' => true,
						'label_block' => true,
					],
					[
						'name'       => 'youtube',
						'label'      => esc_html__( 'Youtube URL', 'aabot-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'show_label' => true,
						'label_block' => true,
					],
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
		extract($settings);

		$bg_image_src = wp_get_attachment_image_src( $settings['background_image']['id'], 'full' );
		$bg_image_url = $bg_image_src ? $bg_image_src[0] : '';

		// sub heading info
		$sub_heading_font_size = !empty($settings['sub_heading_font_size']) ? 'font-size:'.$settings['sub_heading_font_size'] : '';
		$sub_heading_n_title_gap = !empty($settings['sub_heading_n_title_gap']) ? 'margin-bottom:'.$settings['sub_heading_n_title_gap'] : '';
		$sub_heading_color = !empty($settings['sub_heading_color']) ? 'color:'.$settings['sub_heading_color'] : '';

		
		// heading info
		$heading_font_size = !empty($settings['heading_font_size']) ? 'font-size:'.$settings['heading_font_size'] : '';
		$heading_line_height = !empty($settings['heading_line_height']) ? 'line-height:'.$settings['heading_line_height'] : '';
		$heading_color = !empty($settings['heading_color']) ? 'color:'.$settings['heading_color'] : '';
		
		?>

        <section class="team-area pt-135 pb-100" data-background="<?php print esc_url($bg_image_url); ?>" >
            <div class="container">
                <div class="section-header text-center mb-80">
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
                <div class="row">
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
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                            	<?php
								if ( '' !== $member_photo['id'] )  :  
									$member_image_src = wp_get_attachment_image_src( $member_photo['id'], 'full' );
									$member_image_url = $member_image_src ? $member_image_src[0] : '';
								?>
                                <img src="<?php print esc_url($member_image_url); ?>" alt="">
                                <?php endif; ?>
                                <div class="team-link text-center">
                                    <ul>
                                    	<?php if($facebook) : ?> 
                                        <li><a href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                    	<?php endif; ?>
                                    	<?php if($twitter) : ?>
                                        <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($behance) : ?>
                                        <li><a href="<?php print esc_url($behance); ?>"><i class="fab fa-behance"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($linkedin) : ?>
                                        <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($youtube) : ?>
                                        <li><a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-text">
                                <h2><?php print wp_kses_post($title); ?></h2>
                                <p><?php print wp_kses_post($designation); ?></p>
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