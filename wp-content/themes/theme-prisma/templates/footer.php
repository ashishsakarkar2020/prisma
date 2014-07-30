<?php

$footer = array(
  'menu'            => 'footer',
  'container'       => false,
  'menu_class'      => 'nav-footer',
  'after'           => ' / ',
  'depth'           => 0,
  'walker'          => ''
);

?>

<footer class="content-info" role="contentinfo">
  	<div class="text-center text-muted">
    <?php if ( has_nav_menu( 'footer' ) ) {wp_nav_menu($footer); }; ?>
    </div>
</footer>