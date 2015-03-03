<?php
/**
 * The template used for displaying featured page content in page-templates/front-page.php
 *
 * @package Edin
 */
?>

<h1 class="stream-title">&nbsp;</h1>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="post-thumbnail">
	<?php the_post_thumbnail(); ?>
	</a>

	<?php the_title( sprintf( '<header class="entry-header"><h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1></header>' ); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<p><a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark">
			<?php
				/* translators: %s: Name of page */
				printf( __( 'Read more %s', 'edin' ), the_title( '<span class="screen-reader-text">', '</span>', false ) );
			?>
		</a></p>
	</div><!-- .entry-summary -->

	<?php edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
