<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    
      <?php $images = get_field('slider');
      $count = 0;
      $nbre = count($images);
      if( $images ): ?>
      <div class="slider-wrapper">
        <div id="slider" class="slider">
      
          <?php foreach( $images as $image ):
            $count = $count + 1;
           ?>
              <div>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                  <span class="count"><?php echo $count; ?></span>
              </div>
              
          <?php endforeach; ?>

        </div><!-- /slider -->

        <!-- <div class="arrow nav-slider text-right">
          <a href="#" class="prev"><span class="icon icon-arrow-left"></span></a>
          <a>&nbsp; / <?php echo $nbre; ?></a>
          <a href="#" class="next bloc"><span class="icon icon-arrow-right"></span></a>
        </div> --><!-- /nav wrapper -->

      </div><!-- /slider wrapper -->
      <?php endif; ?>
      <header class="col-xs-10 col-xs-offset-1">
        <h1 class="entry-title"><span class="icon icon-gear"></span> <?php the_title(); ?></h1>
        <h2>services</h2>
      </header>

      <div class="entry-content col-xs-10 col-xs-offset-1">

        <?php if(get_field('chapo')) { ?>
          <p class="lead"><?php the_field('chapo'); ?></p>
        <?php } ?>

        <?php the_content(); ?>

      </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

  </article>
<?php endwhile; ?>