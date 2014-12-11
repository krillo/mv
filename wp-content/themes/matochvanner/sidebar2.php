<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-md-3 column" id="sidebar2">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar2")) : endif; ?>  

  


  <div class="catlist-wrapper"><div class="sidebar-header"><i class="fa fa-caret-right"></i>Populära recept</div>
    <div class="cat-puff">
      
      <?php
        //loop slideobjects
        if (have_rows('slideobjects')):
          echo 'apa';
          while (have_rows('slideobjects')) : the_row();
            $slideObj = get_sub_field('slideobj');
            print_r($slideObj);
          endwhile;
          
        endif;
        ?>
      
    </div>
    <div class="clearfix"></div>
    <div class="devider-space"></div>
  </div>



  <?php global $rc;
  if (method_exists($rc, 'rep_carousel')) $rc->rep_carousel('rep-carousel', false); ?>  

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar22")) : endif; ?>  
  <div class="catlist-wrapper"><?php $category_name = 'prylar';
$nbr = 5;
include 'snippets/catlist.php'; ?></div>
  <div class="clearfix"></div>  
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar23")) : endif; ?>  

</div>