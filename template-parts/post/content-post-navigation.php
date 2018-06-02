<div class="nav-links">
  <?php
  $pp = get_previous_post();
  $np = get_next_post(); 
  ?>
  <a class="prev" href="<?php echo get_permalink($pp->ID);?>">
  	<?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ); ?>
  </a>
  <a class="next" href="<?php echo get_permalink($np->ID);?>">
  	<?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
  </a>
</div><!-- .nav-links -->