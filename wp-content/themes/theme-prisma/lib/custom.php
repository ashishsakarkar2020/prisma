<?php
/**
 * Custom functions
 */
function register_prisma_menus() {
  register_nav_menus(
    array(
      'qui-sommes-nous' => __( 'Qui sommes-nous ?' ),
      'services' => __( 'Services' ),
      'produits' => __( 'Produits' ),
      'especes' => __( 'Especes' ),
      'footer' => __( 'Pied de page' ),
    )
  );
}

function get_the_slug() {

	  global $post;

	  if ( is_single() || is_page() ) {
	  return $post->post_name;
	  }
	  else {
	  return "";
	}

}


add_action( 'init', 'register_prisma_menus' );

add_image_size( 'square', 300, 300 );
add_image_size( 'actus', 600, 200 );