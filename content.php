<?php
/**
 * Post loop content template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
?>

<div <?php post_class( 'shadowblock_out' ); ?> id="post-<?php the_ID(); ?>">

	<div class="shadowblock">

		<?php hmp-theme_before_blog_post_title(); ?>

		<h3 class="loop"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

		<?php hmp-theme_after_blog_post_title(); ?>

		<?php hmp-theme_before_blog_post_content(); ?>

		<div class="entry-content">

			<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'blog-thumbnail' ); ?>

			<?php the_content( __( 'Continue reading ...', APP_TD ) ); ?>

		</div>

		<?php hmp-theme_after_blog_post_content(); ?>

	</div><!-- #shadowblock -->

</div><!-- #shadowblock_out -->
