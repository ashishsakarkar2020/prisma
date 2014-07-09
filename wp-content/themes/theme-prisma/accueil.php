<?php
/*
Template Name: Page d'accueil
*/

// actus
$actus = array(
    'post_type' => 'post',
    'numberposts' => 2
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

wp_reset_postdata(); 

?>

<section class="section">
    
    <?php

    $images = get_field('slider');
     
    if( $images ): ?>

        <div id="slider" class="slider">

            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php the_content() ; ?>

    <!-- <div class="nav-count">5/5</div> -->

</section>

<section class="section">
    <div class="row">
        <div class="col-xs-6">
            <?php $query_actus = new WP_Query( $actus ); ?>

            <!-- the loop -->
            <?php while ( $query_actus->have_posts() ) : $query_actus->the_post(); ?>
            <h2><?php the_title(); ?></h2>            
            <?php // if ( has_post_thumbnail() ) { ?>
               <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); ?>
              <?php //   } ?>
            <?php the_excerpt() ; ?>
            <a href="<?php the_permalink() ; ?>" class="btn btn-primary">lire la suite</a>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <!-- pagination here -->

            <?php wp_reset_postdata(); ?>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-6">
                    <div class="acces wrapper">
                        <h2>Titre</h2>
                        <p>Aliquam nisl enim, tristique tempus placerat at, posuere in lectus. Suspendisse potenti cras molestie, risus a enim convallis vitae luctus libero lacinia. Nulla auctor eleifend turpis consequat pharetra. Donec et nisi dictum felis sollicitudin congue. Donec a congue leo. </p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces wrapper">
                        <h2>Titre</h2>
                        <p>Aliquam nisl enim, tristique tempus placerat at, posuere in lectus. Suspendisse potenti cras molestie, risus a enim convallis vitae luctus libero lacinia. Nulla auctor eleifend turpis consequat pharetra. Donec et nisi dictum felis sollicitudin congue. Donec a congue leo. </p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces wrapper">
                        <h2>Titre</h2>
                        <p>Aliquam nisl enim, tristique tempus placerat at, posuere in lectus. Suspendisse potenti cras molestie, risus a enim convallis vitae luctus libero lacinia. Nulla auctor eleifend turpis consequat pharetra. Donec et nisi dictum felis sollicitudin congue. Donec a congue leo. </p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces wrapper">
                        <h2>Titre</h2>
                        <p>Aliquam nisl enim, tristique tempus placerat at, posuere in lectus. Suspendisse potenti cras molestie, risus a enim convallis vitae luctus libero lacinia. Nulla auctor eleifend turpis consequat pharetra. Donec et nisi dictum felis sollicitudin congue. Donec a congue leo. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="nav-count">5/5</div> -->
</section>

<section class="section">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <?php if ( has_nav_menu( 'services' ) ) {wp_nav_menu($services); }; ?>
        </div>
    </div>
    <!-- <div class="nav-count">5/5</div> -->
</section>

<section class="section">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
            <?php if ( has_nav_menu( 'produits' ) ) {wp_nav_menu($produits); }; ?>
        </div>
    </div>
    <!-- <div class="nav-count">5/5</div> -->
</section>

<section class="section">
    <h2><?php  the_title(); ?></h2>
    <?php the_content() ; ?>
</section>

<div class="nav-section arrow" data-spy="affix" data-offset-top="120">
    <a href="#" class="prev-section"><span class="icon icon-arrow-up"></span></a>
    <a href="#" class="next-section"><span class="icon icon-arrow-down"></span></a>
</div>