<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>

<div class="service-details-area pt-120 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="service-widget mb-50">
                    <?php 
                        $q = new WP_Query(array(
                            'posts_per_page' => 6,
                            'post_type' => 'bdevs-service',
                            'post__not_in'=>array(get_the_ID())
                        ));
                        if($q->have_posts()):
                    ?>
                    <div class="service-widget-list">
                        <ul class="mb-0">  
                            <?php while($q->have_posts()): $q->the_post();  ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <?php do_action("hexi_service_sidebar"); ?>
            </div>
            <div class="col-xl-8 col-lg-8">
            <?php 
			if( have_posts() ):
				while( have_posts() ): the_post();
					$service_subtitle = get_post_meta(get_the_ID(),'service_subtitle',true);
					$bdevs_service_thumb = get_post_meta(get_the_ID(),'service_thumb',true);
					?>
                <article class="service-details-box">
                    <?php if($bdevs_service_thumb) : ?>
                    <div class="service-details-thumb mb-30">
                        <img src="<?php print wp_kses_post( $bdevs_service_thumb ); ?>" alt="Details Image">
                    </div>
                    <?php endif; ?>
                    <div class="service-details-text mb-30">
                        <h2><?php the_title(); ?></h2>
                       <?php the_content(); ?>
                    </div>
                </article>
                <?php 
				endwhile; wp_reset_query();
			endif; 
			?>
            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer();  ?>