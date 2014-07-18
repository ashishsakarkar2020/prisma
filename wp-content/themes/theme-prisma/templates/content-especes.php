<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <div class="section section-header">

        <div class="row">

          <div class="col-xs-4">
            <header class="wrapper">
              <h1 class="entry-title h2"><span class="icon icon-<?php echo get_the_slug();?>"></span> <?php the_title(); ?></h1>
              <?php if(get_field('chapo')) { ?>
                <p class="lead"><?php the_field('chapo'); ?></p>
              <?php } ?>

              <?php the_content(); ?>
            </header>
          </div>

          <div class="col-xs-8">
            <?php get_template_part('templates/slider'); ?>
          </div>

      </div>
    </div>
  
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
  <section>

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

            <li><a href="<?php the_permalink(); ?>" class="text-warning"><?php the_title(); ?></a> : <?php if(get_field('chapo')) { the_field('chapo');} ?></li>

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
  <section>    
     
  <!-- Produits -->
  <section class="section">
    <div class="row">
      <header class="entry-content col-xs-10 col-xs-offset-1">
        <h1 class="text-primary"><span class="icon icon-produits"></span> Produits</h1>
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

            <li><a href="<?php the_permalink(); ?>" class="text-warning"><?php the_title(); ?></a> : <?php if(get_field('chapo')) { the_field('chapo');} ?></li>

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
  <section>


    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

  </article>

  <?php $innovations = types_child_posts("innovations");

   if( $innovations ): ?>

  <aside class="section innovations section-carousel">

    <div class="row">

      <div class="col-xs-10 col-xs-offset-1">
          <h1 class="h2">Découvrez nos innovations</h1>
          <h2 class="h3">par catégories</h2>
      </div>

      <div class="col-xs-6"> 
          <p class="desc"><?php the_sub_field('description'); ?></p>
      </div>

    </div>

   <div class="carousel">
    <?php foreach ($innovations as $post):?>

    

      <div class="slide text-center">
                   
        <?php // if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink() ; ?>">
           <?php the_post_thumbnail('square', array('class' => 'img-responsive')); ?>
        </a>
        <?php //   } ?>

        <h2><?php the_title(); ?></h2>  
    </div>

    <?php endforeach; ?>
  </div>

  </aside>

  <?php endif; ?>

<?php endwhile; ?>