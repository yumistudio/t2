<?php
/**
 * Template Name: About
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'two-column' );
		
endwhile; // End of the loop.
?>

<?php
$timepoints = get_posts(array(
	'posts_per_page' => -1,
	'post_type' => 'timepoint',
	'order' => 'desc',
));
?>
<div class="container-fluid"></div>
<div id="timeline" class="container-fluid section-padding">
	<div class="col-xs-12 col-sm-3 col-lg-offset-1 col-lg-3">
		<h2>timeline</h2>
	</div>
	<div class="cl-xs-12 col-sm-9 col-lg-8">
		<div class="timepoint first">
			<div class="year"></div>
			<div class="lines"><div><div class="dot"></div></div></div>
			<div class="title"></div>
		</div>
		<?php $i = 0; foreach ($timepoints as $post): global $post?>
			<?php
			$classtr = '';
			if(has_post_thumbnail() || get_field('svg_icon_name')) $classtr .= ' milestone';
			if(($i+1) === count($timepoints)) $classtr .= ' latest'; ?>
			<div class="timepoint<?php echo $classtr; ?>">
				<div class="year">
					<?php echo get_field('year', $post->ID); ?>
				</div>
				<div class="lines"><div><div class="dot">
				<?php
				if ($logo = get_field('svg_icon_name'))
					echo twentyseventeen_get_svg(array('icon'=>$logo));
				elseif (has_post_thumbnail())
					the_post_thumbnail('yumi-timepoint');
				?>
				</div></div></div>
				<div class="title"><?php the_title(); ?></div>
			</div>
		<?php $i++; endforeach; ?>
		<div class="timepoint last">
			<div class="year"></div>
			<div class="lines">
				<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?><br/>
				<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?><br/>
				<?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
			</div>
			<div class="title"></div>
		</div>
	</div>
</div>
<div id="our-people" class="container-fluid section-padding">
<?php
$terms = get_terms(array(
    'taxonomy' => 'roles',
    'hide_empty' => true,
) );
foreach ($terms as $term): ?>
	<div class="col-xs-12 col-sm-3 col-lg-offset-1 col-lg-3">
		<h2><?php echo $term->name; ?></h2>
	</div>
	<div class="col-xs-12 col-sm-9 col-lg-7 person-boxes">
		<?php
		$posts = get_posts(
		    array(
		        'posts_per_page' => -1,
		        'post_type' => 'person',
		        'tax_query' => array(
		            array(
		                'taxonomy' => 'roles',
		                'field' => 'term_id',
		                'terms' => $term->term_id,
		            )
		        )
		    )
		);
		foreach ($posts as $post): global $post ?>
			<div class="col-xs-10 col-sm-4 person-box">
				<div class="person">
					<?php the_post_thumbnail('yumi-partner-logo'); ?>
					<div class="name"><strong><?php echo get_field('first_name') . ' ' . get_field('last_name'); ?></strong></div>
					<div class="position"><?php the_field('position'); ?></div>
					<div class="details"><?php echo $post->post_content; ?></div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="toggle-wrap">
			<div class="dot-link toggle-open">Show all</div>
			<div class="dot-link toggle-close">Show less</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div id="download-form" class="main-overlay person-details text-white">

	<div class="close-btn">
        <span></span><span></span>
    </div>
	<div class="contact-form">
		<div class="download-form-wrap do-nicescrol">
			<div class="person-details">

			</div>
		</div>

	</div>

</div>
<script>
(function( $ ) {
	$(function() {
		$('.person-boxes').equalBoxes('.person-box > div');
		setPersonBoxesHeight();
		$(window).resize(setPersonBoxesHeight);
		$('.person-boxes > .toggle-wrap > div').click(function() {
			
			$(this).closest('.person-boxes').toggleClass('open');
			
			//if(container.hasClass('open')) {
			//	container.removeClass""
			//}
		});

		var cnt = $('#download-form .person-details');
		$('.person-box').click(function() {
			cnt.empty().append($(this).children('div').clone());
			$('#download-form').toggleClass('on');
		});
	});
})( jQuery );
</script>
<?php get_footer(); ?>