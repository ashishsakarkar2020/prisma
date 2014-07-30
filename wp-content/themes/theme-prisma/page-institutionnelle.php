<?php
/*
Template Name: Institutionnelle
*/
?>


<?php get_template_part('templates/page', 'header'); ?>

<?php

// check if the flexible content field has rows of data
if( have_rows('sections') ):
 
    
?>

    <div class="row">
	        	<div class="col-xs-10 col-xs-offset-1">

<?php     // loop through the rows of data
    while ( have_rows('sections') ) : the_row(); ?>


     
        <?php if( get_row_layout() == 'texte' ):?>

        <section class="section texte"> 


            <h2 class="text-info"><?php the_sub_field('titre'); ?></h2>
            <?php the_sub_field('description'); ?>

	    </section>

        <?php endif; ?>

        <?php if( get_row_layout() == 'liste' ):?>

        <section class="section liste bg-primary">

            <h2 class=""><?php the_sub_field('titre'); ?></h2>
            <?php // check if the repeater field has rows of data
			if( have_rows('description') ): ?>

	            <ul>
	            	<?php // loop through the rows of data
					while ( have_rows('description') ) : the_row(); ?>
	            	<li><?php the_sub_field('item');?></li>
	            	<?php endwhile; ?>
	            </ul>

	        <?php endif; ?>
	    </section>

        <?php endif; ?>

        <?php if( get_row_layout() == 'temoignages' ):?>

        <section class="section temoignages">

	        

            <h2 class="text-info"><?php the_sub_field('titre'); ?></h2>
            
            <?php // check if the repeater field has rows of data
			if( have_rows('description') ): ?>

    		
	            	
	            	<?php // loop through the rows of data
					while ( have_rows('description') ) : the_row(); ?>
	            	<h4><?php the_sub_field('nom');?> <small><?php the_sub_field('fonction');?></small></h4>
	            	<img src="<?php the_sub_field('image');?>" class="pull-right">
	            	<?php the_sub_field('temoignage');?>
	            	<?php endwhile; ?>
	         

	        <?php endif; ?>
	        	
       
	    </section>

        <?php endif; ?>

        <?php if( get_row_layout() == 'image' ):?>

        <section class="section image"> 


            <h2 class="text-info"><?php the_sub_field('titre'); ?></h2>
            <?php 

				$image = get_sub_field('image');
				 
				if( !empty($image) ): ?>
				 
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
				 
				<?php endif; ?>


	    </section>

        <?php endif; ?>

        <?php if( get_row_layout() == 'slider' ):?>

        <section class="section slider">

        	<h2 class="text-info"><?php the_sub_field('titre'); ?></h2>

	        <?php $images = get_sub_field('gallery');
			      $count = 0;
			      $nbre = count($images);
			      if( $images ): ?>
			      <div class="slider-wrapper">
			        <div id="slider" class="slider-arrow">
			      
			          <?php foreach( $images as $image ):
			            $count = $count + 1;
			           ?>
			              <div>
			                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
			                  <span class="count"><?php echo $count; ?></span>
			              </div>
			              
			          <?php endforeach; ?>

			        </div><!-- /slider -->

		      </div><!-- /slider wrapper -->
		      <?php endif; ?>

    	</section>

    	<?php endif; ?>
    

    <?php endwhile; ?>

	</div>
</div>
        
<?php endif; ?>

<?php get_template_part('templates/content', 'page'); ?>