<?php $images = get_field('slider');
 
  if( $images ): ?>

  <div class="slider-wrapper">
    
    <div class="slider">
  
      <?php foreach( $images as $image ):?>
          <div>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
          </div>
          
      <?php endforeach; ?>

    </div><!-- /slider -->

    <?php if(count($images) != 1) : ?>

	    <div class="arrow nav-slider text-right">
	      <a href="#" class="prev"><span class="icon icon-arrow-left"></span></a>
	      <a><span class="owlItem"></span> / <span class="owlItems"></span></a>
	      <a href="#" class="next bloc"><span class="icon icon-arrow-right"></span></a>
	    </div><!-- /nav wrapper -->

    <?php endif; ?>

  </div><!-- /slider wrapper -->
<?php endif; ?>