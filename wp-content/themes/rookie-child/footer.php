<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rookie
 */
$options = get_option( 'themeboy', array() );
if ( array_key_exists( 'logo_url', $options ) && ! empty( $options['logo_url'] ) ) {
  $logo = $options['logo_url'];
  $logo = esc_url( $logo );
}
?>

    </div><!-- .content-wrapper -->
  </div><!-- #content -->

  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-wrapper">
      <div class="footer-area">
        <div class="footer-inner">
          <div id="quaternary" class="footer-widgets" role="complementary">
            <?php for ( $i = 1; $i <= 3; $i++ ) { ?>
              <div class="footer-widget-region"><?php dynamic_sidebar( sprintf( 'footer-%d', $i ) ); ?></div>
            <?php } ?>
          </div>
        </div><!-- .footer-inner -->
      </div><!-- .footer-area -->
    </div><!-- .footer-wrapper -->
  </footer><!-- #colophon -->
</div><!-- #page -->

<div class="site-info">
  <div class="info-wrapper">
    <div class="info-area">
      <div class="info-inner">
        <?php rookie_footer(); ?>
      </div><!-- .info-inner -->
    </div><!-- .info-area -->
  </div><!-- .info-wrapper -->
</div><!-- .site-info -->

<?php wp_footer(); ?>


<!-- SCRIPTS - VENDOR -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.fireworks.js'; ?>"></script>
<!-- SCRIPTS - CUSTOM -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/assets/js/wiffle.js'; ?>"></script>


</body>
</html>
