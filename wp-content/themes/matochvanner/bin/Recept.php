<?php

/**
 * This is the Recept.
 * To use it you just have to include this php-file in the functions.php
 */
$recept = new Recept;

/**
 * The recept is output code is in this format:  http://www.schema.org/Recipe 
 * 1. It adds a custom posttype
 * 2. Add featured image to them
 * 3. Use the Call it like this
 * <?php global $recept; if (method_exists($recept,'printRecept')) $recept->printRecept(); ?>
 * 
 * Author: Kristian Erendi 
 * URI: http://reptilo.se 
 * Date: 2014-11-19 
 */
class Recept {

  function __construct() {
    add_action('init', array($this, 'create_post_type'));
    add_action('init', array($this, 'create_taxonomy'));
  }

  /**
   * Crate posttype
   */
  function create_post_type() {
  $labels = array(
      'name' => 'Recept',
      'singular_name' => 'Recept',
      'add_new' => 'Lägg till nytt recept',
      'add_new_item' => 'Lägg till ett nytt recept',
      'edit_item' => 'Redigera recept',
      'new_item' => 'Nytt recept',
      'all_items' => 'Alla recept',
      'view_item' => 'Visa recept',
      'search_items' => 'Sök recept',
      'not_found' => 'Inga recept hittades',
      'not_found_in_trash' => 'Inga recept hittade i soptunnan',
      'parent_item_colon' => '',
      'menu_name' => 'Recept'
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'recept'),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
      'taxonomies' => array('post_tag')
  );
  register_post_type('recept', $args);
}




/**
 *  Add a new taxonomy for post type  "Fyndhyllan" make it hierarchical (like categories)
 */
function create_taxonomy() {
  $labels = array(
      'name' => _x('Receptkategori', 'taxonomy general name'),
      'singular_name' => _x('Receptkategori', 'taxonomy singular name'),
      'search_items' => __('Sök receptkategorier'),
      'all_items' => __('Alla receptkategorier'),
      'parent_item' => __('Receptkategorier förälder'),
      'parent_item_colon' => __('Recepkategorier förälder:'),
      'edit_item' => __('Redigera receptkategorier'),
      'update_item' => __('Uppdatera receptkategori'),
      'add_new_item' => __('Lägg till ny receptkategori'),
      'new_item_name' => __('Ny receptkategori namn'),
      'menu_name' => __('Recept kategorier')
  );

  $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_tagcloud' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'receptkategorier'),
      'capabilities' => array(
          'manage_terms' => 'manage_options', //by default only admin
          'edit_terms' => 'manage_options',
          'delete_terms' => 'manage_options',
          'assign_terms' => 'edit_posts'  // means administrator', 'editor', 'author', 'contributor'
      )
  );
  register_taxonomy('receptkategori', array('recept'), $args);
}




  function printRecept($posttype = 'recept', $nbr = 1) {
    global $post;
    $args = array('post_type' => $posttype, 'posts_per_page' => $nbr);
    $loop = new WP_Query($args);
    if ($loop->have_posts()):
      while ($loop->have_posts()) : $loop->the_post();
        $id = $post->ID;
        //$img = get_the_post_thumbnail($id, array(90,115));
        //$img = get_the_post_thumbnail($id, array(90, 'auto'));
        $img = get_the_post_thumbnail($id);
        $nummer = get_field('nummer');
        $instruktioner = get_field('instruktioner');
        $out .= <<<OUT
                $img               
                <div itemscope itemtype="http://schema.org/Recipe">
                  <span itemprop="name">Rubrik för receptet</span>
                  <img itemprop="image" src="Matbild.jpg" />
                  <span itemprop="description">Kort beskrivning</span>
                  <span itemprop="recipeYield">$nummer pers</span>
                  <ul class="omslag-list">    
                    <li><span itemprop="ingredients">1 dl ingredienser (repeteras)</span></li>
                    <li><span itemprop="ingredients">1 dl ingredienser (repeteras)</span></li>
                  </ul>    
                <span itemprop="recipeInstructions">$instruktioner</span>
                </div>
OUT;


      endwhile;
    endif;
    wp_reset_query();
    echo $out;
  }

}


