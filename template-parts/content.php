<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4'); ?>>
    <div class="blog-single-item wow fadeInUp">
        <?php if ( has_post_thumbnail()) : ?>
            <div class="img-container">
                <a href="<?php echo esc_url( get_permalink() )?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        <?php endif; ?>
        <div class="news-content">
            <div class="date"><a href="#"> <?php get_the_time('M j, Y');?></a></div>
            <div class="title">
                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
            </div>
            <div class="pera-text">
                <p><?php the_excerpt();?></p>
            </div>
            <div class="news-bottom">
                <a href="<?php echo esc_url( get_permalink() )?>" class="readmore-btn"><?php echo esc_html__('Read More', 'rich-consulting')?></a>
                <?php richconsulting_comment();?>
            </div>
        </div>
    </div>
</div>