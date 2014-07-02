<?php

$qsn = array(
  'menu'            => 'qui-sommes-nous',
  'container'       => false,
  'menu_class'      => 'level-2 nav',
  'depth'           => 0,
  'walker'          => ''
);

$services = array(
  'menu'            => 'services',
  'container'       => false,
  'menu_class'      => 'level-3 nav',
  'items_wrap'      => '<ol id="%1$s" class="%2$s">%3$s</ol>',
  'depth'           => 0,
  'walker'          => ''
);

$produits = array(
  'menu'            => 'produits',
  'container'       => false,
  'menu_class'      => 'level-3 nav',
  'items_wrap'      => '<ol id="%1$s" class="%2$s">%3$s</ol>',
  'depth'           => 0,
  'walker'          => ''
);

$especes = array(
  'menu'            => 'especes',
  'container'       => false,
  'menu_class'      => 'level-2 nav',
  'depth'           => 0,
  'walker'          => ''
);

?>

<nav class="nav-main" role="navigation">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
   	<ul class="level-1 nav sf-menu sf-vertical">
   		<li><a href="<?php echo site_url('/'); ?>">Accueil</a></li>
   		<li>
        <a href="<?php echo get_permalink( 7 ); ?>"><?php echo get_the_title( 7 ); ?></a>
         <?php if ( has_nav_menu( 'qui-sommes-nous' ) ) {wp_nav_menu($qsn); }; ?>
      </li>
   		<li>
        <a href="<?php echo site_url('/'); ?>">Services &amp; produits</a>
        <ul class="level-2 column">
          <li class="row-fluid">
            <div class="col-xs-6 services">
              <h2>Services</h2>
              <?php if ( has_nav_menu( 'services' ) ) {wp_nav_menu($services); }; ?>
            </div>
            <div class="col-xs-6 produits">
              <h2>Produits</h2>
              <?php if ( has_nav_menu( 'produits' ) ) {wp_nav_menu($produits); }; ?>
            </div>        
          </li>
        </ul>
      </li>
   		<li>
        <a href="<?php echo get_permalink( 36 ); ?>"><?php echo get_the_title( 36 ); ?></a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=36&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
   		<li>
        <a href="<?php echo get_permalink( 34 ); ?>"><?php echo get_the_title( 34 ); ?></a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=34&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
   		<li>
        <a href="#">Espèces</a>
        <?php if ( has_nav_menu( 'especes' ) ) {wp_nav_menu($especes); }; ?>
      </li>
   		<li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
   		<li><a href="<?php echo site_url('/espace-client'); ?>">Espace client</a></li>
   	</ul>
</nav