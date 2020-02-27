<?php
/**
 * Generic Footer template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */

global $HMP_options;
?>

<div class="footer">

	<div class="footer_menu">

		<div class="footer_menu_res">

			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_id' => 'footer-nav-menu', 'depth' => 1, 'fallback_cb' => false ) ); ?>

			<div class="clr"></div>

		</div><!-- /footer_menu_res -->

	</div><!-- /footer_menu -->

	<div class="footer_main">

		<div class="footer_main_res">

			<div class="dotted">

					<?php if ( ! dynamic_sidebar( 'sidebar_footer' ) ) : ?> <!-- no dynamic sidebar so don't do anything --> <?php endif; ?>

					<div class="clr"></div>

			</div><!-- /dotted -->

			<p>&copy; <?php echo date_i18n( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All Rights Reserved.', APP_TD ); ?></p>

			<?php if ( $HMP_options->twitter_username ) : ?>
					<a href="https://twitter.com/<?php echo $HMP_options->twitter_username; ?>" class="dashicons-before twit" target="_blank" title="<?php esc_attr_e( 'Twitter', APP_TD ); ?>"></a>
			<?php endif; ?>

			<div class="right">
				<p><a href="https://www.hmp-theme.com/themes/homepress/" target="_blank" rel="nofollow">homepress Theme</a> - <?php _e( 'Powered by', APP_TD ); ?> <a href="https://wordpress.org/" target="_blank" rel="nofollow">WordPress</a></p>
			</div>

			<?php HMP_website_current_time(); ?>

			<div class="clr"></div>

		</div><!-- /footer_main_res -->

	</div><!-- /footer_main -->

</div><!-- /footer -->
