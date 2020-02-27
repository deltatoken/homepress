<?php
/**
 * Listing loop content template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
global $HMP_options;
?>

<div class="post-block-out <?php HMP_display_style( 'featured' ); ?>">

	<div class="post-block">

		<div class="post-left">

			<?php if ( $HMP_options->ad_images ) HMP_ad_loop_thumbnail(); ?>

		</div>

		<div class="<?php HMP_display_style( array( 'ad_images', 'ad_class' ) ); ?>">

			<?php hmp-theme_before_post_title(); ?>

			<h3><a href="<?php the_permalink(); ?>"><?php if ( mb_strlen( get_the_title() ) >= 75 ) echo mb_substr( get_the_title(), 0, 75 ) . '...'; else the_title(); ?></a></h3>

			<div class="clr"></div>

			<?php hmp-theme_after_post_title(); ?>

			<div class="clr"></div>

			<?php hmp-theme_before_post_content(); ?>

			<p class="post-desc"><?php echo HMP_get_content_preview(); ?></p>

			<?php hmp-theme_after_post_content(); ?>

			<div class="clr"></div>

		</div>

		<div class="clr"></div>

	</div><!-- /post-block -->

</div><!-- /post-block-out -->
