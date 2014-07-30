<header class="mainheader text-center" role="banner" id="mainheader">

	<a class="brand" href="<?php echo home_url('/') ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-prisma.png" alt="<?php bloginfo('name'); ?>"></a>
	<div id="login" class="col-xs-3 col-xs-offset-9">
		<a  href="<?php // echo wp_login_url();  ?> <?php echo site_url('/espace-client'); ?>" class="btn btn-success btn-block"><span>Espace client</span><br><small>identification</small></a>
	</div>
	
	<?php dimox_breadcrumbs(); ?>
</header>
