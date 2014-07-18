<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

<div class="container">
  
  <div class="wrap" role="document">

      <?php get_template_part('templates/navigation'); ?>

    <div class="content row">

      <?php
        do_action('get_header');
        // Use Bootstrap's navbar if enabled in config.php
          get_template_part('templates/header');
      ?>

      <main class="main wrapper ombrage <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
        <?php get_search_form(); ?>

      </main><!-- /.main -->

      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>

      <div class="col-xs-12">
        <?php get_template_part('templates/footer'); ?>
      </div>

       <div class="nav-section arrow" data-spy="affix" data-offset-top="110">
            <a href="#" class="prev-section"><span class="icon icon-arrow-up"></span></a>
            <a href="#" class="next-section"><span class="icon icon-arrow-down"></span></a>
        </div>
    
    </div><!-- /.content -->

  </div><!-- /.wrap -->

  </div><!-- /.container -->
  
  <?php wp_footer(); ?>

</body>
</html>
