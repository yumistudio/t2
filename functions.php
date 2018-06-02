<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yumi_setup() {
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

  add_image_size( 'yumi-profile-size', 100, 100, true );

  add_image_size( 'yumi-timepoint', 60, 60, true );

  add_image_size( 'yumi-post-thumbnail', 200, 120, true );

  add_image_size( 'yumi-partner-logo', 260, 260, true );

	add_image_size( 'yumi-featured-image', 2600, 900, true );

  add_image_size( 'yumi-object-list-pdf', 400, 300, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'yumi' ),
		'social' => __( 'Social Links Menu', 'yumi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

}
add_action( 'after_setup_theme', 'yumi_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return ' &hellip; '	;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function yumi_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'yumi_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function yumi_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'yumi_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function yumi_scripts() {
	
	// Theme stylesheet.
	//wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	//wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
	//wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/js/slick/slick.css' ) );
	//wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '3.6.6', true);
	wp_enqueue_script( 'yumi-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'yumi-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'yumi-global-top', get_theme_file_uri( '/assets/js/global-top.js' ), array( 'jquery' ), '1.0', false );

  if(is_front_page()) {
    wp_enqueue_script( 'countUp', get_theme_file_uri( '/assets/js/countUp.js' ), array(), '1.9.3', true );
    wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.min.js' ), array(), '', true );
  }
  

  wp_enqueue_script( 'visible', get_theme_file_uri( '/assets/js/jquery.visible.js' ), array(), '', true );
  wp_enqueue_style( 'swiper', get_theme_file_uri( '/assets/js/swiper/dist/css/swiper.min.css' ) );
  wp_enqueue_script( 'swiper', get_theme_file_uri( '/assets/js/swiper/dist/js/swiper.js' ), array(), '', false );
//exit(get_theme_file_uri( '/assets/js/swiper/dist/js/swiper.min.js' ));
  wp_enqueue_script( 'nicescroll', get_theme_file_uri( '/assets/js/nicescroll/dist/jquery.nicescroll.js' ), array(), '', true );

  wp_enqueue_script( 'yumi-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
  wp_enqueue_style( 'yumi-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yumi_scripts' );


/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function custom_excerpt_length( $length ) {
  return 800;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_post_casestudy() {
  $labels = array(
    'name'               => _x( 'Case Studies', 'post type general name' ),
    'singular_name'      => _x( 'Case Study', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'casestudy' ),
    'add_new_item'       => __( 'Add New Case Study' ),
    'edit_item'          => __( 'Edit Case Study' ),
    'new_item'           => __( 'New Case Study' ),
    'all_items'          => __( 'All Case Studies' ),
    'view_item'          => __( 'View Case Study' ),
    'search_items'       => __( 'Search Case Studies' ),
    'not_found'          => __( 'No case study found' ),
    'not_found_in_trash' => __( 'No case study found in the Trash' ), 
    'parent_item_colon'  => '',
    'parent'       => __( 'Parent Super Duper' ),
    'menu_name'          => 'Case Studies'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our case studies',
    'public'        => true,
    'menu_position' => 31,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'  => false,
    'has_archive'   => false,
    //'rewrite' => array( 'slug' => 'about/clients/testimonials' ),
  );
  register_post_type( 'casestudy', $args );
}
add_action( 'init', 'custom_post_casestudy' );


function custom_post_certification() {
  $labels = array(
    'name'               => _x( 'Cerftifications', 'post type general name' ),
    'singular_name'      => _x( 'Cerftification', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'certification' ),
    'add_new_item'       => __( 'Add New Certification' ),
    'edit_item'          => __( 'Edit certification' ),
    'new_item'           => __( 'New  certification' ),
    'all_items'          => __( 'All' ),
    'view_item'          => __( 'View certification' ),
    'search_items'       => __( 'Search certification' ),
    'not_found'          => __( 'No certifications found' ),
    'not_found_in_trash' => __( 'No certifications found in the Trash' ), 
    'parent_item_colon'  => '',
    'parent' 			 => __( 'Parent Super Duper' ),
    'menu_name'          => 'Certifications'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our certification`',
    'public'        => true,
    'menu_position' => 32,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'	=> false,
    'has_archive'   => true,
    'rewrite' => array( 'slug' => 'certifications' ),
  );
  register_post_type( 'certification', $args );
}
add_action( 'init', 'custom_post_certification' );

function custom_post_award() {
  $labels = array(
    'name'               => _x( 'Awards', 'post type general name' ),
    'singular_name'      => _x( 'Award', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'award' ),
    'add_new_item'       => __( 'Add New award' ),
    'edit_item'          => __( 'Edit award' ),
    'new_item'           => __( 'New  award' ),
    'all_items'          => __( 'All' ),
    'view_item'          => __( 'View award' ),
    'search_items'       => __( 'Search award' ),
    'not_found'          => __( 'No awards found' ),
    'not_found_in_trash' => __( 'No awards found in the Trash' ), 
    'parent_item_colon'  => '',
    'parent'       => __( 'Parent Super Duper' ),
    'menu_name'          => 'Awards'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our award`',
    'public'        => true,
    'menu_position' => 33,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'  => false,
    'has_archive'   => true,
    'rewrite' => array( 'slug' => 'awards' ),
  );
  register_post_type( 'award', $args );
}
add_action( 'init', 'custom_post_award' );


function custom_post_job() {
  $labels = array(
    'name'               => _x( 'Jobs', 'post type general name' ),
    'singular_name'      => _x( 'Job', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'job' ),
    'add_new_item'       => __( 'Add New job' ),
    'edit_item'          => __( 'Edit job' ),
    'new_item'           => __( 'New  job' ),
    'all_items'          => __( 'All' ),
    'view_item'          => __( 'View job' ),
    'search_items'       => __( 'Search jobs' ),
    'not_found'          => __( 'No accreditations found' ),
    'not_found_in_trash' => __( 'No accreditations found in the Trash' ), 
    'parent_item_colon'  => '',
    'parent'       => __( 'Parent Super Duper' ),
    'menu_name'          => 'Jobs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our jobs`',
    'public'        => true,
    'menu_position' => 34,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'  => false,
    'has_archive'   => true,
  );
  register_post_type( 'job', $args );
}
add_action( 'init', 'custom_post_job' );

function custom_post_partners() {
  $labels = array(
    'name'               => _x( 'Partners', 'post type general name' ),
    'singular_name'      => _x( 'Partner', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Partner' ),
    'add_new_item'       => __( 'Add New Partner' ),
    'edit_item'          => __( 'Edit Partner' ),
    'new_item'           => __( 'New Partner' ),
    'all_items'          => __( 'All Partners' ),
    'view_item'          => __( 'View Partner' ),
    'search_items'       => __( 'Search Partners' ),
    'not_found'          => __( 'No partner found' ),
    'not_found_in_trash' => __( 'No partner found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Our Partners'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Partners',
    'public'        => true,
    'menu_position' => 35,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'	=> false,
    'has_archive'   => false,
  );
  register_post_type( 'partner', $args );
}
add_action( 'init', 'custom_post_partners' );

function custom_post_person() {
  $labels = array(
    'name'               => _x( 'Our People', 'post type general name' ),
    'singular_name'      => _x( 'Person', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Person' ),
    'add_new_item'       => __( 'Add New Person' ),
    'edit_item'          => __( 'Edit Person item' ),
    'new_item'           => __( 'New Person' ),
    'all_items'          => __( 'All Persons' ),
    'view_item'          => __( 'View Person' ),
    'search_items'       => __( 'Search Persons' ),
    'not_found'          => __( 'No client found' ),
    'not_found_in_trash' => __( 'No client found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Our People'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our people',
    'public'        => true,
    'menu_position' => 36,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'  => false,
    'has_archive'   => false,
  );
  register_post_type( 'person', $args );
}
add_action( 'init', 'custom_post_person' );
 
function custom_taxonomy_roles() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Roles', 'taxonomy general name' ),
    'singular_name' => _x( 'Role', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Roles' ),
    'popular_items' => __( 'Popular Roles' ),
    'all_items' => __( 'All Roles' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Role' ), 
    'update_item' => __( 'Update Role' ),
    'add_new_item' => __( 'Add New Role' ),
    'new_item_name' => __( 'New Role Name' ),
    'separate_items_with_commas' => __( 'Separate roles with commas' ),
    'add_or_remove_items' => __( 'Add or remove roles' ),
    'choose_from_most_used' => __( 'Choose from the most used roles' ),
    'menu_name' => __( 'Roles' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('roles','person',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    //'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    //'rewrite' => array( 'slug' => 'per' ),
  ));
}
add_action( 'init', 'custom_taxonomy_roles', 0 );

function custom_post_timepoint() {
  $labels = array(
    'name'               => _x( 'Our Timeline', 'post type general name' ),
    'singular_name'      => _x( 'Time Point', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Person' ),
    'add_new_item'       => __( 'Add New Time Point' ),
    'edit_item'          => __( 'Edit Time Point' ),
    'new_item'           => __( 'New Time Point' ),
    'all_items'          => __( 'All Time Points' ),
    'view_item'          => __( 'View Time Point' ),
    'search_items'       => __( 'Search Time Points' ),
    'not_found'          => __( 'No time points found' ),
    'not_found_in_trash' => __( 'No no time points found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Timeline'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our timeline',
    'public'        => true,
    'menu_position' => 37,
    'supports'      => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'  => false,
    'has_archive'   => false,
  );
  register_post_type( 'timepoint', $args );
}
add_action( 'init', 'custom_post_timepoint' );

function custom_post_problem() {
  $labels = array(
    'name'               => _x( 'Problems And Solutions', 'post type general name' ),
    'singular_name'      => _x( 'Problem', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Problem' ),
    'add_new_item'       => __( 'Add New Problem' ),
    'edit_item'          => __( 'Edit Problem' ),
    'new_item'           => __( 'New Problem' ),
    'all_items'          => __( 'All Problems' ),
    'view_item'          => __( 'View Problem' ),
    'search_items'       => __( 'Search Problems' ),
    'not_found'          => __( 'No client found' ),
    'not_found_in_trash' => __( 'No client found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Q & A'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our problems and answers',
    'public'        => true,
    'menu_position' => 37,
    'supports'      => array( 'title', 'editor' ),
    'hierarchical'  => false,
    'has_archive'   => false,
    'rewrite' => array( 'slug' => 'problems' ),
  );
  register_post_type( 'problem', $args );
}
add_action( 'init', 'custom_post_problem' );



function wpb_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*
 * Add columns to exhibition post list
 */
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'branch' => __ ( 'Branch Or Global' ),
   ) );
 }
add_filter ( 'manage_certification_posts_columns', 'add_acf_columns' );

/*
 * Add columns to exhibition post list
 */
 function certification_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'branch': 
      echo get_post_meta ( $post_id, 'branch', true );
      break;
   }
 }
 add_action ( 'manage_certification_posts_custom_column', 'certification_custom_column', 10, 2 );

/**
 * @param array      $array
 * @param int|string $position
 * @param mixed      $insert
 */
function array_insert(&$array, $position, $insert)
{
    if (is_int($position)) {
        array_splice($array, $position, 0, $insert);
    } else {
        $pos   = array_search($position, array_keys($array));
        $array = array_merge(
            array_slice($array, 0, $pos),
            $insert,
            array_slice($array, $pos)
        );
    }
}

function build_twocol_elem( $atts, $content ) {

	// split content into columns
	$columns = explode('[colsplit]', $content);

	$classStr = '';
	if (isset($atts['class'])) $classStr .= ' '.$atts['class'];
	if (is_array($atts) && in_array('carousel', $atts)) $classStr .= ' carousel';
	
	$output = 	'<div class="twoColumnGroup'.$classStr.'""><div class="column column-1">';

	$output .= do_shortcode($columns[0]);

	$output .= '</div><div class="column column-2 last">';

	$output .= do_shortcode($columns[1]);
	
	$output .= '</div></div>';

	return $output;
}
add_shortcode( 'twocol', 'build_twocol_elem' );

function build_button( $atts ) {
  
  if ($atts['filelink'])
    $output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
          ' class="more-lnk '.$atts['class'].'" href="/download.php?file='.urldecode($atts['filelink']).'">'.$atts['text'].'</a>';
  //elseif ($atts['href']) 
  else
    $output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
          ( $atts['newtab'] == 'true' ? ' target="_blank"' : '' ).
          ' class="more-btn '.$atts['class'].'" href="'.$atts['href'].'"><span>'.$atts['text'].'</span></a>';
  
  //else $output = '<a'.( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).' class="more-btn '.$atts['class'].'" href="'.$atts['href'].'">'.$atts['text'].'</a>';
  return $output;
}
add_shortcode( 'button', 'build_button' );

function get_featured_image( $atts ) {
  return '<img class="featured-image" src="'.get_the_post_thumbnail_url().'" />';
}
add_shortcode( 'featured_image', 'get_featured_image' );


function build_cta_button( $atts, $content ) {
  
  
  $output = '<a'.
      ( $atts['id'] ? ' id="'.$atts['id'].'"' : '' ).
      ( $atts['newtab'] == 'true' ? ' target="_blank"' : '' ).
      ' class="cta'.( $atts['class'] ? ' '.$atts['class']: ' blue' ).'" href="'.$atts['href'].'">'.
      '<div></div><span>'.$content.'</span>'.
      twentyseventeen_get_svg(array('icon'=>'arrow-right')).
      '</a>';
  return $output;
}
add_shortcode( 'cta', 'build_cta_button' );

function get_sitemap( $atts, $content ) {
  wp_nav_menu( array(
                  'theme_location' => 'top',
                  'menu_id'        => 'sitemap',
                  'menu_class'     => '',
                  //'walker'         => 'My_Menu_Walker'
              ) );
}
add_shortcode( 'sitemap', 'get_sitemap' );

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
    // Define the style_formats array
    $style_formats = array(  
        // Each array child is a format with it's own settings
        array(  
            'title' => 'Animated Link',  
            'selector' => 'a',  
            'classes' => 'btn btn__effect',        
            'styles' => array(
                'color'         => '#d31f47',
            )     
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


function add_query_vars_filter( $vars ){
  $vars[] = "by";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

add_action('pre_get_posts','add_author');
function add_author($query) {
  //gets the global query var object
  global $wp_query;

  
  if (get_query_var('by')) {
    $wp_query->set('meta_key', 'author');
    $wp_query->set('meta_value', get_query_var('by'));
  }

  if ( !$query->is_main_query() )
    return;
}


function add_load_more_scripts() {
 
  global $wp_query; 
  
  if(is_home() || is_archive()) { 
    
    // register our main script but do not enqueue it yet
    wp_register_script( 'yumi_loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery'), '', true );
    
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'yumi_loadmore', 'yumi_loadmore_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
      'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
      'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
      'max_page' => $wp_query->max_num_pages
    ) );
   
    wp_enqueue_script( 'yumi_loadmore' );
  }
}
 
add_action( 'wp_enqueue_scripts', 'add_load_more_scripts' );

function yumi_loadmore_ajax_handler(){
 
  // prepare our arguments for the query
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
 
  // it is always better to use WP_Query but not here
  query_posts( $args );
 
  if( have_posts() ) :
 
    // run the loop
    while( have_posts() ): the_post();
 
      // look into your theme code how the posts are inserted, but you can use your own HTML of course
      // do you remember? - my example is adapted for Twenty Seventeen theme
      // get_template_part( 'template-parts/post/content', get_post_format() );
      // for the test purposes comment the line above and uncomment the below one
      // the_title();
    ?>
      <div class="item post table">
        <div class="item-image cell">
            <?php the_post_thumbnail('yumi-post-thumbnail'); ?>
        </div>
        <div class="item-title cell">
            <strong>
              <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            </strong>
        </div>
        <div class="item-title cell">
          <?php echo twentyseventeen_get_svg(array('icon'=>'chevron')); ?>
        </div>
      </div>
    
<?php 
    endwhile;
 
  endif;
  die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'yumi_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'yumi_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

add_action( 'wp_footer', 'yumi_form_thank_you' ); 
function yumi_form_thank_you() {
?>
<script type="text/javascript">
(function( $ ) {
  $(function() {
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      //console.log(event);
      //ga( 'send', 'event', 'Contact Form', 'submit' );
      
      // detect if form has form ID anc CI set
      // if so just serialize it and post to autotask
      //var params = downloadForm.serializeArray();

      var $at_form_id = $('#at_form_id');
      var $at_ci = $('#at_ci');
      var $thank_you_url = $('#thank_you_url');
      
      if ($at_form_id.length && $at_form_id.val() && $at_ci.length && $at_ci.val()) {
        
        var url = 'https://ww4.autotask.net/autotask/AutoFormHandlers/ServiceController.aspx';
        var params = event.detail.inputs;
        
        params.push({ name: 'FormID', value: $at_form_id.val() });
        params.push({ name: 'CI', value: $at_ci.val() });

        for (k in event.detail.inputs) {
            e = event.detail.inputs[k]
            if (e.name == 'full_name') {
              var lName = e.value.substr(e.value.lastIndexOf(" ")+1);
              var fName = e.value.substr(0, e.value.lastIndexOf(" "));
              params.push({ name: 'ATConFName', value: fName });
              params.push({ name: 'ATConLName', value: lName });
            }
        }
        
        //console.log(params);
        // Make tracking request
        //url = 'http://www.typetec.ie/';
        jQuery.post(url, params, function(response) {
          console.log('Posting data to: ' + url);
        });
        
      }

      // redirect to thak you page
      if( $thank_you_url.length && $thank_you_url.val() ) {
            var t = setTimeout(function() {
            window.location = 'http://' + window.location.hostname + $thank_you_url.val();
        }, 1000)
      }
    }, false );
  });
})( jQuery );
</script>
<?php
}


/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Twitter Bootstrap 2.3.2 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 1.4.5
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {
  
	var $currentLvlItem;

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul id=\"{$this->currentLvlItem->post_name}\" class=\"list-unstyled collapse\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers & Headers
	     * ==================
		 * Determine whether the item is a Divider, Header, or regular menu item.
		 * To prevent errors we use the strcasecmp() function to so a comparison
		 * that is not case sensitive. The strcasecmp() function returns a 0 if 
		 * the strings are equal.
		 */
		if (strcasecmp($item->title, 'divider') == 0) {
			// Item is a Divider
			$output .= $indent . '<li class="divider">';
		} else if (strcasecmp($item->title, 'divider-vertical') == 0) {
			// Item is a Vertical Divider
			$output .= $indent . '<li class="divider-vertical">';
		} else if (strcasecmp($item->title, 'nav-header') == 0) {
			// Item is a Header
			$output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			//If item has_children add dropdown class to li
			if($args->has_children) {
				//$class_names .= ' dropdown';
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title ) 	   ? $item->title 	   : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

			//If item has_children add atts to a
			if($args->has_children) {
				$atts['href']   	 = '#';
				//$atts['class']	 = 'dropdown-toggle';
				$atts['data-toggle'] = 'collapse';
				$atts['data-target'] = '#'.$item->post_name;
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$this->currentLvlItem = $item;

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;
		
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */

			if(! empty( $item->attr_title )){
				$item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';
			} else {
				$item_output .= '<a'. $attributes .'>';
			}
			
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ($args->has_children) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. 
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function ajax_download_attachment() {
    
  if ($file_id = filter_input( INPUT_GET, 'id' )) {
    $file_path = get_attached_file( $file_id );
    $file_url = wp_get_attachment_url($file_id);    
  }
  elseif ($file_url = filter_input( INPUT_GET, 'url' )) {
    $file_path = get_home_path().parse_url($file_url, PHP_URL_PATH);
  } else {
    die("No file to download.");
  }
  
  // just redirect to file if Safari older than 8.4
  if (preg_match('/\((iPad|iPhone); CPU OS (\d+(_\d+)?) like Mac OS X\)/i', $_SERVER['HTTP_USER_AGENT'], $matches) ) {
      $v = str_replace('_', '.', $matches[2]);
      if ($v < 8.4) {
        header('Location: ' . $file_url);
        die();
      }
    }

    try{
        header('Pragma: public');   // required
        header('Expires: 0');       // no cache
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_path)).' GMT');
        header('Cache-Control: private',false);
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($file_path));    // provide file size
        header('Connection: close');
        set_time_limit(0);
        @readfile("$file_path") or die("File not found.");
    } catch(Exception $e) {
        $data['error'] = $e->getMessage() ." @ ". $e->getFile() .' - '. $e->getLine();
    }
    //echo json_encode($data);
    echo wp_get_attachment_url($_GET['id']);
    die();
}


if ( is_admin() ) {
    add_action( 'wp_ajax_download_attachment', 'ajax_download_attachment' );
    add_action( 'wp_ajax_nopriv_download_attachment', 'ajax_download_attachment' );
}

add_action( 'wp_footer', 'add_ajax_download_javascript' ); // Write our JS below here

function add_ajax_download_javascript() {
?><script type="text/javascript" >
jQuery(document).ready(function() {

	jQuery('#downloadForm .wpcf7').on('wpcf7:mailsent', function() {
		
		var formContainer = jQuery(this);
		var downloadForm = jQuery(this).children('form');
		var params = downloadForm.serializeArray();
		//jQuery.extend(params, {'action':'call_csf'});


		
		var url = '/wp-admin/admin-ajax.php?action=call_csf';

		// call salesforce here and on success let save the file
		if (jQuery(formContainer).data('file-id')) {
			jQuery.post(url, params, function(response) {
				window.location='/wp-admin/admin-ajax.php?action=download_attachment&id=' + jQuery(formContainer).data('file-id');
			});
		} else {
			jQuery.post(url, params, function(response) {
				window.location=jQuery(formContainer).data('url');
			});
		}
	});
});
</script><?php
}

/*
add_action( 'wp_footer', 'add_ajax_call_salesforce_javascript' ); // Write our JS below here

function add_ajax_call_salesforce_javascript() {
?><script type="text/javascript" >
jQuery(document).ready(function() {

	jQuery('#downloadForm .wpcf7').on('wpcf7:mailsent', function() {
		//console.log(jQuery(this));
		window.location='/wp-admin/admin-ajax.php?action=download_attachment&id=' + jQuery(this).data('file-id');
	});
});
</script><?php
}
*/

class Yumi_Walker_Nav_Menu extends Walker {
  /**
   * What the class handles.
   *
   * @since 3.0.0
   * @access public
   * @var string
   *
   * @see Walker::$tree_type
   */
  public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

  /**
   * Database fields to use.
   *
   * @since 3.0.0
   * @access public
   * @todo Decouple this.
   * @var array
   *
   * @see Walker::$db_fields
   */
  public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  /**
   * Starts the list before the elements are added.
   *
   * @since 3.0.0
   *
   * @see Walker::start_lvl()
   *
   * @param string   $output Passed by reference. Used to append additional content.
   * @param int      $depth  Depth of menu item. Used for padding.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   */
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = str_repeat( $t, $depth );

    // Default class.
    $classes = array( 'sub-menu' );

    /**
     * Filters the CSS class(es) applied to a menu list element.
     *
     * @since 4.8.0
     *
     * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
     * @param stdClass $args    An object of `wp_nav_menu()` arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
    $output .= "{$n}{$indent}<ul $class_names>{$n}";
  }

  /**
   * Ends the list of after the elements are added.
   *
   * @since 3.0.0
   *
   * @see Walker::end_lvl()
   *
   * @param string   $output Passed by reference. Used to append additional content.
   * @param int      $depth  Depth of menu item. Used for padding.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   */
  public function end_lvl( &$output, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = str_repeat( $t, $depth );
    $output .= "$indent</ul>{$n}";
  }

  /**
   * Starts the element output.
   *
   * @since 3.0.0
   * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
   *
   * @see Walker::start_el()
   *
   * @param string   $output Passed by reference. Used to append additional content.
   * @param WP_Post  $item   Menu item data object.
   * @param int      $depth  Depth of menu item. Used for padding.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   * @param int      $id     Current item ID.
   */
  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param WP_Post  $item  Menu item data object.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    /**
     * Filters the CSS class(es) applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title  Title attribute.
     *     @type string $target Target attribute.
     *     @type string $rel    The rel attribute.
     *     @type string $href   The href attribute.
     * }
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $item->title, $item->ID );

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title The menu item's title.
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $item        Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  /**
   * Ends the element output, if needed.
   *
   * @since 3.0.0
   *
   * @see Walker::end_el()
   *
   * @param string   $output Passed by reference. Used to append additional content.
   * @param WP_Post  $item   Page data object. Not used.
   * @param int      $depth  Depth of page. Not Used.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   */
  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $output .= "</li>{$n}";
  }

} // Walker_Nav_Menu

?>