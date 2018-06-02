<?php
/**
 * Template Name: Landing Page
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
while ( have_posts() ) : the_post();
?>

<section id="maincontent" class="landing-page">
	<div class="col-xs-12 col-lg-11 section-wrap bg-lightgrey">
		<div class="col-sm-offset-1 ">
			<div class="row flex-sm flex-even">
				<div class="section-padding no-left-padding">
					<h5><?php the_field('headline'); ?></h5>
					<?php if( have_rows('main_points') ): ?>
						<div class="simple-object-list benefits">
						<?php while ( have_rows('main_points') ) : the_row(); ?>
				            <div class="item expandable-item off">
				                <div class="item-title">
				                    <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
				                    <strong><?php the_sub_field('mp_item_title'); ?></strong>
				                </div>
				                <div class="content">
				                    <p><?php the_sub_field('mp_item_content'); ?></p>
				                </div>
				            </div>
		            	<?php endwhile; ?>
		            	</div>
		            <?php endif; ?>
		            <?php the_field('text_section_secondary'); ?>
		            <div class="center">
						<div class="dot-link next" data-scroll-to="#mainsection">Tell Me More</div>
					</div>
				</div>
				
				<div class="section-padding bg-darkgreen text-white">
					<div class="contact-form">
						<h2><?php the_field('lp_form_title'); ?></h2>
						<?php echo do_shortcode('[contact-form-7 id="1887" title="Landing Page"]'); ?>
						<p>or call:
							<a href="tel:01 500 9001">
								<span style="white-space: nowrap;">01 500 9001</span>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-lg-11 section-wrap">	
		<div class="col-sm-offset-1 ">
			<div class="row flex-sm flex-even">
				<div class="section-padding no-left-padding responsive-img">
					<?php the_post_thumbnail(); ?>
				</div>
			
				<div id="mainsection" class="section-padding no-left-padding no-right-padding">
					<?php the_content(); ?>
				</div>
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

<?php endwhile; // End of the loop. ?>

<?php get_template_part( 'template-parts/page/content', 'our-partners' ); ?>

<?php get_template_part( 'template-parts/page/content', 'crm-integration' ); ?>

<?php get_footer(); ?>


