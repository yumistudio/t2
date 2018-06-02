<?php
/**
 * Template Name: One Column
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

<section id="maincontent" class="one-column-section">

	<?php get_template_part( 'template-parts/page/content', 'case-studies-link' ); ?>

	<div class="container-fluid section-wrap section-padding bg-lightgrey">
		
		<div class="col-xs-12 col-sm-offset-1 col-sm-2">
			<h2><?php the_field('headline'); ?></h2>

		</div>
		
		<div class="col-xs-12 col-sm-7">
			
			<?php the_content(); ?>

			<?php get_template_part( 'template-parts/page/content', 'cta-buttons' ); ?>
		
		</div>
		
	</div>

	
	<div class="section-wrap section-padding">
		
		<div class="col-sm-offset-1 col-sm-11">

			<div class="col-xs-12 col-sm-3">
				<h2><?php echo $bsh; ?></h2>
			</div>
			
			<div class="col-xs-12 col-sm-8">
				
				<?php the_field('bottom_section_content'); ?>
			
			</div>

		</div>
		
	</div>
	
</section>

<?php endwhile; // End of the loop. ?>

<?php get_template_part( 'template-parts/page/content', 'generic-slider' ); ?>

<?php get_template_part( 'template-parts/page/content', 'case-studies-slider' ); ?>

<?php get_template_part( 'template-parts/page/content', 'download-form' ); ?>

<?php get_footer(); ?>


