<?php if ( ($form_id = get_field('at_form_id')) && ($ci = get_field('at_ci')) ) : ?>
<div style="display: none">
	<input type="hidden" id="at_form_id" name="at_form_id" value="<?php echo $form_id; ?>">
	<input type="hidden" id="at_ci" name="at_ci" value="<?php echo $ci; ?>">
	<?php if ( $thank_you_url = get_field('thank_you_url') ) : ?>
	<input type="hidden" id="thank_you_url" name="thank_you_url" value="<?php echo $thank_you_url; ?>">
	<?php endif; ?>
</div>

<script>
(function( $ ) {
	$(function() {

		
	});
})( jQuery );



</script>

<?php endif; ?>