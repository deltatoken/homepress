<?php
/**
 * Template Name: Blog Template
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */
?>


<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<div id="breadcrumb"><?php HMP_breadcrumb(); ?></div>

			<div class="content_left">

				<?php get_template_part( 'loop' ); ?>

				<div class="clr"></div>

			</div><!-- /content_left -->

			<?php get_sidebar( 'blog' ); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->