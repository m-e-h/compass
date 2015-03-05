<?php
/**
 * Footer Widgets Sidebar Template
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>
<div <?php hybrid_attr( sprintf( 'footer-widgets-%d', $counter ) ); ?>>

	<?php if ( is_active_sidebar( sprintf( 'footer-%d', $counter ) ) ) : ?>

		<?php dynamic_sidebar( sprintf( 'footer-%d', $counter ) ); ?>

	<?php endif; ?>

</div><!-- .footer-widgets-<?php echo intval( $counter ); ?> -->
