<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

<div class="container">
   <?php get_template_part('templates/navigation'); ?>
  
  <div class="wrap" role="document">

     

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

       <div class="nav-section arrow" >
            <a class="prev-section"><span class="icon icon-arrow-up"></span></a>
            <a class="next-section"><span class="icon icon-arrow-down"></span></a>
        </div>
    
    </div><!-- /.content -->

  </div><!-- /.wrap -->

  </div><!-- /.container -->
  
  <?php wp_footer(); ?>

  <!-- marqueur Xiti -->

  <?php

  if (is_front_page()) {$xtn2 = 1;}
  elseif (is_page('9') || is_page('11') || is_page('13') || is_page('15') || is_page('17') ) {$xtn2 = 2;}
  elseif (is_singular('services') || is_singular('produits')){$xtn2 = 3;}
  elseif (is_page('34')) {$xtn2 = 4;}
  elseif (is_page('36')) {$xtn2 = 5;}
  elseif (is_singular('especes')){$xtn2 = 6;}
  elseif (is_page('40')) {$xtn2 = 7;}
  else {$xtn2 = 0;}

  ?>

  <script type="text/javascript">
    <!--
    xtnv = document;        //parent.document or top.document or document         
    xtsd = "http://logc406";
    xtsite = "550787";
    xtn2 = "<?php echo $xtn2; ?>";        // level 2 site ID
    xtpage = "<?php the_title(); ?>";        //page name (with the use of :: to create chapters)
    xtdi = "";        //implication degree
    xt_multc = "";    //all the xi indicators (like "&x1=...&x2=....&x3=...")
    xt_an = "";        //user ID
    xt_ac = "";        //category ID
    //do not modify below
    if (window.xtparam!=null){window.xtparam+="&ac="+xt_ac+"&an="+xt_an+xt_multc;}
    else{window.xtparam="&ac="+xt_ac+"&an="+xt_an+xt_multc;};
    //-->
  </script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/xtcore.js"></script>
  <noscript>
    <img width="1" height="1" alt="" src="http://logc406.xiti.com/hit.xiti?s=550787&s2=&p=&di=&an=&ac=" >
  </noscript>

</body>
</html>
