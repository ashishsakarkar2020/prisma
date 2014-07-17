<header class="mainheader text-center" role="banner" id="mainheader">

	<a class="brand" href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-prisma.png" alt="<?php bloginfo('name'); ?>"></a>
	<div id="login" class="col-xs-3 col-xs-offset-9">
		<a  href="<?php echo wp_login_url(); ?>" class="btn btn-success btn-block"><span>Espace client</span><br><small>identification</small></a>
	</div>
	
	<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p class="breadcrumb text-left">','</p>');
} ?>
</header>
