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
add_action( 'init', 'register_prisma_menus' );