<?php
/**
 * Template Name: Awards And Certifications
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
        <?php if(false) : ?>
        <div class="container-fluid">
            <div class="col-xs-12 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3">
                <h2>Our Awards</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-7">
                <?php
                $objects = get_posts( array('post_type' => 'award', 'posts_per_page' => 100 ) );
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
        <?php endif; ?>
        <div class="container-fluid">
            <div class="col-xs-12 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3">
                <h2>Our Certifications</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-7">
                <?php
                $objects = get_posts( array('post_type' => 'certification', 'posts_per_page' => 100 ) );
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