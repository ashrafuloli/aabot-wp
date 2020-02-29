<div class="col-lg-6 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-40'); ?> >
        <?php if( has_post_thumbnail() ): ?>
        <div class="postbox__thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
            </a>
        </div>
        <?php endif; ?>
        <div class="postbox__text p-50">
            <div class="post-meta mb-15">
                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
                <span>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
                    </a>
                </span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title blog-title-2-col">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text mb-20">
               <p><?php print wp_trim_words(get_the_content(), 30, ''); ?></p>
            </div>
            <!-- blog btn -->
            <?php 
                $hexi_blog_btn     = get_theme_mod('hexi_blog_btn','Read More text'); 
                $hexi_blog_btn_icon     = get_theme_mod('hexi_blog_btn_icon','fas fa-angle-double-right'); 
                $hexi_blog_btn_switch     = get_theme_mod('hexi_blog_btn_switch'); 
                $hexi_blog_btn_icon_switch     = get_theme_mod('hexi_blog_btn_icon_switch'); 
            ?>
            <?php if( $hexi_blog_btn_switch ): ?>
            <div class="read-more mt-30">
                <a class="read-more" href="<?php the_permalink(); ?>"> 
                    <?php print esc_html($hexi_blog_btn); ?>
                    <?php if( $hexi_blog_btn_icon_switch ): ?>
                    <i class=" <?php print esc_attr($hexi_blog_btn_icon); ?>"></i>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </article>
</div>



