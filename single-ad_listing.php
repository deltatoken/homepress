<?php
/**
 * The Template for displaying all single ads.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @@since   HomePress 1.0
 */
?>


<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<div id="breadcrumb"><?php HMP_breadcrumb(); ?></div>

			<div class="clr"></div>

			<div class="content_left">

				<?php do_action( 'hmp-theme_notices' ); ?>

				<?php hmp-theme_before_loop(); ?>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php hmp-theme_before_post(); ?>

						<?php hmp-theme_stats_update( $post->ID ); //records the page hit ?>

						<div class="shadowblock_out <?php HMP_display_style( 'featured' ); ?>">

							<div class="shadowblock">

								<?php hmp-theme_before_post_title(); ?>

								<h1 class="single-listing"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

								<div class="clr"></div>

								<?php hmp-theme_after_post_title(); ?>

								<div class="pad5 dotted"></div>

								<div class="bigright <?php HMP_display_style( 'ad_single_images' ); ?>">

									<ul>

									<?php
										// grab the category id for the functions below
										$cat_id = hmp-theme_get_custom_taxonomy( $post->ID, APP_TAX_CAT, 'term_id' );

										if ( get_post_meta( $post->ID, 'HMP_ad_sold', true ) === 'yes' ):
									?>
											<li id="HMP_sold"><span><?php _e( 'This item has been sold', APP_TD ); ?></span></li>
									<?php
										endif;

										// 3.0+ display the custom fields instead (but not text areas)
										HMP_get_ad_details( $post->ID, $cat_id );
									?>

										<li id="HMP_listed"><span><?php _e( 'Listed:', APP_TD ); ?></span> <?php echo hmp-theme_display_date( $post->post_date ); ?></li>
									<?php if ( $expire_date = get_post_meta( $post->ID, 'HMP_sys_expire_date', true ) ): ?>
										<li id="HMP_expires"><span><?php _e( 'Expires:', APP_TD ); ?></span> <?php echo HMP_timeleft( $expire_date ); ?></li>
									<?php endif; ?>

									</ul>

								</div><!-- /bigright -->


								<?php if ( $HMP_options->ad_images ): ?>

									<div class="bigleft">

										<div id="main-pic">

											<?php HMP_get_image_url(); ?>

											<div class="clr"></div>

										</div>

										<div id="thumbs-pic">

											<?php HMP_get_image_url_single( $post->ID, 'thumbnail', $post->post_title, -1 ); ?>

											<div class="clr"></div>

										</div>

									</div><!-- /bigleft -->

								<?php endif; ?>

								<div class="clr"></div>

								<?php hmp-theme_before_post_content(); ?>

								<div class="single-main">

									<?php
										// 3.0+ display text areas in content area before content.
										HMP_get_ad_details( $post->ID, $cat_id, 'content' );
									?>

									<h3 class="description-area"><?php _e( 'Description', APP_TD ); ?></h3>

									<?php the_content(); ?>

								</div>

								<?php hmp-theme_after_post_content(); ?>

							</div><!-- /shadowblock -->

						</div><!-- /shadowblock_out -->

						<?php hmp-theme_after_post(); ?>

					<?php endwhile; ?>

					<?php hmp-theme_after_endwhile(); ?>

				<?php else: ?>

					<?php hmp-theme_loop_else(); ?>

				<?php endif; ?>

				<div class="clr"></div>

				<?php hmp-theme_after_loop(); ?>

				<?php wp_reset_query(); ?>

				<?php comments_template( '/comments-realty_listing.php' ); ?>

			</div><!-- /content_left -->

			<?php get_sidebar( 'ad' ); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
