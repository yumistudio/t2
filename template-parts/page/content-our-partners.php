<div id="our-partners" class="one-column-section">
	
	<div class="container-fluid section-padding">
		<div class="col-xs-12 col-md-3">
			<h4>Our Partners</h4>
			<?php the_field('our_partners_intro'); ?>
		</div>
		<div class="col-xs-12 col-md-9 boxes-container">
			
            <?php
            $partners = get_posts( array('post_type' => 'partner', 'posts_per_page' => 2 ) );
            foreach ($partners as $post) : global $post; ?>
            <div class="col-xs-12 col-sm-4 box-wrap">
            	<a class="box hover-lift-shadow" href="/about/partners/">
	                <div class="headline">
	                    <h5 class="image"><div class="partner-logo" style="background-image: url('<?php echo wp_get_attachment_url(get_field('logo_for_box_headline'));?>');"></div></h5>
	                </div>
	                <div class="content">
	                    <?php the_field('intro_text', $post->ID); ?>
	                </div>
	                <div class="dot-link">Tell Me More</div>
	            </a>
	        </div>
            <?php endforeach; wp_reset_postdata(); ?>

            <?php $partners = get_posts( array('post_type' => 'partner', 'posts_per_page' => 100, 'offset'=>2 ) ); ?>
            <div class="col-xs-12 col-sm-4 box-wrap">
            	<div class="box swiper hover-lift-shadow">
	            	
	            	<div class="swiper-navi">
						
						<div class="swiper-pagination"></div>

						<div class="swiper-button-next">
					    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
					    </div>

					    <div class="swiper-button-prev">
					    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
					    </div>

					</div>
	                
	                <div id="partner-swiper" class="swiper-container">
						<div class="swiper-wrapper">
							<?php foreach ($partners as $post) : global $post; ?>
							<div class="swiper-slide">
	                    		<div class="">
	                    			<?php the_post_thumbnail('yumi-partner-logo'); ?>
	                    		</div>
	                    	</div>
	                    	<?php endforeach; wp_reset_postdata(); ?>
	                    </div>
	                </div>
	                <a href="<?php echo get_permalink('996'); ?>" class="dot-link" >View All</a>
	            </div>
            </div>
	        
		</div>
	</div>
<!-- Initialize Swiper -->
<script>
(function( $ ) {
	$(function() {
		
		$('.boxes-container').equalBoxes('.box')

		var swiper = new Swiper('#partner-swiper', {
			slidesPerView : 1,
			pagination: {
				el: '.swiper-pagination',
				type: 'fraction',
			},
			autoplay: {
		        delay: 3000,
		    	disableOnInteraction: true,
		    },
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	});
})( jQuery );
</script>
</div>
