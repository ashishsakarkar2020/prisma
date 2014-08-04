<?php 

while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>

<?php if ( $post->post_parent > 0 ) : // page innovation par catégorie ?>
  
  

    <div class="section section-header">

          <?php get_template_part('templates/slider'); ?>


    </div> <!-- / header -->
   
    <div class="section">

       <div class="row">
          
          <div class="entry-content col-xs-10 col-xs-offset-1">

            <header>
                <h1 class="entry-title text-primary"><?php the_title(); ?></h1>
                <?php if(get_field('chapo')) { ?>
                  <p class="lead"><?php the_field('chapo'); ?></p>
                <?php } ?>
            </header>
            
            <?php the_content(); ?>

            <?php if( have_rows('innovations') ): ?>

              <ul class="list-unstyled">
               
                <?php while ( have_rows('innovations') ) : the_row();

                    $innovation = get_sub_field('innovation');
                    
                    // override $post
                    $post = $innovation;
                    setup_postdata( $post ); 
                ?>

                  <li><?php get_template_part('templates/innovations');?></li>

                  <?php wp_reset_postdata(); ?>

                <?php endwhile; ?>

              </ul>
               
              <?php else :
               
                  // no rows found
               
              endif;
               
              ?>

          </div>
          
        </div> <!-- /row -->

      </div> <!-- /.section -->

<?php else : // page espèces

    $inno = array(
    'post_type'      => 'especes',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 ); ?>

    <div class="section section-header">

          <div class="row">

            <div class="col-xs-4">
              <header class="wrapper">
                <h1 class="entry-title text-primary"><?php the_title(); ?></h1>
                <?php if(get_field('chapo')) { ?>
                  <p class="text-justify"><?php the_field('chapo'); ?></p>
                <?php } ?>
              </header>
            </div>

            <div class="col-xs-8">
              <?php get_template_part('templates/slider'); ?>
            </div>

        </div> <!-- /.row -->
    </div> <!-- /.section-header -->
    
    <!-- Atouts -->
    <section class="section">
      <div class="row">
        <header class="entry-content col-xs-10 col-xs-offset-1">
          <h1><span class="icon icon-tag"></span> Nos atouts</h1>
        </header>
        <div class="entry-content col-xs-8 col-xs-offset-2">
          
           <?php the_content(); ?>

        </div>
        <footer class="section-footer col-xs-10 col-xs-offset-1"></footer>
      </div>
    </section>

    <!-- services -->
    <section class="section">

      <div class="row">

        <header class="entry-content col-xs-10 col-xs-offset-1">
          <h1 class="text-warning"><span class="icon icon-gear"></span> Services</h1>
        </header>

        <div class="entry-content col-xs-8 col-xs-offset-2">
          
          <?php if( have_rows('services') ): ?>

          <ul class="list-unstyled">
           
            <?php while ( have_rows('services') ) : the_row();

                $service = get_sub_field('service');
                // override $post
                $post = $service;
                setup_postdata( $post ); 
            ?>

              <li>
                <h3><a href="<?php the_permalink(); ?>" class="text-warning"><?php the_title(); ?></a> <em class="text-muted"><?php if(get_field('soutitre')) { the_field('soutitre');} ?></em></h3>
                <?php the_sub_field('description'); ?>

              </li>

              <?php wp_reset_postdata(); ?>

            <?php endwhile; ?>

          </ul>
           
          <?php else :
           
              // no rows found
           
          endif;
           
          ?>
        </div>

        <footer class="section-footer col-xs-10 col-xs-offset-1"></footer>

      </div>
    </section>    
       
    <!-- Produits -->
    <section class="section">
      <div class="row">
        <header class="entry-content col-xs-10 col-xs-offset-1">
          <h1 class="text-primary"><span class="icon icon-produits"></span> Produits</h1>
        </header>
        <div class="entry-content col-xs-8 col-xs-offset-2">
          
          <?php if( have_rows('produits') ): ?>

          <ul class="list-unstyled">
           
            <?php while ( have_rows('produits') ) : the_row();

                $produit = get_sub_field('produit');
                // override $post
                $post = $produit;
                setup_postdata( $post ); 
            ?>

              <li>
                <h3><a href="<?php the_permalink(); ?>" class="text-primary"><?php the_title(); ?></a> <em class="text-muted"><?php if(get_field('soutitre')) { the_field('soutitre');} ?></em></h3>
                <?php the_sub_field('description'); ?>

              </li>

              <?php wp_reset_postdata(); ?>

            <?php endwhile; ?>

          </ul>
           
          <?php else :
           
              // no rows found
           
          endif;
           
          ?>
        </div>

        <footer class="section-footer col-xs-10 col-xs-offset-1"></footer>

      </div>
    </section>  



    <!-- Innovations par catégorie -->

    <?php $innovations = new WP_Query( $inno );

     if ( $innovations->have_posts() ) : ?>

      

    <aside class="section innovations section-carousel">

      <div class="row">

        <div class="col-xs-10 col-xs-offset-1">
            <h1 class="h2">Découvrez nos innovations</h1>
            <h2 class="h3">par catégories</h2>
        </div>


      </div>

     <div class="carousel">
      <?php while ( $innovations->have_posts() ) : $innovations->the_post(); ?>

      

        <div class="slide text-center">
                     
          <?php if ( has_post_thumbnail() ) : ?>
          
          <a href="<?php the_permalink() ; ?>">
             <?php the_post_thumbnail('square', array('class' => 'img-responsive')); ?>
          </a>

          <?php endif; ?>

          <h2><?php the_title(); ?></h2>

      </div>

      <?php endwhile; ?>
    </div>

    </aside>

    <?php endif; wp_reset_query(); //inonvations ?> 


  <?php endif; // is subpage ?>

  </article>

<?php endwhile; ?>

<nav>
  <ul class="pager">
    <li class="previous"><?php previous_post_link('%link', 'catégorie précédente', true,'', 'post_tag'); ?></li>
    <li class="next"><?php next_post_link('%link', 'catégorie suivante', true, '', 'post_tag'); ?></li>
  </ul>
</nav>

        