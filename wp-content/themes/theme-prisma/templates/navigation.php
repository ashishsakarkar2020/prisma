<nav class="nav-main" role="navigation">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>
   	<ul class="level-1 nav">
   		<li><a href="<?php echo site_url('/'); ?>">Accueil</a></li>
   		<li><a href="<?php echo site_url('/qui-sommes-nous'); ?>">Qui sommes-nous ?</a></li>
   		<li><a href="<?php echo site_url('/'); ?>">Services &amp; produits</a></li>
   		<li><a href="<?php echo site_url('/rechercheetdeveloppement'); ?>">R&amp;D</a></li>
   		<li><a href="<?php echo site_url('/qualite'); ?>">Qualité</a></li>
   		<li><a href="<?php echo site_url('/'); ?>">Espèces</a></li>
   		<li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
   		<li><a href="<?php echo site_url('/espace-client'); ?>">Espace client</a></li>
   	</ul>
</nav>