<?php get_header(); ?>
<div class="row clearfix">
  <div class="col-md-6 column">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
        //loop ingredients
        if (have_rows('ingredienser')):
          $ingredienser = '<ul class="mv-recipe-ingedients">';
          while (have_rows('ingredienser')) : the_row();
            $ing = get_sub_field('ingrediens');
            $ingredienser .= '<li><span itemprop="ingredients">' . $ing . '</span></li>';
          endwhile;
          $ingredienser .= '</ul>';
        endif;
        ?>
        <div class="row">
          <div class="col-md-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class('mv-recipe'); ?> itemscope itemtype="http://schema.org/Recipe">
              <h1 itemprop="name"><?php the_title(); ?></h1>
              <div class="mv-recipe-yield" itemprop="recipeYield">Antal personer: <?php echo get_field('nummer'); ?> pers</div>
              <div class="mv-recipe-description" itemprop="description"><?php echo get_field('description'); ?></div>
              <img class="mv-recipe-img" itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" />
              <h2 class="mv-recipe-ingedients-head">Ingredienser</h2>
              <?php echo $ingredienser; ?>
              <div class="mv-recipe-instructions" itemprop="recipeInstructions"><?php echo get_field('instruktioner'); ?></div>
              <?php if (get_field('author')): ?>
                <div class="mv-recipe-author" >Receptförfattare: <span itemprop="author"><?php the_field('author'); ?></span></div>
              <?php endif; ?>
              <?php comments_template(); ?>
            </article>
          </div>  
        </div>  
        <?php $print = false;
        include 'snippets/related_posts.php'; ?>
        <?php
      endwhile;
    endif;
    ?>
    <div class="row">
      <div class="col-md-12">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("ad-post-loop")) : endif; ?>
      </div>  
    </div>      
    <div>
<?php echo $out; ?>
    </div>
  </div>  
  <?php include('sidebar1.php'); ?>
<?php include('sidebar2.php'); ?>
</div>
<?php get_footer(); ?>