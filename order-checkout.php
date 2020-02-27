<?php
/**
 * Order Checkout template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */
?>

<?php
$order = get_order();
if (  $order && hmp-theme_ORDER_PENDING == $order->get_status() && get_query_var('bt_end') ) {
	hmp-theme_load_template( 'order-summary.php' );
	return;
}
?>

<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<div id="breadcrumb"><?php HMP_breadcrumb(); ?></div>

			<div class="shadowblock_out">

				<div class="shadowblock">

					<?php hmp-theme_display_form_progress(); ?>

					<div class="post">

						<?php if ( ! empty( $gateway ) ) : ?>

							<h2 class="single dotted"><?php echo sprintf( __( 'Pay with %s', APP_TD ), $gateway ); ?></h2>

						<?php endif; ?>

						<div class="order-gateway">

							<?php
								process_the_order();

								// Retrieve updated order object
								$order = get_order();

								if ( in_array( $order->get_status(), array( hmp-theme_ORDER_COMPLETED, hmp-theme_ORDER_ACTIVATED ) ) ) {
									$redirect_to = get_post_meta( $order->get_id(), 'complete_url', true );
									echo html( 'a', array( 'href' => $redirect_to ), __( 'Continue', APP_TD ) );
									echo html( 'script', 'location.href="' . $redirect_to . '"' );
								}
							?>

						</div>

					</div><!--/post-->

				</div><!-- /shadowblock -->

			</div><!-- /shadowblock_out -->

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
