<?php
get_header();
if (is_single()) {
  $hidePagnination = true;
}
$categories = get_the_category();
$bloggParentCatIds = array(133);  //hardcoded categories - uggly hack this one! 
if (is_single() && check_category_family($categories, $bloggParentCatIds)) {
  $mainWidth = 'col-md-6';
  $sidebarWidth = 'col-md-3';
  $blogg = true;
  $curauthID = get_the_author_meta('ID');
} else {
  $mainWidth = 'col-md-6';
  $sidebarWidth = 'col-md-3';
  $blogg = false;
}
?>
<div class="row clearfix">
  <div class="<?php echo $mainWidth; ?> column">
    <?php if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <div class="row">
          <div class="col-md-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class('content-box'); ?>>
              <h1><?php the_title(); ?></h1>
              <span class="article-cat"><?php
                $showCat = true;
                include('snippets/pubinfo.php');
                ?></span>
              <?php //the_post_thumbnail('medium'); ?>
              <?php the_content(); ?>
              <?php include 'snippets/byline.php'; ?>
              <?php comments_template(); ?>
            </article>
          </div>  
        </div>  
            <?php $print = false; include 'snippets/related_posts.php'; ?>
        <?php
      endwhile;
    endif;
    ?>

    <div class="content-box">
      relaterade
      <?php  echo $out; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("ad-post-loop")) : endif; ?>
      </div>  
    </div>   


  </div>
  <?php if (!$blogg): ?>    
    <?php include('sidebar1.php'); ?>
    <?php include('sidebar2.php'); ?>
  <?php else: ?>
    <?php include('sidebar1.php'); ?>
    <?php include('sidebar2.php'); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>