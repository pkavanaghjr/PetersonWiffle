<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full Width
 *
 * @package Rookie
 */

get_header(); 

$commissioner_tags = get_the_terms(get_the_id(), 'commissioner_tags');
$commissioner_string = '';
foreach($commissioner_tags as $c_tag):
	$commissioner_string .= ' ' . $c_tag->slug;
endforeach;

?>

	<div id="primary" class="content-area content-area-full-width <?php echo $commissioner_string; ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				if ( in_array( get_post_type(), array( 'sp_player', 'sp_staff', 'sp_team' ) ) ) {
					get_template_part( 'content', 'nothumb' );
				} else {
					get_template_part( 'content', 'page' );
				}
				?>

			<?php endwhile; // end of the loop. ?>


			<?php 
				/**
				 * FLEXIBLE CONTENT
				 */
				include('blocks/index--flexibleContent.php'); 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
