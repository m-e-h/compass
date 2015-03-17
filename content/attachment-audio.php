<?php
/**
 * A template part for displaying an entry in both single and archive posts.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php if ( is_attachment() ) : // If viewing a single attachment. ?>

	<article <?php hybrid_attr( 'post' ); ?>>

		<?php hybrid_attachment(); // Function for handling non-image attachments. ?>

		<?php get_template_part( 'content/parts/single', 'header' ); ?>

		<?php get_template_part( 'content/parts/single', 'content' ); ?>

		<footer class="entry-footer">
			<p class="entry-meta">
				<?php flagship_entry_published(); ?>
				<?php edit_post_link(); ?>
			</p>
		</footer><!-- .entry-footer -->

	</article><!-- .entry -->

	<div class="attachment-meta">

		<div class="media-info">

			<h3><?php _e( 'Audio Info', 'compass' ); ?></h3>

			<?php hybrid_media_meta(); ?>

		</div><!-- .media-info -->

	</div><!-- .attachment-meta -->

<?php else : // If not viewing a single attachment. ?>

	<article <?php hybrid_attr( 'post' ); ?>>

		<?php get_the_image( array( 'size' => 'compass-full', 'order' => array( 'featured', 'attachment' ) ) ); ?>

		<?php get_template_part( 'content/parts/archive', 'header' ); ?>

		<?php get_template_part( 'content/parts/archive', 'content' ); ?>

	</article><!-- .entry -->

<?php endif; // End single attachment check. ?>
