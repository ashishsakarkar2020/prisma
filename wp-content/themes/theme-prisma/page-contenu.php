<?php
/*
Template Name: Contenu
*/
?>


<?php

 
$images = get_field('slider');
 
if( $images ): ?>

    <div id="slider" class="slider">

            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                </div>
            <?php endforeach; ?>
    </div>


<?php endif; ?>

<?php get_template_part('templates/page', 'header'); ?>
<?php if(get_field('chapo')) { ?>
	<p class="lead"><?php the_field('chapo'); ?></p>
<?php } ?>
<?php get_template_part('templates/content', 'page'); ?>
