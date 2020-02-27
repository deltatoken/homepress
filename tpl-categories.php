<?php
/**
 * Template Name: Categories Template
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

				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted"><?php _e( 'Ad Categories', APP_TD ); ?></h1>

						<div id="directory" class="directory <?php HMP_display_style( 'dir_cols' ); ?>">

							<?php echo HMP_create_categories_list( 'dir' ); ?>

							<div class="clr"></div>

						</div><!--/directory-->

					</div><!-- /shadowblock -->

				</div><!-- /shadowblock_out -->

			</div><!-- /content_left -->

			<?php get_sidebar(); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
