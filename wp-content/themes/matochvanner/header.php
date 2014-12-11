<?php
/**
 * The Header for Theme Egenutgivare.
 * WordPress theme based on Reptilo which is based on Bootstrap 3.0.3, http://getbootstrap.com/
 *
 * @package WordPress
 * @subpackage Egenutgivare
 * @since 2014-01
 */
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

    <?php
    wp_nav_menu(array(
        'menu' => 'primary',
        'theme_location' => 'primary',
        'depth' => 2,
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new wp_bootstrap_navwalker())
    );
    ?>


    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column" id="ad1">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("banner")) : endif; ?>
        </div>
      </div>
      <div class="" id="spring-container">
        <div class="row clearfix">
          <div class="col-md-12 column">
            <div id="spring-header-container">
              <div class="row clearfix">
                <div class="col-md-9 column" id="logo">
                  <div class="content-box"><a href="<?php echo home_url('/'); ?>"><img alt="Mat och vänner" src="<?php echo get_stylesheet_directory_uri(); ?>/img/large_store_banner.jpg" /></a></div>
                </div>
                <div class="col-md-3 column " id="omslag-box">
                  <?php
                  global $omslag;
                  if (method_exists($omslag, 'printOmslag'))
                    $omslag->printOmslag();
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
