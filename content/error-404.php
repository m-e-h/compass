<?php
/**
 * A template to display when a 404 error occurs.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>
<article class="entry error-404 not-found">

	<?php tha_entry_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'compass' ); ?></h1>
	</header><!-- .page-header -->

	<div class="entry-content">

		<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'compass' ); ?></p>

		<?php get_search_form(); ?>

		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

		<?php
		// Translators: %1$s: smiley
		$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'compass' ), convert_smilies( ':)' ) ) . '</p>';
		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2> $archive_content" );
		?>

		<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

	</div><!-- .entry-content -->

	<?php tha_entry_bottom(); ?>

</article><!-- .error-404 -->
