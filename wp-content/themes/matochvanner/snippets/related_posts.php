<?php

/**
 * requires ACF repeater
 * if a variable print is passed and set to false, then the output will be held in the variable $out
 */
if ($print === null) {
  $print = true;
}
$out = '';
$nbrTitle = 40;
$nbrExerpt = 42;
if (have_rows('relaterat')):
  $out = 'Relaterat innehåll';
  while (have_rows('relaterat')) : the_row();
    $id = get_sub_field('inlagg');
    $rel_post = get_post($id);

    $exerpt = mb_substr($rel_post->post_content, 0, $nbrExerpt) . '...';
    $title = $rel_post->post_title;
    if (mb_strlen($title) > $nbrTitle) {
      $title = mb_substr(get_the_title(), 0, $nbrTitle) . '...';
    }
    $permalink = get_permalink($id);
    $img = '';
    if (has_post_thumbnail($id)) {
      $img = get_the_post_thumbnail($id, 'thumbnail');
    }
    $out .= <<<OUT
  <div class="cat-puff">
    <a href="$permalink">$img</a>
    <a href="$permalink"><h3>$title</h3></a>
    <p>$exerpt</o>
  </div>
  <div class="clearfix"></div>
OUT;
  endwhile;
endif;
if ($print) {
  echo $out;
} 
