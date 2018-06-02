<section id="about-swiper">
	<div id="home_about-banner" class="swiper-container">
		<div class="swiper-wrapper">
			<?php while ( have_rows('hp_about_slides') ) : the_row(); ?>
			<div class="swiper-slide">
				<div class="cover cover-1"></div>
				<div class="row no-gutters bg-gray-900">
					<div class="col-12 offset-lg-1 col-lg-4 d-flex flex-column align-items-center justify-content-center">
						<div class="sp-y text-pane"><?php the_sub_field('slide_text'); ?></div>
					</div>
					<div class="col-12 offset-lg-1 col-lg-6">
						<img class="img-fluid" src="<?php the_sub_field('slide_image'); ?>" />
					</div>
				</div>
			</div>
			<?php $i++; endwhile; ?>
		</div>
		<div class="row align-items-center justify-content-center navigation">
			<div class="col-6 col-lg-1 swiper-button-prev">
				<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-left')); ?>
			</div>
			<div class="col-6 col-lg-1 swiper-button-next">
				<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
			</div>
		</div>
	</div>
<script>
(function( $ ) {
	$(function() {

	    var swiper = new Swiper('#home_about-banner', {
	    	loop: true,
	    	speed: 0,
	    	effect: 'fade',
	    	on: {
	    		slideChange: function() {
	    			var slider = this;
	    			slider.slides.eq(this.previousIndex).addClass('intermediate');
	    			setTimeout(function(){ 
	    				slider.slides.eq(this.previousIndex).removeClass('intermediate');
	    			}, 500);
	    		},
	    	},
	    });
	});
})( jQuery );
</script>
</section>