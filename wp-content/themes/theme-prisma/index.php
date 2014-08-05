<?php get_template_part('templates/page', 'header'); ?>

<div class="row">

  <div class="col-xs-10 col-xs-offset-1">

    <?php if (!have_posts()) : ?>
      <div class="alert alert-info">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content'); ?>
      <hr />
    <?php endwhile; ?>

  </div>

</div>


  <nav class="pagination">
    <?php theme_pagination(); ?>
  </nav>

