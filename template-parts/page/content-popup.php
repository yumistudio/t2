<?php 
$showPopup = get_field('show_gdpr_popup') ;
//var_dump($showPopup);

if($showPopup[0]) : ?>

<div id="main-popup" class="main-overlay popup text-white center">
	<div class="popup-inner">
		<div class="close-btn">
	        <span></span><span></span>
	    </div>
		<div class="popup-content">
			<h1>Are you GDPR ready?</h1>
			<p>
				<?php the_field('gdpr_popup_text', 2); ?>
			</p>
			
				Contact us today to see how we can help.
			
			<div class="cta-container">
				<a href="/home/gdpr/" class="cta whitedarkblue">
					<div></div><span>Find Out More</span>
					<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
				</a>

				<a href="/about/contact-us/" class="cta whitedarkblue">
					<div></div><span>Contact Us</span>
					<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
				</a>
			</div>
		</div>
	</div>
</div>

<script>
(function( $ ) {
	$(function() {
		console.log('aaa');
		console.log(getCookie('GdprPopupShown'));
		console.log('bbb');
		if (getCookie('GdprPopupShown') == null) {
			var t = setTimeout(function() {
				$('#main-popup').addClass('on');
				setCookie('GdprPopupShown', 1, 1);
			}, 3000);
		}
	});
})( jQuery );
</script>
<?php endif; ?>