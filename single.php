<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
if ( is_active_sidebar( 'sidebar-1' ) ) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-12';
    $sidebar = 'col-lg-12';
}
 ?>
<section class="blog-details">
    <div class="container">
        <div class="row">
        <div class="<?php echo esc_attr($main);?>">
            <?php if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/singlecontent');

                endwhile;

            endif; ?>
        </div>
            <div class="<?php echo esc_attr($sidebar);?>">
                <?php get_template_part( 'layouts/sidebar', 'right' ); ?>
            </div>
        </div>
    </div> <!-- end container -->
</section>

<?php get_footer();