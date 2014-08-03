<article <?php post_class(); ?>>
<article <?php post_class(); ?>>
    <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
    <header>
      <h1 class="entry-title h2 text-info"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
  <hr>
</article>
