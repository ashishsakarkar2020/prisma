<?php

 $catid = get_query_var('cat');

$args_archives = array(
	'type'            => 'monthly',
	'limit'           => '',
	'format'          => 'html', 
	'before'          => '',
	'after'           => '',
	'show_post_count' => false,
	'echo'            => 1,
	'order'           => 'DESC',
);

$args_categories = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'exclude'            => '1',
	'title_li'           => '',
	'echo'               => 1,
	'current_category'   => $catid,
	'taxonomy'           => 'category'
); 

?>
<div class="wrapper">
	<nav class="archives widget ombrage">
		<h3 class="widget-title bg-info">Archives</h3>
		<ul class="nav">
			<?php wp_get_archives( $args_archives ); ?>
		</ul>
	</nav>
	<nav class="themes widget ombrage">
		<h3 class="widget-title bg-primary">Thèmes</h3>
		<ul class="nav">
			<?php wp_list_categories($args_categories); ?>
		</ul>
	</nav>
	<?php dynamic_sidebar('sidebar-primary'); ?>
</div>