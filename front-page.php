<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php get_template_part( 'template-parts/home/content', 'top-banner' ); ?>

		<section id="home_how-can-we-help" class="sp-x sp-y side-bars bg-white">
			<div class="container-fluid">
				<div class="row justify-content-center text-center">
					<div class="d-none d-lg-block"></div>
					<div class="col-md-10 col-lg-8">
						<h5>How can we help you</h5>
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						endif;
						?>
					</div>
					<div class="d-none d-lg-block"></div>
				</div>
			</div>
		</section>

		<?php get_template_part( 'template-parts/home/content', 'about-banner' ); ?>

<?php
$query = new WP_Query( array(
	'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => 16)
);
?>
		<section id="home_capabilities" class="sp-x sp-y bg-gray-100">
			<div class="container-fluid count-items hide-last-child">
				<?php $i=0; while ($query->have_posts()) : $query->the_post(); ?>
				<div class="row sp-y">
					<div class="d-inline-flex align-items-start offset-lg-1 col-md-5">
						<div class="index"></div>
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="col-md-7 col-lg-5">
						<p><?php the_field('home_page_description'); ?></p>
					</div>
				</div>
				<div class="offset-lg-1 col-lg-10 separator-line"></div>
				<?php $i++; endwhile; wp_reset_postdata(); ?>
			</div>

			<div class="sp-y text-center">
				<a href="/capabilities/" class="btn btn__effect">Read more about our Capabilities<span data-text="Read more about our Capabilities"></span></a>
			</div>
		</section>

		

		<section id="home_prefooter" class="bg-gray-900 color-white">

			<?php get_template_part( 'template-parts/home/content', 'footer-startproject' ); ?>
			
			<?php get_template_part( 'template-parts/home/content', 'footer-timezones' ); ?>

		</section>
	</main>
</div>

<?php get_footer();
