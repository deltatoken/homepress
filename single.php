<?php
/**
 * The Template for displaying all single posts.
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

				<?php hmp-theme_before_blog_loop(); ?>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php hmp-theme_before_blog_post(); ?>

						<?php hmp-theme_stats_update( $post->ID ); //records the page hit ?>

						<div class="shadowblock_out">

							<div class="shadowblock">

								<div class="post">

									<?php hmp-theme_before_blog_post_title(); ?>

									<h1 class="single blog"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

									<?php hmp-theme_after_blog_post_title(); ?>

									<?php hmp-theme_before_blog_post_content(); ?>

									<?php if ( has_post_thumbnail() ): ?>

										<div id="main-pic">
											<?php HMP_get_blog_image_url(); ?>
										</div>

									<?php endif; ?>

									<?php the_content(); ?>

									<div class="dotted"></div>
									<div class="pad5"></div>

									<?php hmp-theme_after_blog_post_content(); ?>

								</div><!-- .post -->

							</div><!-- .shadowblock -->

						</div><!-- .shadowblock_out -->

						<?php hmp-theme_after_blog_post(); ?>

					<?php endwhile; ?>

					<?php hmp-theme_after_blog_endwhile(); ?>

				<?php else: ?>

					<?php hmp-theme_blog_loop_else(); ?>

				<?php endif; ?>

				<div class="clr"></div>

				<?php hmp-theme_after_blog_loop(); ?>

				<div class="clr"></div>

				<?php comments_template(); ?>

			</div><!-- .content_left -->

			<?php get_sidebar( 'blog' ); ?>

			<div class="clr"></div>

		</div><!-- .content_res -->

	</div><!-- .content_botbg -->

</div><!-- .content -->
