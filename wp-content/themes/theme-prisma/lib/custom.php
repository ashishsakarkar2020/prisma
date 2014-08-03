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

// commentaires

add_filter('comments_open', 'wpc_comments_closed', 10, 2);

function wpc_comments_closed( $open, $post_id ) {
$post = get_post( $post_id );
if ('post' == $post->post_type)
$open = false;
return $open;
}

//pagination

/** Fonction pour la pagination **/
  function pagination( $query) {
    // Nombre d'elements a afficher avant et après la page courante
    $NB_TO_DISPLAY = 4;
  
    $baseURL = "http://".$_SERVER['HTTP_HOST'];
    if($_SERVER['REQUEST_URI'] != "/"){
      $baseURL = $baseURL.$_SERVER['REQUEST_URI'];
    }
    
    // Suppression de '/page' de l'URL
    $sep = strrpos($baseURL, '/page/');
    if($sep != FALSE){
      $baseURL = substr($baseURL, 0, $sep);
    }
    
    // Suppression des parametres de l'URL
    $sep = strrpos($baseURL, '?');
    if($sep != FALSE){
      // On supprime le caractere avant qui est un '/' 
      $baseURL = substr($baseURL, 0, ($sep-1));
    }
    
    // Recuperation des parametres pour les re-afficher dans les liens
    $qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
    $hasQs = false;
    
    if($qs != "")
      $hasQs = true;
  
    $page = $query->query_vars["paged"];
    if ( !$page ){
      $page = 1;
    }
  
    // Generation et affichage uniquement si il y a plusieurs pages
    if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
      // Calcul des pages a afficher
      $minPage = $page - $NB_TO_DISPLAY;
      if($minPage <= 0){
        $minPage = 1;
      }
      $maxPage = $minPage + ($NB_TO_DISPLAY * 2);
      if($maxPage > $query->max_num_pages){
        $maxPage = $query->max_num_pages;
      }
  
      $html =  '<ul class="pagination">';
      //$html .= "<li>Page ".$page." sur ".$query->max_num_pages."</li>";
  
      if($page > 1){
        $previous = $page -1;
        $html .= "<li><a href='".$baseURL."page/".$previous;
        if($hasQs)
          $html .= $qs;
        $html .= "'>&laquo;</a></li>";
      } 
      if($minPage > 1){
                $html .= "<li><a href='".$baseURL."page/1";
                if($hasQs)
                  $html .= $qs;
                $html .= "'>1</a></li>";
      }
      if($minPage > 2){      
                      $html .= "<li>...</li>";
                    } 
  
      // Boucle dans les pages
      for ( $i=$minPage; $i <= $maxPage; $i++ ) {
        // Detection de la page active dans la liste des liens
        if ( $i == $page ) {
          $html .= '<li class="active"><a href="'.$baseURL.'page/'.$i;
          if($hasQs)
            $html .= $qs;
          $html .= '">'.$i.'</a></li>';
        } else {
          $html .= '<li><a href="'.$baseURL.'page/'.$i;
          if($hasQs)
            $html .= $qs;
          $html .= '">'.$i.'</a></li>';
        }
      }

      if($maxPage < $query->max_num_pages){
              if($maxPage < $query->max_num_pages -1)
                $html .= "<li>...</li>";
        $html .= '<li><a href="'.$baseURL.'page/'.$query->max_num_pages;
        if($hasQs)
          $html .= $qs;
        $html .='">'.$query->max_num_pages.'</a></li>';
      }        
      if($page < $query->max_num_pages){
        $html .= '<li><a href="'.$baseURL.'page/'.($page+1);
        if($hasQs)
          $html .= $qs;
        $html .= '">&raquo;</a></li>';
      }
      $html .= '</ul>';
  
      // Affichage de la liste des liens
          echo $html;
    }
  }



//menus

add_action( 'init', 'register_prisma_menus' );

// Tailles des vignettes

add_image_size( 'square', 300, 300, true );
add_image_size( 'actus', 600, 200, true );

// Change Posts name

function edit_admin_menus() {
    global $menu;
  
  $menu[5][0] = 'Actualités'; 
}
add_action( 'admin_menu', 'edit_admin_menus' );


// ajout du champs extrait sur les pages

function wpc_excerpt_pages() {
add_meta_box('postexcerpt', __('Extrait'), 'post_excerpt_meta_box', 'page', 'normal', 'core');
}
add_action( 'admin_menu', 'wpc_excerpt_pages' );

/**
 * Dimox Breadcrumbs
 * http://dimox.net/wordpress-breadcrumbs-without-a-plugin/
 * Since ver 1.0
 * Add this to any template file by calling dimox_breadcrumbs()
 * Changes: MC added taxonomy support
 */
function dimox_breadcrumbs(){
  /* === OPTIONS === */
  $text['home']     = 'Accueil'; // text for the 'Home' link
  $text['category'] = '"%s"'; // text for a category page
  $text['tax']    = '"%s"'; // text for a taxonomy page
  $text['search']   = 'Résultats pour "%s"'; // text for a search results page
  $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
  $text['author']   = 'Articles Posted by %s'; // text for an author page
  $text['404']      = 'Error 404'; // text for the 404 page
 
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter   = ''; // delimiter between crumbs
  $before      = '<li class="active">'; // tag before the current crumb
  $after       = '</li>'; // tag after the current crumb
  /* === END OF OPTIONS === */
 
  global $post;
  $homeLink = get_bloginfo('url') . '/';
  $linkBefore = '<li typeof="v:Breadcrumb">';
  $linkAfter = '</li>';
  $linkAttr = ' rel="v:url" property="v:title"';
  $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<ol class="breadcrumb"><li><a href="' . $homeLink . '">' . $text['home'] . '</a></li></ol>';
 
  } else {
 
    echo '<ol class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
 
    
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) {
        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
      }
      echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
    } elseif( is_tax() ){
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) {
        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
      }
      echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
    
    }elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;
 
    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $delimiter);
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      $cats = get_category_parents($cat, TRUE, $delimiter);
      $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
      $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
      echo $cats;
      printf($link, get_permalink($parent), $parent->post_title);
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo $delimiter;
      }
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ol>';
 
  }
} // end dimox_breadcrumbs()

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
  else 
               return false;  // we're elsewhere
};
