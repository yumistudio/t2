<section id="maincontent" class="one-column-section">
	
	<?php get_template_part( 'template-parts/page/content', 'case-studies-link' ); ?>

	<div class="container-fluid section-wrap section-padding bg-lightgrey">
		<div class="col-xs-12 col-sm-offset-1 col-sm-3">
			<h2><?php the_field('headline'); ?></h2>
		</div>
		<div class="col-xs-12 col-sm-7">
			<?php the_content(); ?>
			<?php get_template_part( 'template-parts/page/content', 'cta-buttons' ); ?>
		</div>
	</div>

	<?php if ($bsh = get_field('bottom_section_headline')) : ?>
	<div class="container-fluid section-padding">
		<div class="col-xs-12 col-sm-offset-1 col-sm-3">
			<h2><?php echo $bsh; ?></h2>
		</div>
		<div class="col-xs-12 col-sm-7">
			<?php the_field('bottom_section_content'); ?>
		</div>

		<?php if ($bsh2 = get_field('bottom_section_headline_2')) : ?>
		
			<div class="col-xs-12 col-sm-offset-1 col-sm-3">
				<h2><?php echo $bsh2; ?></h2>
			</div>
			<div class="col-xs-12 col-sm-7">
				<?php the_field('bottom_section_content_2'); ?>
			</div>
		
		<?php endif; ?>
	</div>
	<?php endif; ?>

	

</section>

<div></div>
<?php get_template_part( 'template-parts/page/content', 'generic-slider' ); ?>

<?php get_template_part( 'template-parts/page/content', 'case-studies-slider' ); ?>

<?php get_template_part( 'template-parts/page/content', 'download-form' ); ?>

<?php get_template_part( 'template-parts/page/content', 'popup' ); ?>