<?php
/**
 * Custom functions
 */

// initialization des menus de navigation

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

// Tailles des vignettes

add_image_size( 'square', 300, 300 );
add_image_size( 'actus', 600, 200 );


// ajout du champs extrait sur les pages

function wpc_excerpt_pages() {
add_meta_box('postexcerpt', __('Extrait'), 'post_excerpt_meta_box', 'page', 'normal', 'core');
}
add_action( 'admin_menu', 'wpc_excerpt_pages' );
