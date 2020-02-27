<?php
/**
 * Main loop for displaying ads.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @@since   HomePress 1.0
 */
?>

<?php hmp-theme_before_loop(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php hmp-theme_before_post(); ?>

		<?php get_template_part( 'content', APP_POST_TYPE ); ?>

		<?php hmp-theme_after_post(); ?>

	<?php endwhile; ?>

	<?php hmp-theme_after_endwhile(); ?>

<?php else: ?>

	<?php hmp-theme_loop_else(); ?>

<?php endif; ?>

<?php hmp-theme_after_loop(); ?>

<?php wp_reset_query(); ?>
