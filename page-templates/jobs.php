<?php
/**
 * Template Name: Careers
 *
 * @package WordPress
 * @since vilicon 1.0
 */


get_header();

while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/page/content', 'two-column' );

endwhile; // End of the loop.
?>
<?php if ( $objects = get_posts( array('post_type' => 'job', 'posts_per_page' => 100 ) ) ): ?>
<section id="jobs" class="">
    <div class="section-padding">
        <div class="container-fluid">
            <div class="col-xs-12 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-3">
                <h2>Job Vacancies</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-7 simple-object-list">
                <?php
                //$objects = get_posts( array('post_type' => 'job', 'posts_per_page' => 100 ) );
                $i=0;
                foreach ($objects as $post) : global $post; ?>
                <div class="item expandable-item<?php echo ($i ? ' off' :''); ?>">
                    <div class="item-title">
                        <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
                        <strong><?php the_title(); ?></strong>
                    </div>
                    <div class="content">
                        <p><?php echo $post->post_content; ?></p>
                        <a class="dot-link" target="top" href="mailto:<?php echo ot_get_option('job_recruitment_email'); ?>">
                            Apply to this job
                        </a>
                    </div>
                </div>        
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
(function( $ ) {
    $(function() {
        
        var initJobContainer = function() {
            $('.expandable-item').each(function() {
                var h = 0;
                $(this).children().each(function(){
                    h += $(this).outerHeight(true); 
                })
                $(this).innerHeight(h);
            });
        }

        initJobContainer();
        $(window).resize(initJobContainer);

        $('.expandable-item .item-title').click(function() {
            $(this).closest('.item').toggleClass('off');
        });
    });
})( jQuery );
</script>
<?php endif; ?>
<?php get_footer(); ?>