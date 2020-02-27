<?php
/**
 * Author Sidebar template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */
?>

<!-- right block -->
<div class="content_right">

	<?php hmp-theme_before_sidebar_widgets( 'author' ); ?>

	<?php if ( ! dynamic_sidebar( 'sidebar_author' ) ) : ?>

	<!-- no dynamic sidebar so don't do anything -->

	<?php endif; ?>

	<?php hmp-theme_after_sidebar_widgets( 'author' ); ?>

</div><!-- /content_right -->
