<?php 
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-45337951-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-45337951-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K86ZGNZ');</script>
<!-- End Google Tag Manager -->
</head>
<?php
if ( in_array(wp_get_post_parent_id( $post->ID ), array(1883,1915)) ) {
    $is_landing_page = true;
    set_query_var( 'is_landing_page', true );
    // extract( $wp_query->query_vars );
    //$landing_page_class = 'landing-page';
}

$the_title = get_the_title();
?>
<body <?php body_class(); ?>>
    <?php get_template_part( 'template-parts/page/header', 'googletagmanager' ); ?>
    
    <div id="ripples-container" class="">
        <div id="ripples" class="max-width">
            <div id="ripple"></div>
            <div id="ripple2"></div>
            <div id="ripple3"></div>
            <div id="ripple4"></div>
        </div>
    </div>

    <div id="top-navigation-bar" class="fixed-top">
        
        <div class="container-fluid max-width">
            <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

            <?php if ( has_nav_menu( 'top' ) ) : ?>
                <div class="navigation-top">
                    <div class="wrap">
                        <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                    </div><!-- .wrap -->
                </div><!-- .navigation-top -->
            <?php endif; ?>
        </div>
    </div>
    
    <div class="parallax">
        
        <header id="masthead" class="site-header sp-x parallax__back" role="banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9 offset-lg-1 col-lg-6">
                        <div class="claim">
                            <?php if( is_front_page() ) : ?>
                            <h1><?php the_field('claim'); ?></h1>
                            <?php else : ?>
                                <h1><?php echo $the_title; ?></h1>
                                <p><?php the_field('introduction_text'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="all-content" class="parallax__front">

<?php

?>