<?php
/**
 * Page loop content template.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
?>

<div class="shadowblock_out">

	<div class="shadowblock">

		<div class="post">

			<?php hmp-theme_before_page_title(); ?>

			<h3 class="loop dotted"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

			<?php hmp-theme_after_page_title(); ?>

			<?php hmp-theme_before_page_content(); ?>

			<?php the_excerpt(); ?>

			<?php hmp-theme_after_page_content(); ?>

		</div><!--/post-->

	</div><!-- /shadowblock -->

</div><!-- /shadowblock_out -->
