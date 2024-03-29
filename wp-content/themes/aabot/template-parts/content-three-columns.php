<div class="col-lg-4 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-40'); ?> >
        <?php if( has_post_thumbnail() ): ?>
        <div class="postbox__thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
            </a>
        </div>
        <?php endif; ?>
        <div class="postbox__text  p-30">
            <div class="post-meta mb-15">
                <span>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
                    </a>
                </span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title blog-title-sm">
                <a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 10, ''); ?></a>
            </h3>
            <div class="post-text mb-20">
               <p><?php print wp_trim_words(get_the_content(), 17, ''); ?></p>
            </div>
            <?php 
                $aabot_blog_btn     = get_theme_mod('aabot_blog_btn','Read More text'); 
                $aabot_blog_btn_icon     = get_theme_mod('aabot_blog_btn_icon','fas fa-angle-double-right'); 
                $aabot_blog_btn_switch     = get_theme_mod('aabot_blog_btn_switch'); 
                $aabot_blog_btn_icon_switch     = get_theme_mod('aabot_blog_btn_icon_switch'); 
            ?>
            <?php if( $aabot_blog_btn_switch ): ?>
            <div class="read-more mt-30">
                <a class="read-more" href="<?php the_permalink(); ?>"> 
                    <?php print esc_html($aabot_blog_btn); ?>
                    <?php if( $aabot_blog_btn_icon_switch ): ?>
                    <i class=" <?php print esc_attr($aabot_blog_btn_icon); ?>"></i>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </article>
</div>



