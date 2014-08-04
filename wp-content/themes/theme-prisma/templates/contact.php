<aside class="section contact">
<?php $contact = new WP_Query( 'pagename=contact' ); ?>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">

	<!-- the loop -->
	  <?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
	    <h1 class="text-info"><span class="icon icon-contact"></span> <?php the_title(); ?></h1>
	    <?php the_content(); ?>
	  <?php endwhile; ?>
	<!-- end of the loop -->

	<?php wp_reset_postdata(); ?>

	

		</div>
	</div>

</aside>
