<?php
/**
 * Template Name: Single Service
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
$parent = $post->post_parent;
?>

<div id="header" class="" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <div class="headerInner container-fluid">
        
        <h1><?php the_title(); ?></h1>
        
    </div>	
</div>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/page/content', 'service' );

endwhile; // End of the loop.
?>

<?php get_footer(); ?>
