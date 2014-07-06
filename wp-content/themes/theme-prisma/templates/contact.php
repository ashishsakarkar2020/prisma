<?php $contact = new WP_Query( 'pagename=contact' ); ?>

<!-- the loop -->
  <?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
    <h2><?php the_title(); ?></h2>
  <?php endwhile; ?>
<!-- end of the loop -->

<?php wp_reset_postdata(); ?>
