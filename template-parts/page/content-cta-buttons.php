<?php if( have_rows('cta_buttons') ): ?>
	<div class="cta-buttons">
    <?php while ( have_rows('cta_buttons') ) : the_row();
    	
    	if(preg_match('/\.pdf$/', get_sub_field('cta_link')))
    		$isFile = true;

    	$form_id = get_sub_field('form_id');
    	$form_ci = get_sub_field('form_ci');
        $button_id = get_sub_field('cta_id');

    	if($form_id && $form_ci) $with_form = true;
    	?>
        
        <a <?php if($button_id) echo 'id="'.$button_id.'"'; ?> class="cta blue<?php if ($isFile && $with_form) echo ' download with-form';?>"
        		href="<?php the_sub_field('cta_link'); ?>"
        		<?php if ($isFile && $with_form) echo ' data-form-id="'.$form_id.'"'; ?>
        		<?php if ($isFile && $with_form) echo ' data-ci="'.$form_ci .'"'; ?>
        		<?php if ($isFile) echo ' target="_blank"'; ?>>
        	<div></div><span><?php the_sub_field('cta_text'); ?></span>
        	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-right')); ?>
        </a><br />
    <?php endwhile; ?>
	</div>
<?php endif; ?>