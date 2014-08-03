<?php get_template_part('templates/page', 'header'); ?>

<div class="row">

<div class="col-xs-10 col-xs-offset-1">


  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'roots'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

  <ul class="list-unstyled">

  <?php while (have_posts()) : the_post(); ?>
    <li>
      <h3><a href="<?php the_permalink(); ?>" class="text-info"><?php the_title(); ?></a> <em class="text-muted"><?php if(get_field('soutitre')) { the_field('soutitre');} ?></em></h3>
      <?php the_sub_field('description'); ?>

    </li>
  <?php endwhile; ?>

</ul>

</div>

</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
