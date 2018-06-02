<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @since vilicon 1.0
 */


get_header();

while ( have_posts() ) : the_post(); ?>

<section id="maincontent" class="contact-form">
    
    <div class="section-wrap section-padding col-xs-12 col-sm-7 col-md-6">
        <div class="col-xs-offset-0 col-sm-offset-1 col-sm-10">
            <?php the_content(); ?>
        </div>
    </div>
    
        <div id="blue-box" class="text-white">
            <strong>WHERE TO FIND US?</strong><br/>
            <?php echo str_replace("\r\n", "<br />", ot_get_option( 'address' )); ?>
        </div>
    <div class="map-wrap"><div id="map"></div></div>
</section>

<div class="other-contacts container-fluid section-padding">
    <div class="col-xs-12 col-lg-offset-1 col-lg-2">
        <h2>Other Contacts</h2>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-offset-1 col-lg-2 contact-links">
        <strong>Sales:</strong>
        <div>
            <a href="tel:<?php echo ot_get_option( 'sales_phone' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-phone')); ?>
                <?php echo ot_get_option( 'sales_phone' ); ?>
            </a>
        </div>
        <div>
            <a href="mailto:<?php echo ot_get_option( 'sales_email' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-email')); ?>
                <?php echo ot_get_option( 'sales_email' ); ?>
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-2 contact-links">
        <strong>Support:</strong>
        <div>
            <a href="<?php echo ot_get_option( 'support_phone' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-phone')); ?>
                <?php echo ot_get_option( 'support_phone' ); ?>
            </a>
        </div>
        <div>
            <a href="<?php echo ot_get_option( 'support_email' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-email')); ?>
                <?php echo ot_get_option( 'support_email' ); ?>
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-2 contact-links">
        <strong>Office:</strong>
        <div>
            <a href="<?php echo ot_get_option( 'support_phone' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-phone')); ?>
                <?php echo ot_get_option( 'office_phone' ); ?>
            </a>
        </div>
        <div>
            <a href="<?php echo ot_get_option( 'office_email' ); ?>">
                <?php echo twentyseventeen_get_svg(array('icon'=>'contact-email')); ?>
                <?php echo ot_get_option( 'support_email' ); ?>
            </a>
        </div>
    </div>
</div>

<? endwhile; // End of the loop. ?>

<script src="http://maps.google.com/maps/api/js?callback=initMap&key=AIzaSyCXp5fjmZoq-92myOehWAd_MQ_fcIyAvRQ" async=""></script>
<script>

var map, marker;
function initMap() {
    
    // map options
    var mapOptions = {
        zoom: 16,
        // 15 - 53.311436, lng: -6.358802
        // 16 - 53.312409, -6.348975
        scrollwheel: false,
        center: {lat: 53.312409, lng: -6.348975},
        disableDefaultUI: true,
        
    };

   	map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var image = 'http://' + window.location.hostname + '/wp-content/themes/typetec/assets/images/marker.png';

    marker = new google.maps.Marker({
        position: {lat: 53.312601, lng: -6.343560},
        map: map,
        icon: image,
    });

    var stylez = [
        {
            featureType: "all",
            elementType: "all",
            stylers: [
                { saturation: -100 } // <-- THIS
            ],
        },
    ];

    var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });    
    map.mapTypes.set('tehgrayz', mapType);
    map.setMapTypeId('tehgrayz');

    google.maps.event.addDomListener(window, 'resize', function() {
        if( screen.width > 767 )
            map.setCenter({lat: 53.312409, lng: -6.348975});
        else
            map.setCenter({lat: 53.312601, lng: -6.343560});
    });
}
</script>
<?php get_footer(); ?>