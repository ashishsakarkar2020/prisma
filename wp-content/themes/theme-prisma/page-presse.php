<?php
/*
Template Name: Espace presse
*/
?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1">

		<?php get_template_part('templates/page', 'header'); ?>
		<?php if(get_field('chapo')) { ?>
			<p class="lead"><?php the_field('chapo'); ?></p>
		<?php } ?>
		<?php
 
		// check if the repeater field has rows of data
		if( have_rows('dossier') ): ?>

			<ul class="list-unstyled list-presse">
		 
		    <?php while ( have_rows('dossier') ) : the_row(); ?>

		    	<li>
		    		<article>
		 				<?php if( get_sub_field('thumb') ): 
	        				$thumb = get_sub_field('thumb'); ?>
	        				<img src="<?php echo $thumb['sizes'][ 'thumbnail' ]; ?>" class="pull-right thumbnail" />
		        		<?php endif;?>
		        		<h3><?php the_sub_field('title'); ?></h3>	
		        		<p><?php the_sub_field('description'); ?></p>
		        		<p><a href="<?php the_sub_field('pdf'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Télécharger</a></p>

		    		</article>

		    	</li>

		    	<hr>
		 
		    <?php endwhile; ?>

			</ul>
		 
		<?php else :
		 
		    // no rows found
		 
		endif;
		 
		?>
	</div>
</div>
