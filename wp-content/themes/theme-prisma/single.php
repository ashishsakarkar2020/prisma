<?php
	$cpt = get_post_type( get_the_ID() ); // Get the current post type
	if ($cpt !== 'post') {
		get_template_part('templates/content', $cpt);
		get_template_part('templates/contact');

	}
	else {
		get_template_part('templates/content', 'single');
	}
?>