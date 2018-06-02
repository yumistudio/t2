<div id="download-form" class="main-overlay">

	<div class="close-btn">
        <span></span><span></span>
    </div>

	<div class="contact-form">

		<div class="download-form-wrap do-nicescrol">

			<div class="download-form text-white">

				<h4>Download</h4>
				<?php echo ot_get_option( 'download_from_introduction_text' ); ?>
				<form id="ATForm" method="POST" action="https://ww4.autotask.net/autotask/AutoFormHandlers/ServiceController.aspx" onSubmit="return Validate(this)">

					<div style="display: none;">
						<input type="hidden" name="FormID" id="FormID" value="">
						<input type="hidden" name="CI" id="CI" value="">
					</div>

					<div class="fld required">
						<span class="wpcf7-form-control-wrap company">
							<input placeholder="Your company?" name="ATAccName" type="text" id="ATAccName" />
						</span>
					</div>

					<div class="fld required">
						<span class="wpcf7-form-control-wrap name">
							<input placeholder="Your first name?" name="ATConFName" type="text" id="ATConFName" />
						</span>
					</div>

					<div class="fld required">
						<span class="wpcf7-form-control-wrap name">
							<input placeholder="Your last name?" name="ATConLName" type="text" id="ATConLName" />
						</span>
					</div>

					<div class="fld required">
						<span class="wpcf7-form-control-wrap email">
							<input placeholder="Your email?" name="ATConEmail" type="text" id="ATConEmail" />
						</span>
					</div>

					<div class="fld">
						<span class="wpcf7-form-control-wrap phone">
							<input placeholder="Your phone?" name="ATConPhone" type="text" id="ATConPhone" />
						</span>
					</div>

					<div class="fld checkbox">	
						<label>
							<input type="checkbox" name="ATOppConsultationRequest" value="Yes">
							<span class="wpcf7-list-item-label">
								Yes, I would you like to request a consultation around my I.T.need with your Typetec expert team.
							</span>
						</label>
					</div>
					<div class="fld checkbox">
						<label>
							<input type="checkbox" name="ATOppFurtherInformation" value="Yes">
							<span class="wpcf7-list-item-label">
								Yes, I would you like to receive information on our special offers and expert advice from Typetec around your IT?
							</span>
						</label>
					</div>
					<button class="cta whiteblue" type="submit" value="Enquire now">
						<div></div>
						<span>Send It</span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
							<line x1="4" y1="12" x2="20" y2="12"></line>
							<polyline points="14 6 20 12 14 18"></polyline>
						</svg>
					</button>
					<div class="fld">
						<a href="/privacy-policy/">Privacy notice</a>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>


<script language="javascript">
function Validate(form) {

	if (typeof(document.getElementById("ATAccName")) != 'undefined'){
		if (document.getElementById("ATAccName").value == "") {
		   alert("Please provide company name.");
		   return false;
	   }
	}
	if (typeof(document.getElementById("ATConFName")) != 'undefined'){
		if (document.getElementById("ATConFName").value == "") {
		   alert("Please provide first name.");
		   return false;
	   }
	}
	if (typeof(document.getElementById("ATConLName")) != 'undefined'){
		if (document.getElementById("ATConLName").value == "") {
		   alert("Please provide last name.");
		   return false;
	   }
	}
	if (typeof(document.getElementById("ATConEmail")) != 'undefined'){
		if (document.getElementById("ATConEmail").value == "") {
		   alert("Please provide email.");
		   return false;
	   }
	}
	/*
	if (typeof(document.getElementById("ATConPhone")) != 'undefined'){
		if (document.getElementById("ATConPhone").value == "") {
		   alert("Please provide phone.");
		   return false;
		}
	}
	*/
	if (typeof(form.ATOppCreateDate) != 'undefined'){
		if (form.ATOppCreateDate.value != ""){
			if (vbIsDate(form.ATOppCreateDate.value) == false){
				alert("You must enter a valid Opportunity Create Date.");
				return false;
			}
		}
	}
	if (typeof(form.ATOppProjCloseDate) != 'undefined'){
		if (form.ATOppProjCloseDate.value != ""){
			if (vbIsDate(form.ATOppProjCloseDate.value) == false){
				alert("You must enter a valid Opportunity Projected Close Date.");
				return false;
			}
		}
	}

	function IsValidTime(timeStr) {
		var timePat = /^(\d{1,2}):(\d{2})(:(\d{2}))?(\s?(AM|am|PM|pm))?$/;
		var matchArray = timeStr.match(timePat);
		if (matchArray == null) {
			return false;
		}
		hour = matchArray[1];
		minute = matchArray[2];
		second = matchArray[4];
		ampm = matchArray[6];
		if (second=="") { second = null; }
		if (ampm=="") { ampm = null }
		if (hour < 0  || hour > 12) {
			return false;
		}
		if (hour <= 12 && ampm == null) {
			return false;
		}
		if (minute<0 || minute > 59) {
			return false;
		}
		if (second != null && (second < 0 || second > 59)) {
			return false;
		}
		return true;
	}
	function get_difference(startTime, endTime) {
		// function returns the hours mins of endtime minus start time
		var hours = get_hour(endTime) - get_hour(startTime);
		var minutes = get_minute(endTime) - get_minute(startTime);
		return (hours + (minutes / 60));
	}
	function get_hour(inTime) {
		var tempDate = new Date('12/31/9999' + ' ' + inTime);
		return(tempDate.getHours());
	}
	function get_minute(inTime) {
		var tempDate = new Date('12/31/9999' + ' ' + inTime);
		return(tempDate.getMinutes());
	}

	//return true;

	var downloadForm = jQuery(form);
	var params = downloadForm.serializeArray();
	var url = downloadForm.attr('action');

	//url = '/';
	
	// Make tracking request
	jQuery.post(url, params, function(response) {
		console.log('Posting data to: ' + url);
	});
	
	// Open download dialog
	if (fileId = downloadForm.data('file-id')) {
		console.log('Getting the file by ID =' + fileId);
		window.location='/wp-admin/admin-ajax.php?action=download_attachment&id=' + fileId;
	} else if (fileUrl = downloadForm.data('file-url')) {
		window.location='/wp-admin/admin-ajax.php?action=download_attachment&url=' + fileUrl;
	}

	// redirect to thak you page
	var redirectUrl = 'http://' + window.location.hostname + '/thank-you';
	setTimeout(function() {
		window.location=redirectUrl;
	}, 5000);

	return false;
}

function vbIsDate(dDate){
	var date = new Date(dDate);
	return !isNaN(date);
}

(function( $ ) {
	$(function() {

		$('.swiper-container.case-studies').equalBoxes('.swiper-slide .content');

		var swiper = new Swiper('.swiper-container.case-studies', {
		 	slidesPerView: 'auto',
	      	spaceBetween: 5,
	      	loop: false,
			navigation: {
				nextEl: '.swiper-button-next.cs',
				prevEl: '.swiper-button-prev.cs',
			},
		});
	});
})( jQuery );
</script>
</script>