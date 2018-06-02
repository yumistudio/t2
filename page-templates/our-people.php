<?php
/**
 * Template Name: Our People
 *
 * @package WordPress
 * @since vilicon 1.0
 */

get_header();
//global $post;
$people = get_posts( array('post_type' => 'person', 'posts_per_page' => 100 ) );
the_post();
?>

<div id="header" class="" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <div class="headerInner container-fluid">
        
        <h1><?php the_title(); ?></h1>
        
    </div>	
</div>

<section class="container-fluid add-next-scroll">
	<?php the_content(); ?>
</section>
<section class="objectList bg-lightgrey">
	<div class="posts">
<?php
foreach( $people as $post ) :
	global $post;
	?>
	<div class="white-text item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
		<div class="ct-overlay"></div>
		<div class="title"><?php the_title(); ?></div>
		<div class="bg-overlay">
			<p><?php echo get_field('short_description'); ?></p>
			<a class="btn" href="<?php echo get_permalink(); ?>">Read more</a>
		</div>
		<div class="content">
			<h2><?php the_title(); ?>, <?php echo get_field('short_description'); ?></h2>
			<?php echo $post->post_content; ?>
		</div>
	</div>
	<?php endforeach; wp_reset_postdata();// End of the loop. ?>
	
	</div>
	
	<div id="bioBox">
		<div class="content"></div>
		<div class="close-btn navbar-toggle close">
	        <span></span>
	        <span></span>
	    </button>
	</div>

</section>
<?php get_footer(); ?>