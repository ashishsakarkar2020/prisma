<form role="search" method="get" class="search-form wrapper bg-primary" action="<?php echo home_url('/'); ?>">
  <div class="row">
  	<label class="control-label sr-only">Rechercher</label>
  	<div class="col-xs-4 col-xs-offset-8">
    	<div class="input-group">
	    	<input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'roots'); ?>">
	    	<div class="input-group-addon"><span class="icon icon-search"></span></div>
	    </div>
    </div>
  </div>
</form>