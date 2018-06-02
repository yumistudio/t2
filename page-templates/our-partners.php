<?php
/**
 * Template Name: Our Partners
 *
 * @package WordPress
 * @since vilicon 1.0
 */

get_header();

while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/page/content', 'one-column' );

endwhile; // End of the loop.
?>
<section id="our-awards" class="awards-certs">
    <div class="section-padding">
        <div class="container-fluid">
            <div class="col-xs-12 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3">
                <h2>Our Partners</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-7">
                <?php
                $objects = get_posts( array('post_type' => 'partner', 'posts_per_page' => 100 ) );
                foreach ($objects as $post) : global $post; ?>
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-lg-3">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <?php echo $post->post_content; ?>
                    </div>
                </div>        
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>