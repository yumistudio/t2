<section id="maincontent" class="two-column-section">
	
	<?php get_template_part( 'template-parts/page/content', 'case-studies-link' ); ?>

	<div class="section-wrap">
		<div class="col-sm-offset-1 col-sm-11" >

			<div class="twoColumnGroup">
				<div class="column section-padding">
					<div class="container-fluid">
						
						<div class="headline col-xs-12 col-sm-11">
							<h2><?php the_field('headline'); ?></h2>
						</div>
						
						<img class="featured-image" src="<?php echo $featuredImage; ?>" />
						
						<div class="col-xs-12 col-sm-11">
							<?php the_content(); ?>
						</div>

					</div>

				</div>
				<div class="column section-padding">
					<div class="container-fluid">
						
						<div class="image-container round" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>

						<div class="col-md-offset-1 col-md-11">
							<?php get_template_part( 'template-parts/page/content', 'cta-buttons' ); ?>
						</div>

						<?php if ($bsh = get_field('bottom_section_headline')) {
							 echo '<div class="bottom-section col-sm-offset-1 col-sm-10">
							 		<h2>'.$bsh.'</h2>'.get_field('bottom_section_content').
							 	  '</div>';
						} ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
