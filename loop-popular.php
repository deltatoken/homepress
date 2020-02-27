<?php
/**
 * Loop for displaying most popular ads.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @@since   HomePress 1.0
 */

global $HMP_options;
?>

<?php hmp-theme_before_loop(); ?>

<?php if ( $query = HMP_get_popular_ads() ) : ?>

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<?php hmp-theme_before_post(); ?>

		<?php get_template_part( 'content', APP_POST_TYPE ); ?>

		<?php hmp-theme_after_post(); ?>

	<?php endwhile; ?>

	<?php hmp-theme_after_endwhile(); ?>

<?php else: ?>

	<?php hmp-theme_loop_else(); ?>

<?php endif; ?>

<?php hmp-theme_after_loop(); ?>

<?php wp_reset_postdata(); ?>
