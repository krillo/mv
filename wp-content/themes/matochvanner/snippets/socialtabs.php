<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
  jQuery(document).ready(function($) {
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);

    function checkWidth() {
      var windowsize = $window.width();
      var fbWidth = 0;
      if (windowsize > 1199) {
        fbWidth = 247;
      }
      if (windowsize > 992 && windowsize < 1199) {
        fbWidth = 197;
      }
      if (windowsize > 768 && windowsize < 992) {
        fbWidth = 142;
      }
      if (windowsize <= 320) {
        fbWidth = 228;
      }
      
      //alert(windowsize +' , '+ fbWidth);
      //$('.fb-like-box').prop('data-width', fbWidth + 'px');
      $('#facebook-tab').html('<div class="fb-like-box" data-href="https://www.facebook.com/matvanner" data-width="'+ fbWidth +'px" data-height="540" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>');
    }

    // Execute on load
    checkWidth();
  });</script>  


<!-- tabs -->
<div id="social-tab">
  <div class="tabbable">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#facebook-tab" data-toggle="tab">Facebook</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="facebook-tab">
        <!-- Facebook iframe -->
        <!--div class="fb-like-box" data-href="https://www.facebook.com/matvanner" data-width="197px" data-height="540" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div-->
        <!-- Facebook iframe end -->
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<!-- /tabs --> 
