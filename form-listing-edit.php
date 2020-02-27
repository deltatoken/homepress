<?php
/**
 * Listing Edit Details Template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
?>

<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<!-- left block -->
			<div class="content_left">

				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted"><?php _e( 'Edit Your Ad', APP_TD ); ?></h1>

						<?php do_action( 'hmp-theme_notices' ); ?>

						<p><?php _e( 'Edit the fields below and click save to update your ad. Your changes will be updated instantly on the site.', APP_TD ); ?></p>

						<form name="mainform" id="mainform" class="form_edit" action="<?php echo hmp-theme_get_step_url(); ?>" method="post" enctype="multipart/form-data">
							<?php wp_nonce_field( $action ); ?>

							<ol>

							<?php
								if ( $form_fields ) {
									HMP_formbuilder( $form_fields, $listing );
								} else {
									HMP_show_default_form( $listing );
								}

								// check and make sure images are allowed
								if ( $HMP_options->ad_images ) {

									if ( hmp-theme_plupload_is_enabled() ) {
										hmp-theme_plupload_form( $listing->ID );
									} else {
										$images_count = HMP_get_ad_images( $listing->ID );
										// print out image upload fields. pass in count of images allowed
										HMP_ad_edit_image_input_fields( $images_count );
									}

								} else { ?>

									<div class="pad10"></div>
									<li>
										<div class="labelwrapper">
											<label><?php _e( 'Images:', APP_TD ); ?></label><?php _e( 'Sorry, image editing is not supported for this ad.', APP_TD ); ?>
										</div>
									</li>
									<div class="pad25"></div>

								<?php } ?>


								<p class="submit center">
									<input type="button" class="btn_orange" onclick="window.location.href='<?php echo HMP_DASHBOARD_URL; ?>'" value="<?php _e( 'Cancel', APP_TD ); ?>" />&nbsp;&nbsp;
									<input type="submit" class="btn_orange" value="<?php _e( 'Update Ad &raquo;', APP_TD ); ?>" name="update" />
								</p>

							</ol>

							<input type="hidden" name="action" value="<?php echo esc_attr( $action ); ?>" />
							<input type="hidden" name="ID" value="<?php echo esc_attr( $listing->ID ); ?>" />
						</form>

					</div><!-- /shadowblock -->

				</div><!-- /shadowblock_out -->

			</div><!-- /content_left -->

			<?php get_sidebar( 'user' ); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
