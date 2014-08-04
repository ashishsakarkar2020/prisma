<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
    <header>
      <h1 class="entry-title h2 text-primary"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
    
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>