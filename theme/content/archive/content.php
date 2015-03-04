<?php
/**
 * A template part for displaying an entry within an archive.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php tha_entry_before(); ?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php
	// Display a featured image if we can find something to display.
	get_the_image(
		array(
			'size'   => 'compass-full',
			'order'  => array( 'featured', 'attachment' ),
			'before' => '<div class="featured-media image">',
			'after'  => '</div>',
		)
	);
	?>

	<header class="entry-header">

		<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		<p class="entry-meta">
			<?php flagship_entry_author(); ?>
			<?php flagship_entry_published(); ?>
			<?php flagship_entry_comments_link(); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-summary' ); ?>>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( has_term( '', 'category' ) || has_term( '', 'post_tag' ) ) : ?>

		<footer class="entry-footer">
			<?php
			hybrid_post_terms(
				array(
					'taxonomy' => 'category',
					'before'   => '<p class="entry-meta categories">',
					'after'    => '</p>',
				)
			);
			hybrid_post_terms(
				array(
					'taxonomy' => 'post_tag',
					'before' => '<p class="entry-meta tags">',
					'after' => '</p>',
				)
			);
			?>
		</footer><!-- .entry-footer -->

	<?php endif; ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->

<?php
tha_entry_after();
