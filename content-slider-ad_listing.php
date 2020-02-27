<?php
/**
 * Slider Listings loop content.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
global $HMP_options;
?>

<li>

	<div class="slide-item">
		<span class="feat_left">

			<?php if ( $HMP_options->ad_images ) HMP_ad_featured_thumbnail(); ?>

		</span>

		<?php hmp-theme_before_post_title( 'featured' ); ?>

		<p><a href="<?php the_permalink(); ?>"><?php if ( mb_strlen( get_the_title() ) >= $HMP_options->featured_trim ) echo mb_substr( get_the_title(), 0, $HMP_options->featured_trim ) . '...'; else the_title(); ?></a></p>

		<span class="price_sm muted"><?php HMP_get_price( $post->ID, 'HMP_price' ); ?></span>

		<?php hmp-theme_after_post_title( 'featured' ); ?>
	</div>
</li>
