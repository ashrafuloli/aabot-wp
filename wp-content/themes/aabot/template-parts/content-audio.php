<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aabot
 */

if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-50'); ?> >
        <?php if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
        <div class="postbox__audio embed-responsive embed-responsive-16by9 mb-35">
            <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
        </div>
        <?php endif; ?>
        <div class="postbox__text bg-none">
            <div class="post-meta mb-15">
                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
                <span>
                    <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <i class="far fa-user"></i> <?php print get_the_author(); ?>
                    </a>
                </span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
            </div>
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="post-text mb-20">
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'aabot' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php print aabot_get_tag(); ?>
        </div>
    </article>
<?php
else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-50'); ?> >
        <?php if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
        <div class="postbox__audio embed-responsive embed-responsive-16by9 mb-30">
            <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
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
            <h3 class="blog-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text mb-20">
                <?php the_excerpt(); ?>
            </div>
            <!-- blog btn -->
            <div class="read-more mt-30">
                <a class="h-btn" href="<?php the_permalink(); ?>">
                    <code class="h-btn--inner"> <?php print esc_html__('Read More', 'aabot'); ?></code>
                </a>
            </div>
        </div>
    </article>
<?php
endif; ?>


