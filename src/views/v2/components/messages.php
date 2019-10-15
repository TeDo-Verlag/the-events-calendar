<?php
/**
 * View: Messages
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/views/v2/components/messaging.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version TBD
 *
 * @var array $messges An array of user-facing messages, managed by the View.
 */

if ( empty( $messages ) ) {
	return;
}

// @todo @juanfra Make this beautiful.
?>

<div class="tribe-events-notices" style="text-align: center; width: 100%; margin: 0 0 1em auto;">
	<?php foreach ( $messages as $message_type => $message_group ) {
		foreach ( $message_group as $message ) {
			echo "{$message_type}: $message";
		}
	} ?>
</div>

