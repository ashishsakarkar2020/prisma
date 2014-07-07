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
   	<ul class="level-1 nav sf-menu sf-vertical">
   		<li><a href="<?php echo site_url('/'); ?>">Accueil <span class="icon icon-accueil"></span></a></li>
   		<li>
        <a href="<?php echo get_permalink( 7 ); ?>"><?php echo get_the_title( 7 ); ?> <span class="icon icon-prisma"></span></a>
         <?php if ( has_nav_menu( 'qui-sommes-nous' ) ) {wp_nav_menu($qsn); }; ?>
      </li>
   		<li>
        <a href="<?php echo site_url('/'); ?>">Services &amp; produits <span class="icon icon-produits"></span></a>
        <ul class="level-2 column">
          <li class="row-fluid">
            <div class="col-xs-6 services">
              <h2><span class="icon icon-gear"></span> Services</h2>
              <?php if ( has_nav_menu( 'services' ) ) {wp_nav_menu($services); }; ?>
            </div>
            <div class="col-xs-6 produits">
              <h2><span class="icon icon-produits"></span> Produits</h2>
              <?php if ( has_nav_menu( 'produits' ) ) {wp_nav_menu($produits); }; ?>
            </div>        
          </li>
        </ul>
      </li>
   		<li>
        <a href="<?php echo get_permalink( 34 ); ?>"><?php echo get_the_title( 34 ); ?> <span class="icon icon-retd"></span></a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=34&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
      <li>
        <a href="<?php echo get_permalink( 36 ); ?>"><?php echo get_the_title( 36 ); ?> <span class="icon icon-sites"></span></a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=36&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
   		<li>
        <a href="#">Espèces <span class="icon icon-especes"></span></a>
        <?php if ( has_nav_menu( 'especes' ) ) {wp_nav_menu($especes); }; ?>
      </li>
   		<li><a href="<?php echo site_url('/contact'); ?>">Contact <span class="icon icon-contact"></span></a></li>
   		<li><a href="<?php echo site_url('/espace-client'); ?>">Espace client <span class="icon icon-espace-client"></span></a></li>
   	</ul>
</nav