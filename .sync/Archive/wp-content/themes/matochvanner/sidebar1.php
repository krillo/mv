<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-md-3 column" id="sidebar1">
  <?php
  global $spp;
  if (method_exists($spp, 'printPrenpuff')) {
    $spp->printPrenpuff();
  }
  ?>
  <div class="clearfix"></div>
  <?php include 'snippets/blogpuffs.php'; ?>   
  <div class="clearfix"></div>
  <div>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar1")) : endif; ?>
  </div>
  <div class="clearfix"></div>
  <?php include 'snippets/socialtabs.php'; ?>   
  <div>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar11")) : endif; ?>
  </div>
  <div class="clearfix"></div>
  <?php include 'snippets/instagram.php'; ?> 
  <div class="devider-space"></div>
  <div class="clearfix"></div>
</div>