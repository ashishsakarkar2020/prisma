<article <?php post_class("col-xs-offset-1"); ?>>

	<header class="page-header">
	    <?php get_template_part('templates/entry-meta'); ?>
	    <h2><?php the_title(); ?></h2>
	</header>  
	<?php the_post_thumbnail('actus', array('class' => 'img-responsive')); ?>
	<p><?php the_excerpt() ; ?></p>
	<a href="<?php the_permalink() ; ?>" class="btn btn-primary">lire la suite</a>
</article>
