<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('section'); ?>>
    <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
      <header class="page-header">
        <h1 class="entry-title h2 text-primary"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php the_tags('<p><span class="icon-tags"></span> ',' &bull; ','</p>'); ?>
      </footer>
      </div>
    </div>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>