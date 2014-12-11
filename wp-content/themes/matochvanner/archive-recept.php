<?php
get_header();
?>
<div class="row clearfix" >
  <div class="col-md-6 column">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="row">
          <div class="col-md-12">
          <article id="post-<?php the_ID(); ?>" <?php post_class('content-box mv-recipe'); ?> itemscope itemtype="http://schema.org/Recipe">
            <header>
              <a href="<?php the_permalink(); ?>" ><img class="mv-recipe-img" itemprop="image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" /></a>
              <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="mv-recipe-description" itemprop="description"><?php echo get_field('description'); ?>
              <a href="<?php echo get_permalink(); ?>"><span class="read-more">Läs mer <i class="fa fa-angle-double-right"></i></span></a>
            </div>
          </article>
          </div>
        </div>
      <?php endwhile; ?>
      <?php
      if (function_exists('bootstrap3_pagination')) {
        bootstrap3_pagination();
      }
      ?>        
    <?php endif; ?>
  </div>
<div class="row clearfix">
  <?php include('sidebar1.php'); ?>
  <?php include('sidebar2.php'); ?>
</div>
</div>
<?php get_footer(); ?>