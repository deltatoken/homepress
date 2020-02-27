<?php
/**
 * The template for displaying Comments.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
 * @since   HomePress 1.0
 */


// Prevent direct file calls
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( post_password_required() ) { ?>

	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', APP_TD ); ?></p>
<?php
	return;
}
?>


<?php if ( have_comments() ) : ?>

	<div class="shadowblock_out start">

		<div class="shadowblock">

			<div id="comments">

				<div id="comments_wrap">

					<h2 class="dotted"><?php comments_number( __( 'No Responses', APP_TD ), __( 'One Response', APP_TD ), __( '% Responses', APP_TD ) ); ?> <?php _e( 'to', APP_TD ); ?> <span>&#8220;<?php the_title(); ?>&#8221;</span></h2>

					<?php hmp-theme_before_page_comments(); ?>

					<ol class="commentlist">

						<?php hmp-theme_list_page_comments(); ?>

					</ol>

					<?php hmp-theme_after_page_comments(); ?>

					<div class="navigation">

						<div class="alignleft"><?php previous_comments_link( '&laquo; ' . __( 'Older Comments', APP_TD ), 0 ); ?></div>

						<div class="alignright"><?php next_comments_link( __( 'Newer Comments', APP_TD ) . ' &raquo;', 0 ); ?></div>

						<div class="clr"></div>

					</div><!-- /navigation -->

					<div class="clr"></div>

					<?php hmp-theme_before_page_pings(); ?>

					<?php $carray = separate_comments( $comments ); // get the comments array to check for pings ?>

					<?php if ( ! empty( $carray['pings'] ) ) : // pings include pingbacks & trackbacks ?>

						<h2 class="dotted" id="pings"><?php _e( 'Trackbacks/Pingbacks', APP_TD ); ?></h2>

						<ol class="pinglist">

							<?php hmp-theme_list_page_pings(); ?>

						</ol>

					<?php endif; ?>

					<?php hmp-theme_after_page_pings(); ?>

					<?php hmp-theme_before_page_respond(); ?>

					<?php if ( 'open' == $post->comment_status ) : ?>

						<?php hmp-theme_before_page_comments_form(); ?>

						<?php hmp-theme_page_comments_form(); ?>

						<?php hmp-theme_after_page_comments_form(); ?>

					<?php endif; // open ?>

					<?php hmp-theme_after_page_respond(); ?>

				</div> <!-- /comments_wrap -->

			</div><!-- /comments -->

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->

<?php elseif ( 'open' == $post->comment_status ) : ?>

	<div class="shadowblock_out start">

		<div class="shadowblock">

			<div id="comments">

				<div id="comments_wrap">

					<?php hmp-theme_before_page_respond(); ?>

					<?php hmp-theme_before_page_comments_form(); ?>

					<?php hmp-theme_page_comments_form(); ?>

					<?php hmp-theme_after_page_comments_form(); ?>

					<?php hmp-theme_after_page_respond(); ?>

				</div> <!-- /comments_wrap -->

			</div><!-- /comments -->

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->

<?php endif; ?>
