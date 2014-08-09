
  <article class="row innovation">
    
      <div class="col-xs-5">

          <?php if ( has_post_thumbnail() ) : ?>
          
             <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>

          <?php endif; ?>

      </div>

      <div class="col-xs-6 col-xs-offset-1">

        <h3><?php the_title(); ?>

        <?php if(get_field('soutitre')) { ?>
              <small><?php the_field('soutitre'); ?></small>
            <?php } ?>
        </h3>
        <?php the_content(); ?>

      </div>


  </article>
  <hr>