<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<?php
if ( function_exists( 'ninja_forms_display_form' ) ) {
  ninja_forms_display_form( 1 );
}