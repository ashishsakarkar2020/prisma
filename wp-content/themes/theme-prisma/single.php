<?php
	$cpt = get_post_type( get_the_ID() ); // Get the current post type
	
	if ($cpt !== 'post') {
		get_template_part('templates/content', $cpt); ?>
		
		<aside class="section section-contact">
		<?php $contact = new WP_Query( 'pagename=contact' ); ?>

			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
				<?php while ($contact->have_posts()) : $contact->the_post(); ?>
	  				<?php get_template_part('templates/content', 'contact'); ?>
				<?php endwhile; ?>
				
				</div> <!-- .col -->
			</div> <!-- row -->
		

		<?php wp_reset_postdata(); ?>

		</aside>

	<?php }

	else {
		get_template_part('templates/content', 'single');
	}
?>