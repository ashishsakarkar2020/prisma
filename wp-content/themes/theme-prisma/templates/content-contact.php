<h1 class="text-info">
	<span class="icon icon-contact"></span> <?php the_title(); ?>
</h1>
<?php if(get_field('soutitre')) { ?>
	<h2 class="text-primary h5"><?php the_field('soutitre') ?></h2>
<?php } ?>

<?php the_content(); ?> 