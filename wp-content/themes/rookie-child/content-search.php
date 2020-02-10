<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rookie
 */


$postType = get_post_type_object( get_post_type( get_the_id() ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php rookie_entry_meta(); ?>
			<?php rookie_entry_date(); ?>
		<?php endif; ?>
		
		<?php the_title( sprintf( '<h1 class="article-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<div style="margin:-25px 0 20px; opacity:0.7; font-style:italic; font-size:14px;"><?php echo esc_html($postType->labels->singular_name); ?></div>
	</header><!-- .article-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php rookie_entry_footer(); ?>
</article><!-- #post-## -->

<hr>
