<?php
$chkbox = get_field('hide_case_study_button');
global $caseStudies;
$caseStudies = get_field('case_studies');
if (is_array($caseStudies) && !empty($caseStudies) && $chkbox[0] != 1): ?>
<div id="blue-box" class="link-down text-white">
    <a data-target="slider-case-studies">
    	<strong><span>View</span> <span>Case</span> <span>Study</span></strong>
    	<?php echo twentyseventeen_get_svg(array('icon'=>'arrow-long')); ?>
    </a>
</div>
<?php endif; ?>