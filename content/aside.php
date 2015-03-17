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
<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<?php get_template_part( 'content/parts/single', 'header' ); ?>

		<?php get_template_part( 'content/parts/single', 'content' ); ?>

		<?php get_template_part( 'content/parts/single', 'footer' ); ?>

    <?php else : // If not viewing a single post. ?>

		<?php get_template_part( 'content/parts/single', 'content' ); ?>

		<?php endif; // End single post check. ?>

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
