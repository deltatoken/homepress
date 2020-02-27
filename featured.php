<?php
/**
 * Featured ads slider template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @@since   HomePress 1.0
 */

global $HMP_options;
?>

<?php if ( $HMP_options->enable_featured ) : ?>

	<script>
		/* featured listings slider */
		jQuery(document).ready(function($) {
			$('div.slider').jCarouselLite({
				btnNext: '.next',
				btnPrev: '.prev',
				autoWidth: true,
				responsive: true,
				pause: true,
				auto: true,
				timeout: 2800,
				speed: 800,
				init: function() {
					$('div.slider').fadeIn();
				},
				easing: 'easeOutQuint' // for different types of easing, see easing.js
			});
		});
	</script>

	<?php hmp-theme_before_loop( 'featured' ); ?>

	<?php if ( $featured = HMP_get_featured_slider_ads() ) : ?>

		<!-- featured listings -->
		<div class="shadowblock_out slider_top">

			<div class="shadowblock sliderblock">

				<h2 class="dotted"><?php _e( 'Featured Listings', APP_TD ); ?></h2>

				<div class="sliderwrap">

					<div class="dashicons-before prev"></div>
					<div class="dashicons-before next"></div>

					<div class="slider">

						<ul>

							<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

								<?php hmp-theme_before_post( 'featured' ); ?>

								<?php get_template_part( 'content-slider', get_post_type() ); ?>

								<?php hmp-theme_after_post( 'featured' ); ?>

							<?php endwhile; ?>

							<?php hmp-theme_after_endwhile( 'featured' ); ?>

						</ul>

					</div><!-- /slider -->

				</div><!-- /sliderwrap -->

			</div><!-- /sliderblock -->

		</div><!-- /shadowblock_out -->

	<?php endif; ?>

	<?php hmp-theme_after_loop( 'featured' ); ?>

	<?php wp_reset_postdata(); ?>

<?php endif; // end feature ad slider check ?>
