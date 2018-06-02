<div class="container-fluid sp-x d-none d-md-block">
	<div class="bg-gray-900">
		<div class="offset-lg-1 col-lg-10 sp-y">
			<h5 id="footer__top-header" class="text-center back-line m-0">
				<span class="bg-gray-900">We Work in two timezones</span>
				<div class="lets-talk bg-gray-900">
					<a href="#" class="btn btn__effect">Lets talk</a>
				</div>
			</h5>
		</div>
	</div>
</div>
<div id="home_footer-slider" class="swiper-container">
	<div class="slider-wrapper sp-x">
		<div class="slide sp-y animation-1 slide-active col-md-7 offset-lg-1 col-lg-6">
			<div class="row flex-md-nowrap justify-content-center justify-content-md-left align-content-start">
				<div class="text-center">
					<h2>Ireland</h2>
					<div class="clock">
						<div id="clock-irl">
							<?php get_template_part( 'template-parts/home/content', 'clock' ); ?>
						</div>
					</div>
					<?php get_template_part( 'template-parts/home/content', 'footer-swiper-navigation' ); ?>
				</div>
				<div class="col-6 col-md-9 address-container d-flex flex-wrap">
					<div class="address-box">
						<h3>Dublin</h3>
						<p>+353 (1) 271 1892</p>
						<p>
							6-9 Trinity Street<br />
							Dublin 2<br />
							Ireland
						</p>
					</div>
					<div class="address-box">
						<h3>Carlow</h3>
						<p>+353 (59) 918 2329</p>
						<p>
						The Waterfront<br />
						Mill Lane<br />
						Ireland
						</p>
					</div>
				</div>
			</div>
			<div class="cover cover-1"></div>
		</div>
		<div class="slide sp-y animation-1 col-md-4 col-lg-4">
			<div class="row flex-md-nowrap justify-content-center justify-content-md-left align-content-start">
				<div class="text-center">
					<h2>USA</h2>
					<div class="clock">
						<div id="clock-usa">
							<?php get_template_part( 'template-parts/home/content', 'clock' ); ?>
						</div>
					</div>
					<?php get_template_part( 'template-parts/home/content', 'footer-swiper-navigation' ); ?>
				</div>
				<div class="col-6 address-container d-flex flex-wrap">
					<div class="address-box">
						<h3>Connecticut</h3>
						<p>+1 860 717 2771</p>
						<p>
							20 Bank Street<br/>
							New Milford<br/>
							CT 06776
						</p>
					</div>
				</div>
			</div>
			<div class="cover cover-1"></div>
		</div>
	</div>
</div>


<script>
(function( $ ) {
	$(function() {

	// var swiper = new Swiper('#home_footer-swiper', {
 //    	speed: 0,
 //    	slidesPerView: 2,
 //    	effect: 'fade',
 //    	breakpoints: {
 //        767: {
	// 		slidesPerView: 1,
	// 		loop: true,
 //        	},
 //        },
    	
 //    	on: {
 //    		slideChange: function() {
 //    			var slider = this;
 //    			slider.slides.eq(this.previousIndex).addClass('intermediate');
 //    			setTimeout(function(){ 
 //    				slider.slides.eq(this.previousIndex).removeClass('intermediate');
 //    			}, 500);
 //    		},
 //    	},
 //    });


	var switchSlide = function(current, next) {

		current.removeClass('slide-active');
		current.addClass('slide-last');
		next.addClass('slide-active');
		
		setTimeout(function() { 
			current.removeClass('slide-last');
		}, 500);
	}
	
	var slideNext = function(current) {
		
		var $current = $(current);
		var $next = $current.next();

		if ($next.length === 0) {
			$next = $current.siblings().first();
		}

		switchSlide($current, $next);
	}

	var slidePrev = function(current) {
		var $current = $(current);
		var $prev = $current.prev();

		if ($prev.length === 0)
			$prev = $current.siblings().last();

		switchSlide($current, $prev);
	}

	var setSliderHeight = function(slider) {
		
		var h = 0;
		slider.slides.each(function() {
			
			$(this).height('auto');
			if( h < $(this).outerHeight() )
				h = $(this).outerHeight();
		});
		
		if ( $(window).width() < 768 ) {
			slider.height(h);
			slider.slides.height(h);
		} else {
			slider.height('auto');
		}
	}

	var slider = $('#home_footer-slider');
	slider.slides = slider.children('.slider-wrapper').children();
	
	setSliderHeight(slider);
	$(window).resize(function() {
		setSliderHeight(slider);
	});

	slider.slides.each(function() {
    	$(this).find('.slider-button-next').click(function() {
	    	slideNext($(this).closest('.slide'));
	    });

	    $(this).find('.slider-button-prev').click(function() {
	    	slidePrev($(this).closest('.slide'));
	    });
    });

	/*
	var mySwiper = undefined;
	function initSwiper() {
	    var screenWidth = $(window).width();
	    if(screenWidth < 992 && mySwiper == undefined) {            
	        mySwiper = new Swiper('.swiper-container', {            
	            spaceBetween: 0,
	            freeMode: true
	        });
	    } else if (screenWidth > 991 && mySwiper != undefined) {
	        mySwiper.destroy();
	        mySwiper = undefined;
	        jQuery('.swiper-wrapper').removeAttr('style');
	        jQuery('.swiper-slide').removeAttr('style');            
	    }        
	}

	//Swiper plugin initialization
	initSwiper();

	//Swiper plugin initialization on window resize
	$(window).on('resize', function(){
	    initSwiper();        
	});
	*/

	var initClock = function (clockEl, timeOffset = 0) {

		var hands = [];
		hands.push(clockEl.querySelector('#secondhand > *'));
		hands.push(clockEl.querySelector('#minutehand > *'));
		hands.push(clockEl.querySelector('#hourhand > *'));

		var cx = 100;
		var cy = 100;

		var shifter = function(val) {
		 	return [val, cx, cy].join(' ');
		}

		var date = new Date();
		
		// add hour offset
		date.setHours(date.getHours() + timeOffset);
		
		var hoursAngle = 360 * date.getHours() / 12 + date.getMinutes() / 2;
		var minuteAngle = 360 * date.getMinutes() / 60;
		var secAngle = 360 * date.getSeconds() / 60;

		hands[0].setAttribute('from', shifter(secAngle));
		hands[0].setAttribute('to', shifter(secAngle + 360));
		hands[1].setAttribute('from', shifter(minuteAngle));
		hands[1].setAttribute('to', shifter(minuteAngle + 360));
		hands[2].setAttribute('from', shifter(hoursAngle));
		hands[2].setAttribute('to', shifter(hoursAngle + 360));

		for(var i = 1; i <= 12; i++) {
			var el = document.createElementNS('http://www.w3.org/2000/svg', 'line');
			el.setAttribute('x1', '100');
			el.setAttribute('y1', '30');
			el.setAttribute('x2', '100');
			el.setAttribute('y2', '20');
			el.setAttribute('transform', 'rotate(' + (i*360/12) + ' 100 100)');
			el.setAttribute('style', 'stroke: #222222; stroke-width: 4px');
			clockEl.appendChild(el);
		}
	}

	var ic = document.querySelector('#clock-irl > svg');
	var usac = document.querySelector('#clock-usa > svg');
	initClock(ic);
	initClock(usac, -6);

	});
})( jQuery );
</script>
