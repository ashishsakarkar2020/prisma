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

    <div class="content">

      <?php
        do_action('get_header');
        // Use Bootstrap's navbar if enabled in config.php
          get_template_part('templates/header');
      ?>

      <main class="main" role="main">
        <?php include roots_template_path(); ?>
        <?php get_search_form(); ?>
      </main><!-- /.main -->

      <?php get_template_part('templates/footer'); ?>
    
    </div><!-- /.content -->

  </div><!-- /.wrap -->

  </div><!-- /.container -->
  
  <?php wp_footer(); ?>

</body>
</html>
