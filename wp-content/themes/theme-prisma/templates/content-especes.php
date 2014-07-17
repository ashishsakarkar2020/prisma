<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    
      <?php get_template_part('templates/slider'); ?>
    
      <header class="col-xs-10 col-xs-offset-1">
        <h1 class="entry-title"><span class="icon icon-<?php echo get_the_slug();?>"></span> <?php the_title(); ?></h1>
        <h2>espèces</h2>
      </header>

      <div class="entry-content col-xs-10 col-xs-offset-1">

        <?php if(get_field('chapo')) { ?>
          <p class="lead"><?php the_field('chapo'); ?></p>
        <?php } ?>

        <?php the_content(); ?>

      </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

  </article>
<?php endwhile; ?>