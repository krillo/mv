<?php
/**
 * Template Name: Förstasidan
 * @author Kristain Erendi reptilo.se
 */
//get_header();
?>
<?php get_header(); ?>
<div class="row clearfix">
  <div class="col-md-6 column">
    <?php include 'snippets/mainloop.php'; ?>
  </div>       

  <?php include('sidebar1.php'); ?>
  <?php include('sidebar2.php'); ?>

</div>

<?php get_footer(); ?>