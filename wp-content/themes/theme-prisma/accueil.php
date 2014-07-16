<?php
/*
Template Name: Page d'accueil
*/

// actus
$actus = array(
    'post_type' => 'post',
    'numberposts' => 2
    );

// especes
$especes = array(
    'post_type' => 'especes'
    );

$services = array(
  'menu'            => 'services',
  'container'       => false,
  'menu_class'      => 'nav',
  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
);

$produits = array(
  'menu'            => 'produits',
  'container'       => false,
  'menu_class'      => 'nav',
  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  'depth'           => 0,
  'walker'          => ''
);

wp_reset_postdata(); 

?>

<!-- Slider -->

<section class="section">


<?php

// check if the flexible content field has rows of data
if( have_rows('slider') ):
 
    
?>

    <div class="slider">

    <?php     // loop through the rows of data
    while ( have_rows('slider') ) : the_row(); ?>
        
     
        <?php if( get_row_layout() == 'slide' ):?>
            <div class="slide">
                <img src="<?php the_sub_field('image'); ?>" class="img-responsive" />
                <div class="row slide-caption">
                    <div class="col-xs-4 col-xs-offset-7">
                        <h1><?php the_sub_field('titre'); ?></h1>
                        <hr>
                        <h2><?php the_sub_field('sous_titre'); ?></h2>
                        <p><a href="<?php the_sub_field('lien'); ?>"class="btn btn-primary">Lire la suite</a></p>
                    </div>
                </div>
            </div>        
        <?php endif; ?>
    

    <?php endwhile; ?>

    </div>
        
<?php endif; ?>        

</section>

<section class="section">
    <div class="row">

        <!-- Actus-->

        <div class="col-xs-6">
            <div class="actus">
                <?php 
                    $query_actus = new WP_Query( $actus );
                    $a = 0;
                ?>

                <h2 class="h1 text-info text-center"><span class="icon icon-pin"></span>Actualités</h2>
                <h3 class="text-center">nouveautés &amp; évènements</h3>

                <!-- the loop -->
                <?php 
                    while ( $query_actus->have_posts() ) : 
                    $query_actus->the_post(); 
                    $a = $a + 1;
                    ?>
                
                <article <?php post_class(); ?>>

                    <header class="page-header">
                        <p class="h3 meta">14/07/14 | <small>theme</small></p>
                        <h2 class="h3"><?php the_title(); ?></h2>
                    </header>  

                    <?php  if ($a == 1) { ?>
                       <?php the_post_thumbnail('actus', array('class' => 'img-responsive')); ?>
                      <?php   } ?>
                    <p><?php the_excerpt() ; ?></p>
                    <a href="<?php the_permalink() ; ?>" class="btn btn-primary">lire la suite</a>
                </article>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        
        <!-- Section Accès directs -->

        <div class="col-xs-6">

            <div class="row">
                <div class="col-xs-6">
                    <div class="acces">
                        
                        <!-- prisma-->

                        <?php $query_prisma = new WP_Query( 'page_id=9' ); ?>

                        <!-- the loop -->
                        <?php while ( $query_prisma->have_posts() ) : $query_prisma->the_post(); ?>
                        <a href="<?php the_permalink() ; ?>" class="btn-info text-center">
                            <p class="h1"><span class="icon icon-prisma"></span></p>
                            <h2 class="h3"><?php the_title(); ?></h2>            
                            <p><?php if(get_field('sous_titre')) {the_field('sous_titre');} ?></p>
                        </a>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces">
                        
                        <!-- l'équipe-->

                        <?php $query_prisma = new WP_Query( 'page_id=11' ); ?>

                        <!-- the loop -->
                        <?php while ( $query_prisma->have_posts() ) : $query_prisma->the_post(); ?>
                        <a href="<?php the_permalink() ; ?>" class="btn-warning text-center">
                            <p class="h1"><span class="icon icon-users"></span></p>
                            <h2 class="h3"><?php the_title(); ?></h2>            
                            <p><?php if(get_field('sous_titre')) {the_field('sous_titre');} ?></p>
                        </a>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces">
                        
                        <!-- Comment travaillons-nous ? -->

                        <?php $query_prisma = new WP_Query( 'page_id=13' ); ?>

                        <!-- the loop -->
                        <?php while ( $query_prisma->have_posts() ) : $query_prisma->the_post(); ?>
                        <a href="<?php the_permalink() ; ?>" class="btn-primary text-center">
                            <p class="h1"><span class="icon icon-factory"></span></p>
                            <h2 class="h3"><?php the_title(); ?></h2>            
                            <p><?php if(get_field('sous_titre')) {the_field('sous_titre');} ?></p>

                        </a>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="acces">
                        
                        <!-- R&D -->

                        <?php $query_prisma = new WP_Query( 'page_id=34' ); ?>

                        <!-- the loop -->
                        <?php while ( $query_prisma->have_posts() ) : $query_prisma->the_post(); ?>
                        <a href="<?php the_permalink() ; ?>" class="btn-success text-center">
                            <p class="h1"><span class="icon icon-retd"></span></p>
                            <h2 class="h3"><?php the_title(); ?></h2>            
                            <p><?php if(get_field('sous_titre')) {the_field('sous_titre');} ?></p>
                        </a>
                        <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Services -->

<?php

// check if the flexible content field has rows of data
if( have_rows('services') ):
 
    
?>

    <?php     // loop through the rows of data
    while ( have_rows('services') ) : the_row(); ?>
        
        
     
        <?php if( get_row_layout() == 'intro' ):?>
        <section class="section services" style="background-image: url('<?php the_sub_field('image'); ?>')">
            
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-1 text-right">
                        <h1 class="text-primary"><span class="icon icon-gear"></span> services</h1>
                        <h2><?php the_sub_field('sous_titre'); ?></h2>     
                        <p><?php the_sub_field('description'); ?></p>
                    </div>

                    <div class="col-xs-offset-1 col-xs-4">
                    <?php if ( has_nav_menu( 'services' ) ) {wp_nav_menu($services); }; ?>
                    </div>
                </div>

    </section>
     
        <?php endif; ?>
    

    <?php endwhile; ?>
        
<?php endif; ?>

<!-- Section produits -->

<?php

// check if the flexible content field has rows of data
if( have_rows('produits') ):
 
    
?>

    <?php     // loop through the rows of data
    while ( have_rows('produits') ) : the_row(); ?>
        
        
     
        <?php if( get_row_layout() == 'intro' ):?>
        <section class="section produits" class="section services" style="background-image: url('<?php the_sub_field('image'); ?>')">
            
            <div class="row">
                <div class="col-xs-6 col-xs-offset-1 text-right">
                <h1><span class="icon icon-produits"></span> produits</h1>
                <h2><?php the_sub_field('sous_titre'); ?></h2>     
                <p><?php the_sub_field('description'); ?></p>
            </div>

            <div class="col-xs-offset-1 col-xs-4">
            <?php if ( has_nav_menu( 'produits' ) ) {wp_nav_menu($produits); }; ?>
            </div>
        </div>
    </section>
     
        <?php endif; ?>
    

    <?php endwhile; ?>
        
<?php endif; ?>

<!-- Section espèces -->

<?php

// check if the flexible content field has rows of data
if( have_rows('especes') ):
 
    
?>

    <?php     // loop through the rows of data
    while ( have_rows('especes') ) : the_row(); ?>
        
        
     
        <?php if( get_row_layout() == 'intro' ):?>
        <section class="section especes" class="section services">
            
            <div class="row">

                <div class="col-xs-4 col-xs-offset-1 text-right">
                    <h1><span class="icon icon-especes"></span> Espèces</h1>
                    <h2><?php the_sub_field('sous_titre'); ?></h2>
                </div>

                <div class="col-xs-6"> 
                    <p class="desc"><?php the_sub_field('description'); ?></p>
                </div>

            </div>

            <div id="slider-especes" class="owl-carousel carousel">

                <?php $query_especes = new WP_Query( $especes ); ?>

                <!-- the loop -->
                <?php while ( $query_especes->have_posts() ) : $query_especes->the_post(); ?>

                <div class="slide text-center">

                            
                    
                    <?php // if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink() ; ?>">
                       <?php the_post_thumbnail('square', array('class' => 'img-responsive')); ?>
                    </a>
                    <?php //   } ?>

                    <h2><?php the_title(); ?></h2>  

                </div>
                
                
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>
           
            </div>

            
    </section>
     
        <?php endif; ?>
    

    <?php endwhile; ?>
        
<?php endif; ?>

<div class="nav-section arrow" data-spy="affix" data-offset-top="120">
    <a href="#" class="prev-section"><span class="icon icon-arrow-up"></span></a>
    <a href="#" class="next-section"><span class="icon icon-arrow-down"></span></a>
</div>