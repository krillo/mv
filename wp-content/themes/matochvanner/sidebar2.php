<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-md-3 column" id="sidebar2">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar2")) : endif; ?>  
  
  Populära recept
  <?php global $rc; if (method_exists($rc,'rep_carousel')) $rc->rep_carousel('rep-carousel', false); ?>  
  
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar22")) : endif; ?>  
  <?php $category_name = 'prylar'; $nbr = 5; include 'snippets/catlist.php'; ?>   
  <div class="clearfix"></div>  
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar23")) : endif; ?>  
  
</div>