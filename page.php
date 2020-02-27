<?php
/**
 * The template for displaying pages.
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

				<?php hmp-theme_before_page_loop(); ?>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php hmp-theme_before_page(); ?>

						<div class="shadowblock_out">

							<div class="shadowblock">

								<div class="post">

									<?php hmp-theme_before_page_title(); ?>

									<h1 class="single dotted"><?php the_title(); ?></h1>

									<?php hmp-theme_after_page_title(); ?>

									<?php hmp-theme_before_page_content(); ?>

									<?php the_content(); ?>

									<?php hmp-theme_after_page_content(); ?>

									<div class="prdetails">

										<?php edit_post_link( '<p class="dashicons-before edit">' . __( 'Edit Page', APP_TD ), '', '' ) . '</p>'; ?>

									</div>

								</div><!--/post-->

							</div><!-- /shadowblock -->

						</div><!-- /shadowblock_out -->

						<?php hmp-theme_after_page(); ?>

					<?php endwhile; ?>

					<?php hmp-theme_after_page_endwhile(); ?>

				<?php else: ?>

					<?php hmp-theme_page_loop_else(); ?>

					<p><?php _e( 'Sorry, no pages matched your criteria.', APP_TD ); ?></p>

				<?php endif; ?>

				<div class="clr"></div>

				<?php hmp-theme_after_page_loop(); ?>

				<?php if ( comments_open() ) comments_template( '/comments-page.php' ); ?>

			</div><!-- /content_left -->

			<?php get_sidebar( 'page' ); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
