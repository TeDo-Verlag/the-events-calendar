<div class="tec-upgrade-recurrence__row">
	<div class="content-container">
		<h3>
			<?php use TEC\Events_Pro\Custom_Tables\V1\Migration\Admin\Upgrade_Tab;

			echo $logo; ?>
			<?php esc_html_e( 'Preview complete', 'ical-tec' ); ?>
		</h3>

		<p>
			<?php
			echo sprintf(
				esc_html( 'The migration preview is done and ready for your review. No changes have been made to your events, but this report shows what adjustments will be made during the migration to the new system. If you have any questions, please %1$sreach out to our support team%2$s.', 'ical-tec' ),
				'<a href="https://evnt.is/2n" rel="noopener" target="_blank">',
				'</a>'
			);
			?>
		</p>

		<?php include_once __DIR__ . '/report-data.php'; ?>

		<p class="tec-upgrade__alert">
			<i class="tec-upgrade__alert-icon">!</i>
			<?php
			echo sprintf(
				esc_html( 'From this preview, we estimate that the full migration process will take approximately %3$s hour(s). During migration, %1$syou cannot make changes to your calendar or events.%2$s Your calendar will still be visible on your site.', 'ical-tec' ),
				'<strong>',
				'</strong>',
				$report->estimated_time_in_hours
			);

			if ( $addendum = tribe( \TEC\Events\Custom_Tables\V1\Migration\Admin\Upgrade_Tab::class )->get_migration_prompt_addendum() ) {
				?>
				<strong><?php echo esc_html( $addendum ); ?></strong>
				<?php
			}

			echo sprintf(
				esc_html( '%1$s%3$sLearn more about the migration%4$s.%2$s', 'ical-tec' ),
				'<strong>',
				'</strong>',
				'<a href="https://evnt.is/recurrence-2-0" target="_blank" rel="noopener">',
				'</a>'
			);
			?>
		</p>
	</div>

	<div class="image-container">
		<img class="screenshot" src="<?php echo esc_url( plugins_url( 'src/resources/images/upgrade-views-screenshot.png', TRIBE_EVENTS_FILE ) ); ?>" alt="<?php esc_attr_e( 'screenshot of updated calendar views', 'the-events-calendar' ); ?>" />
	</div>
</div>

<div class="tec-upgrade-recurrence__row">
	<?php
	$datetime_heading = __( 'Previewed Date/Time:', 'ical-tec' );
	$total_heading    = __( 'Total Events Previewed:', 'ical-tec' );
	ob_start();
	?>
		<em
			class="tribe-events-pro-map__event-datetime-recurring-icon"
			title="<?php esc_attr_e( 'Recurring', 'tribe-events-calendar-pro' ) ?>"
		>
			<?php include TEC_CUSTOM_TABLES_V1_ROOT . '/admin-views/migration/icons/rerun.php'; ?>
		</em>
		<a href=""><?php esc_html_e( 'Re-run preview', 'ical-tec' ); ?></a>
	<?php
	$heading_action = ob_get_clean();
	include_once __DIR__ . '/report.php';
	?>
</div>

<div class="tec-upgrade-recurrence__row">
	<div class="content-container">
		<button type="button"><?php esc_html_e( 'Start migration', 'ical-tec' ); ?></button>
		<i>
			<?php
			if ( 1 === $report->estimated_time_in_hours ) {
				$message = esc_html( '(Estimated time: %1$s hour)', 'ical-tec' );
			} else {
				$message = esc_html( '(Estimated time: %1$s hours)', 'ical-tec' );
			}

			echo sprintf( $message, $report->estimated_time_in_hours );
			?>
		</i>
	</div>
</div>
