<article <?php post_class(); ?>>

	<header class="">
	    
	    <h2 class="h3"><?php the_title(); ?></h2>
	    <?php get_template_part('templates/entry-meta'); ?>
	</header>  

	<?php the_post_thumbnail('actus', array('class' => 'img-responsive')); ?>
	
	<p><?php the_excerpt() ; ?></p>
	<a href="<?php the_permalink() ; ?>" class="btn btn-primary">lire la suite</a>
</article>
