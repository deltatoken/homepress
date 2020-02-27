<?php
/**
 * Dashboard Listings loop content.
 *
 * @HomePress\Templates
 * @author  Pablo Rotem
* @since   HomePress 1.0
 */
?>
<?php
$status = HMP_get_listing_status_name( $post->ID );
$expire_time = strtotime( get_post_meta( $post->ID, 'HMP_sys_expire_date', true ) );
$expire_date = hmp-theme_display_date( $expire_time );
?>

<tr class="even <?php echo $status; ?>">
	<td class="text-right"><?php echo $i; ?>.</td>

	<td>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<p class="post-meta">
			<span class="dashicons-before folder"><?php echo get_the_term_list( get_the_id(), APP_TAX_CAT, '', ', ', '' ); ?></span>
			<span class="dashicons-before clock"><span><?php echo hmp-theme_display_date( $post->post_date, 'date' ); ?></span></span>
		</p>
	</td>

	<?php if ( current_theme_supports( 'app-stats' ) ): ?>
		<td class="text-center"><?php echo hmp-theme_get_stats_by( $post->ID, 'total' ); ?></td>
	<?php endif; ?>

	<td class="text-center">
		<span class="status"><?php echo HMP_get_status_i18n( $status ); ?></span>
		<?php if ( in_array( $status, array( 'live', 'live_expired', 'ended' ) ) ): ?>
			<p class="small muted">(<?php echo $expire_date; ?>)</p>
		<?php endif; ?>
	</td>

	<td class="text-center"><?php HMP_dashboard_listing_actions(); ?></td>

</tr>
