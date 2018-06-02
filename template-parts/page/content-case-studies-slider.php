<?php
global $caseStudies;
if (is_array($caseStudies) && !empty($caseStudies)): ?>

<div id="case-studies" class="section-padding text-white">
	<div class="container-fluid">

		<div class="col-xs-12 col-md-3">
			<h4>Case Studies</h4>
			<?php the_field('case_studies_introduction_text'); ?>
		</div>

		<div class="swiper-navi">
			<div class="swiper-button-next cs">
		    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
		    </div>
		    <div class="swiper-button-prev cs">
		    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
		    </div>
		</div>
		
		<div class="swiper-outer-wrap col-xs-12 col-md-9">
			<div class="swiper-container case-studies">
				<div class="swiper-wrapper">
				
					<?php foreach ($caseStudies as $post) : global $post; ?>
					<?php $is_testimonial = get_field('is_testimonial'); ?>
					<div class="swiper-slide<?php echo (count($objects) == 1 ? ' single' : ''); ?>">
						<div class="swiper-slide-wrap lift-shadow ">
							<div>
								<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
							</div>
							<div class="content">
								<h5 id="case-study-title"><?php the_field('download_title'); ?></h5>
								<?php if (isset($is_testimonial[0])) echo '<div class="' . (get_field('display_as_testimonial') ? ' testimonial' : '') . '">'; ?>
								<?php echo $post->post_content; ?>
								<?php if (isset($is_testimonial[0])) echo '</div>'; ?>
								<a id="downloads_form_button" class="download with-form" href="#" data-file-id="<?php the_field('file'); ?>" data-title="<?php the_title(); ?>" data-form-id="<?php the_field('autotask_form_id'); ?>" data-ci="<?php the_field('autotask_ci'); ?>">
									<?php echo twentyseventeen_get_svg(array('icon'=>'download')); ?>
									Download
								</a>
							</div>
						</div>
					</div>
					
				<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

 
