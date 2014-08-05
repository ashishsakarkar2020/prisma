<div class="section section-contact">
	<div class="hentry row">
		<div class="col-xs-10 col-xs-offset-1">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('templates/content', 'contact'); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>