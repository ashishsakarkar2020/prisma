<?php get_template_part('templates/page', 'header'); ?>

<div class="row">

  <div class="col-xs-10 col-xs-offset-1">

    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>

    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'archive'); ?>
    <?php endwhile; ?>

  </div>

</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
     <?php  pagination( $wp_query);  ?>
  </nav>
<?php endif; ?>
