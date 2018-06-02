<?php

global $post;

if ($post->post_parent == 76) :

$args = array(
	'include' => array(109, 9, 112),
); 
$pages = get_pages($args); 
?>

<?php
$boxes = get_field_object('boxes');
$count = count($boxes['value']);
$cols = 12 / $count;
?>
<div id="our-services-section">
	<div class="container-fluid section-padding">
		<div class="">
			<div class="col-xs-12 col-md-3">
				<h4>Our Services</h4>
				<div class="intro-text"><?php the_field('intro_text') ?></div>
			</div>
			<div class="col-xs-12 col-md-9 boxes-container do-nicescrol">
				<?php if ($count==4) echo '<div class="scrollable">'; ?>
				<?php while ( have_rows('boxes') ) :
					the_row();
					$page = get_sub_field('page'); ?>
				<div class="col-xs-12 <?php echo ($count == 3 ? 'col-sm-4' : 'col-sm-6 col-md-3') ; ?> box-wrap">
					<a class="box hover-lift-shadow" href="<?php echo get_permalink($page->ID); ?>">
						<div class="headline">
							<h5><?php echo $page->post_title; ?></h5>
						</div>
						<div class="content">
							<?php the_sub_field('intro_text'); ?>
						</div>
						<div class="dot-link">Tell Me More</div>
					</a>
				</div>
				<?php endwhile; ?>
				<?php if ($count==4) echo '</div>'; ?> 
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<script>
(function( $ ) {
	$(function() {

		$('.boxes-container').equalBoxes('.box');
		/*
		boxesContainer = $('.boxes-container');
		$(window).resize(function() {
			equalBoxes(boxesContainer);
		});
		equalBoxes(boxesContainer);
		*/
	});
})( jQuery );
</script>