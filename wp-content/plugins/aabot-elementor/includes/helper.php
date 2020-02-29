<?php 
namespace AabotElementor\Helper;

// BDT Position
function element_pack_position() {
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