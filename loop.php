<?php
/**
 * Main loop for displaying blog posts.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */

// hack needed for "<!-- more -->" to work with templates
global $more;
$more = 0;
?>

<?php hmp-theme_before_blog_loop(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post() ?>

		<?php hmp-theme_before_blog_post(); ?>

		<?php get_template_part( 'content', get_post_type() ); ?>

		<?php hmp-theme_after_blog_post(); ?>

	<?php endwhile; ?>

	<?php hmp-theme_after_blog_endwhile(); ?>

<?php else: ?>

	<?php hmp-theme_blog_loop_else(); ?>

<?php endif; ?>

<?php hmp-theme_after_blog_loop(); ?>
