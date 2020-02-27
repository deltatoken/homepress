<?php
/**
 * Page Sidebar template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */
?>

<!-- right block -->
<div class="content_right">

	<?php hmp-theme_before_sidebar_widgets( 'page' ); ?>

	<?php if ( ! dynamic_sidebar( 'sidebar_page' ) ) : ?>

		<!-- no dynamic sidebar setup -->

		<div class="shadowblock_out">

			<div class="shadowblock">

				<h2 class="dotted"><?php _e( 'Meta', APP_TD ); ?></h2>

					<ul>

						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="https://www.hmp-theme.com/" title="Premium WordPress Themes">hmp-theme</a></li>
						<li><a href="https://wordpress.org/" title="Powered by WordPress">WordPress</a></li>
						<?php wp_meta(); ?>

					</ul>

				<div class="clr"></div>

			</div><!-- /shadowblock -->

		</div><!-- /shadowblock_out -->

	<?php endif; ?>

	<?php hmp-theme_after_sidebar_widgets( 'page' ); ?>

</div><!-- /content_right -->
