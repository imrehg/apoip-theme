<?php
/**
 * The template used for displaying latest post on the frontpage (front-page.php).
 *
 * @package apoip
 */
?>

<?php $category = get_category_by_slug( $category_slug ); ?>
<h1 class="stream-title"><a href="<?php echo get_category_link( $category ); ?> ">Latest <?php echo $category->name; ?></a></h1>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="post-thumbnail">
	<?php if ( has_post_thumbnail() ) {
	      the_post_thumbnail();
	     } else {
              echo  '<img src="' . get_stylesheet_directory_uri() . '/images/' . $category_slug . '.jpg">';
             }
        ?> 
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
