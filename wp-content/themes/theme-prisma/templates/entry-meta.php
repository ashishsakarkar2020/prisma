<?php $category = get_the_category(); ?>


<p class="h3 meta">
	<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
	<small>
		<?php 
foreach((get_the_category()) as $category) { 
    echo '| <span class="' . $category->slug . '">' . $category->cat_name . '</span> '; 
} 
?>
	</small>
</p>