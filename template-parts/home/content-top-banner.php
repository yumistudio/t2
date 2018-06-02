<section id="top-swiper" class="">
	<div id="home_main-banner" class="swiper-container">
		<div class="swiper-wrapper">
		
			<?php // loop through the rows of data
			
			$i = 0;
			$my_fields = get_field_object('hp_top_slides');
			$count = (count($my_fields['value']));
			
			while ( have_rows('hp_top_slides') ) : the_row(); ?>
			<div class="swiper-slide animation-1">
				<div class="cover cover-1"></div>
				<div class="row align-items-start no-gutters">
					<div class="col-12 col-lg-7 d-flex align-items-stretch">
						<div class="main-image">
							<img class="img-fluid" src="<?php the_sub_field('main_image'); ?>" />
							<div class="image-layer">
								<img class="img-fluid" src="<?php the_sub_field('layer_image'); ?>" />
							</div>
						</div>
						<div class="d-flex d-lg-none flex-column align-items-center justify-content-center navigation mobile">
							<div class="swiper-button-next">
								<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
							</div>
							<div class="swiper-counter d-flex align-items-center text-center">
								<div class="slide-no"><?php printf("%02d", ($i + 1) ); ?></div>
								<div class="total"><?php printf("%02d", $count); ?></div>
							</div>
		    				<div class="swiper-button-prev">
		    					<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-left')); ?>
		    				</div>
						</div>
					</div>
					<div class="col-10 col-lg-5 d-flex text-pane">
						<div class="col-2 d-none d-lg-flex flex-column align-items-center justify-content-center navigation desktop">
							<div class="swiper-button-next">
								<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
							</div>
							<div class="swiper-counter text-center">
								<div class="slide-no"><?php printf("%02d", ($i + 1) ); ?></div>
								<div class="total"><?php printf("%02d", $count); ?></div>
							</div>
		    				<div class="swiper-button-prev">
		    					<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-left')); ?>
		    				</div>
						</div>
						<div class="offset-lg-1 col-lg-9">
							<?php the_sub_field('slide_text'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php $i++; endwhile; ?>
		</div>
	</div>
<script>
(function( $ ) {
	$(function() {

		$(window).resize(function() {

		});
		
	    var swiper = new Swiper('#home_main-banner', {
	    	loop: true,
	    	speed: 0,
	    	effect: 'fade',
	    	on: {
	    		slideChange: function() {
	    			var slider = this;
	    			slider.slides.eq(this.previousIndex).addClass('swiper-slide-last');
	    			setTimeout(function(){ 
	    				slider.slides.eq(this.previousIndex).removeClass('swiper-slide-last');
	    			}, 500);
	    		},
	    	},
	    });
		
	    swiper.slides.each(function() {
	    	$(this).find('.swiper-button-next').click(function() {
		    	swiper.slideNext();
		    });

		    $(this).find('.swiper-button-prev').click(function() {
		    	swiper.slidePrev();
		    });
	    });
	});
})( jQuery );
</script>
</section>