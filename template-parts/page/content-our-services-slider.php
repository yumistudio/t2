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
		<div class="col-sm-9 col-lg-offset-1 col-lg-9">
			<div class="controller">
				<?php foreach ($objects as $obj) : ?>
					<div class="item">
						<div class="item-active"><?php echo $obj->post_title; ?></div>
						<span><?php echo $obj->post_title; ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="side-cover"></div>
			<div class="side-cover right"></div>
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

		$('#objects-swiper').equalBoxes('.swiper-slide .content');
		
		var slider = new Swiper('#objects-swiper', {
		 	slidesPerView : 'auto',
	      	loop : false,
	      	effect: 'fade',
	      	spaceBetween: 5,
	      	speed : 800,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			fadeEffect: {
			    crossFade: true
			},
		});

		boundSliderAndController(slider, '.controller');
	});
})( jQuery );
</script>

<?php endif; ?>
