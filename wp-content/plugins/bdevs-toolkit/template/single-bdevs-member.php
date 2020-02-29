<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  MediDove
 */
get_header(); ?>

<div class="doctor-details-area pt-115 pb-70">
    <div class="container">
        <div class="row">
        <?php 
            if( have_posts() ):
            while( have_posts() ):the_post();
                    $designation = get_post_meta(get_the_ID(), 'member_designation', true);
                    $facebook = get_post_meta(get_the_ID(), 'profile_fb_url', true);
                    $twitter = get_post_meta(get_the_ID(), 'profile_twitter_url', true);
                    $behance = get_post_meta(get_the_ID(), 'profile_behance_url', true);
                    $pinterest = get_post_meta(get_the_ID(), 'profile_pinterest_url', true);
                    $linkedin = get_post_meta(get_the_ID(), 'profile_linkedin_url', true);
                    $educational_infos = get_post_meta(get_the_ID(), 'educational_info_repeat_group', true); 

                    $place_lat = get_post_meta(get_the_ID(), 'place_lat', true);
                    $place_long = get_post_meta(get_the_ID(), 'place_long', true);

                    ?>
            <div class="col-xl-7 col-lg-8">
                <article class="doctor-details-box">
                    <?php the_content(); ?>
                    <div id="member-map" class="service-map mb-55"></div>

                    <div class="map-script">
                        <script>
                            jQuery(document).ready(function() {
                                "use strict";
                                 google.maps.event.addDomListener(window, "load", init);
                        
                            function init() {
                                var mapOptions = {
                                   
                                    zoom: 11,
                                    scrollwheel: false,
                                    center: new google.maps.LatLng(<?php print esc_html($place_lat); ?>, <?php print esc_html($place_long); ?>), // New York

                                   styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                                };

                                var mapElement = document.getElementById("member-map");

                                var map = new google.maps.Map(mapElement, mapOptions);

                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(<?php print esc_html($place_lat); ?>, <?php print esc_html($place_long); ?>),
                                    map: map,
                                    title: "Snazzy!"
                                });
                            }

                            });
                        </script>
                    </div>

                </article>
            </div>


            <div class="col-xl-5 col-lg-4">
                <div class="service-widget mb-50">
                    <div class="team-wrapper team-box-2 team-box-3 text-center mb-30">
                        <div class="team-thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="team-member-info mt-35 mb-35">
                            <h3><?php the_title(); ?></h3>
                            <h6 class="f-500 text-up-case letter-spacing pink-color"><?php echo wp_kses_post( $designation ); ?></h6>
                        </div>
                        <div class="team-social-profile">
                            <ul>
                                <?php if ($facebook): ?>
                                <li><a href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>

                                <?php if ($twitter): ?>
                                <li><a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>

                                <?php if ($behance): ?>
                                <li><a href="<?php print esc_url($behance); ?>"><i class="fab fa-behance"></i></a></li>
                                <?php endif; ?>

                                <?php if ($pinterest): ?>
                                <li><a href="<?php print esc_url($pinterest); ?>"><i class="fab fa-pinterest"></i></a></li>
                                <?php endif; ?>

                                <?php if ($linkedin): ?>
                                <li><a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if(is_array($educational_infos)): ?>
                <div class="service-widget mb-50">
                    <div class="widget-title-box mb-30">
                        <h3 class="widget-title"><?php print esc_html_e('Qualifications', 'bdevs-toolkit'); ?></h3>
                    </div>
                    <div class="more-service-list">
                        <ul>
                            <?php   foreach ($educational_infos as $value) { ?>
                            <li>
                                <a href="#">
                                    <div class="more-service-icon"><img src="<?php print $value['subject_icon']; ?>" alt="icon"></div>
                                    <div class="more-service-title doctor-details-title"><?php print $value['subject_name']; ?> <span><?php print $value['institute_name']; ?></span></div>
                                </a>
                            </li>
                            <?php  } ?> 
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                <?php do_action("medidove_member_sidebar"); ?>
            </div>
                <?php 
                endwhile; wp_reset_query();
            endif; 
        ?>
        </div>
    </div>
</div>


<?php get_footer();  ?>