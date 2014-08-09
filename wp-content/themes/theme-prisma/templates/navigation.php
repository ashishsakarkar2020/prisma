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
   		<li>
        <a href="<?php echo site_url('/'); ?>">
          <div class="vbloc">Accueil</div>
          <div class="vbloc"><span class="icon icon-accueil"></span></div>
        </a>
      </li>
   		<li>
        <a href="#">
          <div class="vbloc"><?php echo get_the_title( 7 ); ?></div>
          <div class="vbloc"><span class="icon icon-prisma"></span></div>
        </a>
         <?php if ( has_nav_menu( 'qui-sommes-nous' ) ) {?>
         <?php wp_nav_menu($qsn);?>
        <?php  }; ?>

      </li>
   		<li>
        <a href="#">
          <div class="vbloc">Services &amp; produits</div>
          <div class="vbloc"><span class="icon icon-produits"></span></div>
        </a>
        <ul class="level-2 column">
          <li class="row-fluid">
            <div class="col-xs-6 services">
              <h2 class="text-warning"><span class="icon icon-gear"></span> Services</h2>
              <?php if ( has_nav_menu( 'services' ) ) {wp_nav_menu($services); }; ?>
            </div>
            <div class="col-xs-6 produits">
              <h2 class="text-info"><span class="icon icon-produits"></span> Produits</h2>
              <?php if ( has_nav_menu( 'produits' ) ) {wp_nav_menu($produits); }; ?>
            </div>        
          </li>
        </ul>
      </li>
   		<li>
        <a href="<?php echo get_permalink( 34 ); ?>">
          <div class="vbloc"><?php echo get_the_title( 34 ); ?></div>
          <div class="vbloc"><span class="icon icon-retd"></span></div>
        </a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=34&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
      <li>
        <a href="<?php echo get_permalink( 36 ); ?>">
          <div class="vbloc"><?php echo get_the_title( 36 ); ?></div>
          <div class="vbloc"><span class="icon icon-sites"></span></div>
        </a>
         <?php
          $qsn = wp_list_pages('title_li=&child_of=36&echo=0');
          if ($qsn) { ?>
          <ul class="level-2 nav">
          <?php echo $qsn; ?>
          </ul>
          <?php } ?>
      </li>
   		<li>
        <a href="#">
          <div class="vbloc">Espèces</div>
          <div class="vbloc"><span class="icon icon-especes"></span></div>
        </a>
        <?php if ( has_nav_menu( 'especes' ) ) {wp_nav_menu($especes); }; ?>
      </li>
   		<li>
        <a href="<?php echo site_url('/contact'); ?>">
          <div class="vbloc">Contact</div>
          <div class="vbloc"><span class="icon icon-contact"></span></div>
        </a>
      </li>
   		<li>
        <a href="<?php echo site_url('/espace-client'); ?>">
          <div class="vbloc">Espace client</div>
          <div class="vbloc"><span class="icon icon-espace-client"></span></div>
        </a>
      </li>
   	</ul>
</nav>