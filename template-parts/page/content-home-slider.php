<?php

global $post;

if ($post->post_parent == 121) :

	$objects = get_posts( array(
	    'post_parent' => $post->ID,
	    'post_type'    => 'page',
	    'posts_per_page' => -1,
	) );

?>
<div id="bottom-slider-section" class="section-padding">
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-offset-1 col-sm-11 col-lg-10">
			<h2>Services we offer</h2>
		</div>
	</div>
	<div class="slider-controller col-xs-hidden">
		<div class="thumbnails">
			<div class="col-sm-9 col-lg-10">
				<div class="controller">
    				<div class="controller-wrapper">
    					<?php foreach ($objects as $obj) : ?>
    						<div class="item"><?php echo $obj->post_title; ?></div>
    					<?php endforeach; ?>
    				</div>
    			</div>
    			<div class="side-cover"></div>
			</div>
			<div class="col-sm-3 col-lg-2">
				<div class="swiper-navi">
					<div class="swiper-button-next">
				    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
				    </div>
				    <div class="swiper-button-prev">
				    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-offset-1 col-sm-11 col-lg-10">
			<div id="objects-swiper" class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ($objects as $obj) : ?>
						<div class="swiper-slide">
							<div class="swiper-slide-wrap">
								<div>
									<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url($obj->ID); ?>');"></div>
								</div>
								<div class="content">
									<div class="headline"><?php echo $obj->post_title; ?></div>
									<?php the_field('introduction_text', $obj->ID); ?>
									<a class="dot-link" href="<?php echo get_permalink($obj->ID); ?>">Tell Me More</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
(function( $ ) {
	$(function() {
		var controller = $('.controller');
		var slides = new Swiper('#objects-swiper', {
		 	slidesPerView : 'auto',
	      	loop : false,
	      	effect: 'fade',
	      	spaceBetween: 5,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			fadeEffect: {
			    crossFade: true
			},
		});
		
		var scrollController = function() {
			var idx = $('#objects-swiper').find('.swiper-slide-active').index();
			var activeEl = controller.find('.swiper-slide:eq('+idx+')');
			
			activeEl.siblings().removeClass('active');
			activeEl.addClass('active');
			
			if(activeEl.visible() == false) {
				//controller.scrollTo(activeEl);		
				controller.animate({
				  scrollLeft: activeEl.offset().left
				}, 1000);
			}
		}

		slides.on('slideNextTransitionStart', function() {
			scrollController();
		});
		slides.on('slidePrevTransitionStart', function() {
			scrollController();
		});

		controller.find('.item').each(function(index) {
			$(this).click(function() {
				$(this).siblings().removeClass('active');
				$(this).addClass('active');

				slides.slideTo(index);
			})
		});
		controller.find('.item:first').addClass('active');

	});
})( jQuery );
</script>

<?php endif; ?>
