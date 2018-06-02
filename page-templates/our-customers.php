<?php
/**
 * Template Name: Our Customers
 *
 * @package WordPress
 * @since vilicon 1.0
 */

get_header();
$parent = $post->post_parent;
$clients = get_posts(array(
	'numberposts'	=> 1000,
	'post_type'		=> 'client',
));
?>

<div id="header" class="" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <div class="headerInner container-fluid">
        <h1><?php the_title(); ?></h1>
    </div>	
</div>
<section id="ourCustomers" class="container-fluid">	
	<div class="col-md-offset-1 col-md-10 col-xs-12">
		<div class="entry-content">
			<?php while ( have_posts() ) : the_post();
				the_content();
			endwhile; // End of the loop. ?>
		</div>
	</div>
	<div class="col-sm-offset-1 col-sm-10">
		<?php foreach($clients as $client) : ?>
		<div class="item col-sm-3 col-xs-4">
			<img src="<?php echo wp_get_attachment_url(get_field( 'image', $client->ID)); ?>" class="img-responsive center-block">
		</div>
		<?php endforeach; ?>
	</div>
</section>

<?php get_footer(); ?>
