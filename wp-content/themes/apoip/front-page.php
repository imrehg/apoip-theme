<?php
/**
 * Front page template for the AP-OIP site
 *
 * @package apoip
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<?php if ( '' != $post->post_content ) : // only display if content not empty ?>

	<div class="content-wrapper">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .content-wrapper -->

	<?php endif; ?>

	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 999,
			'no_found_rows'  => true,
		) );
	?>

	<div id="quaternary" class="grid-area">
		<div class="grid-wrapper clear">

		<?php
			$category_slug = 'innovations';

			$args = array(
				'posts_per_page'   => 1,
				'offset'           => 0,
				'category_name'    => $category_slug,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_status'      => 'publish',
				);
			$category_posts = get_posts( $args );

			if (sizeof( $category_posts ) > 0) {
			   set_query_var( 'category_slug', $category_slug );
			   foreach ( $category_posts as $post ) : setup_postdata( $post ); ?>
			   	<div class="grid">
				     <?php get_template_part( 'content', 'stream' ); ?>
				</div><!-- .grid -->
			<?php endforeach;
			}

			wp_reset_postdata();
		?>

		<?php
			$category_slug = 'news';

			$args = array(
				'posts_per_page'   => 1,
				'offset'           => 0,
				'category_name'    => $category_slug,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_status'      => 'publish',
				);
			$category_posts = get_posts( $args );

			if (sizeof( $category_posts ) > 0) {
			   set_query_var( 'category_slug', $category_slug );
			   foreach ( $category_posts as $post ) : setup_postdata( $post ); ?>
			   	<div class="grid">
				     <?php get_template_part( 'content', 'stream' ); ?>
				</div><!-- .grid -->
			<?php endforeach;
			}

			wp_reset_postdata();
		?>

	<?php if ( $child_pages->have_posts() ) : ?>

			<?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

				<div class="grid">
					<?php get_template_part( 'content', 'grid' ); ?>
				</div><!-- .grid -->

			<?php endwhile; ?>


	<?php
		endif;
		wp_reset_postdata();
	?>

		</div><!-- .grid-wrapper -->
	</div><!-- #quaternary -->

<?php get_footer(); ?>