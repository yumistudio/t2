<?php
/**
 * Template Name: Problems We Solve
 *
 * @package WordPress
 * @since vilicon 1.0
 */


get_header();
?>

<section id="maincontent" class="one-column-section problems">

    <?php while ( have_posts() ) : the_post(); ?>
    
    <div class="container-fluid section-wrap section-padding bg-lightgrey">
        <div class="col-xs-12 col-sm-offset-1 col-sm-3">
            <h2>Here's How We Can Help</h2>
        </div>
        <div class="col-xs-12 col-sm-7 solution">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>
    </div>

    <div class="container-fluid section-padding">
        <div class="col-xs-12 col-sm-offset-1 col-sm-3">
            <h2>Other Problems</h2>
        </div>
        <div class="col-xs-12 col-sm-7">
            
            <?php
            $objects = get_posts( array('post_type' => 'problem', 'posts_per_page' => 100 ) );
            foreach ($objects as $post) : global $post; ?>
            <div class="item top-link">
                <div class="item-title">
                    <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
                    <strong><?php the_title(); ?></strong>
                </div>
                <div class="content">
                    <?php the_content(); ?>
                    <a class="dot-link" target="top" href="mailto:<?php echo ot_get_option('job_recruitment_email'); ?>">
                        Apply to this job
                    </a>
                </div>
            </div>        
            <?php endforeach; wp_reset_postdata(); ?>
            
        </div>
    </div>
    
    <?php endwhile; // End of the loop. ?>

</section>

<script>
(function( $ ) {
    $(function() {
        
        
    });
})( jQuery );
</script>

<?php get_footer(); ?>