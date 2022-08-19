<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rookie
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>


  <link href="<?php echo get_stylesheet_directory_uri() . '/assets/fontawesome/css/all.css' ?>" rel="stylesheet">


<!-- START: Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71874838-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-71874838-5');
</script>
<!-- End: Google Analytics -->

</head>

<body <?php body_class(); ?>>
<div class="sp-header"><?php do_action( 'sportspress_header' ); ?></div>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rookie' ); ?></a>

  <header id="masthead" class="site-header" role="banner">
    <div class="header-wrapper">
      <?php rookie_header_area(); ?>
    </div><!-- .header-wrapper -->
  </header><!-- #masthead -->

  <div id="content" class="site-content">
    <div class="content-wrapper">
      <?php do_action( 'rookie_before_template' ); ?>
