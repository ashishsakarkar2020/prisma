<?php
/*
Template Name: Section Page
*/

$parentid = $post->ID;
// on récupère l'id de la page courante soit la page parente
$args = array(
    'post_type' => 'page',
    'numberposts' => -1, // -1 signifie toutes les sous-pages
    'post_parent' => $parentid // numéro de la page parente
    );
$posts = get_posts($args);

?>
<?php get_template_part('templates/page', 'header'); ?>

<?php the_content() ; ?>

<?php foreach ($posts as $post) :
    setup_postdata($post); ?>
    <section class="section">
	    <h2><?php  the_title(); ?></h2>
	    <?php the_content() ; ?>
	    <ul class="nav nav-section">
			<li><a href="#" class="prev-section">prev</a></li>
			<li><a href="#" class="next-section">next</a></li>
		</ul>
    </section>
<?php endforeach; ?>