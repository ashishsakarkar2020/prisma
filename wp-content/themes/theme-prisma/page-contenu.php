<?php
/*
Template Name: Contenu
*/
?>

<?php get_template_part('templates/slider'); ?>

<div class="row section">
	<div class="col-xs-10 col-xs-offset-1">

		<?php get_template_part('templates/page', 'header'); ?>
		<?php if(get_field('chapo')) { ?>
			<p class="lead"><?php the_field('chapo'); ?></p>
		<?php } ?>
		<?php get_template_part('templates/content', 'page'); ?>
	</div>
</div>
