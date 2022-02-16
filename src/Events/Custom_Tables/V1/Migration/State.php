<?php
/**
 * Provides an API to read and write the Migration state.
 *
 * @since   TBD
 *
 * @package TEC\Events\Custom_Tables\V1\Migration;
 */

namespace TEC\Events\Custom_Tables\V1\Migration;

use Tribe__Utils__Array as Arr;

/**
 * Class State.
 *
 * @since   TBD
 *
 * @package TEC\Events\Custom_Tables\V1\Migration;
 */
class State {

	const PHASE_PREVIEW_PROMPT = 'preview-prompt';
	const PHASE_PREVIEW_RUNNING = 'preview-running';
	const PHASE_PREVIEW_COMPLETE = 'preview-running';
	const PHASE_MIGRATION_PROMPT = 'migration-prompt';
	const PHASE_MIGRATION_RUNNING = 'migration-running';
	const PHASE_MIGRATION_COMPLETE = 'migration-completed';
	const PHASE_CANCELLATION_RUNNING = 'cancellation-running';
	const PHASE_CANCELLATION_COMPLETE = 'cancellation-completed';
	const PHASE_UNDO_RUNNING = 'undo-running';
	const PHASE_UNDO_COMPLETE = 'undo-completed';

	/**
	 * An array of default data the migration state will be hydrated with if no
	 * corresponding option is set.
	 *
	 * @since TBD
	 *
	 * @var array<string,mixed>
	 */
	protected $default_data = [
		// @todo set this up.
	];
	/**
	 * An array that will contain the migration state as hydrated from the database values,
	 * or from the default values.
	 *
	 * @since TBD
	 *
	 * @var array<string,mixed>
	 */
	private $data = [];

	public function __construct() {
		// @todo set up the correct format and the actually fetch from information.
		// $this->data = tribe_get_option('ct1_migration_state',$this->default_data);

		// @todo remove this data mock.
		$this->data = [
			'complete_timestamp' => strtotime( 'yesterday 4pm' ),
			'events'             => [ 'total' => 23 ],
		];
	}

	/**
	 * Returns whether the migration is completed or not.
	 *
	 * @since TBD
	 *
	 * @return bool Whether the migration is completed or not.
	 */
	public function is_completed() {
		return false;
	}

	/**
	 * Returns whether the migration process can be undone or not.
	 *
	 * @since TBD
	 *
	 * @return bool Whether the migration process can be undone or not.
	 */
	public function can_be_undone() {
		return false;
	}

	/**
	 * Returns whether the migration is running or not.
	 *
	 * @since TBD
	 *
	 * @return bool Whether the migration is running or not.
	 */
	public function is_running() {
		return false;
	}

	/**
	 * Returns whether the migration is required or not.
	 *
	 * @since TBD
	 *
	 * @return bool Whether the migration is required or not.
	 */
	public function is_required() {
		return true;
	}

	/**
	 * Returns the current migration phase the site is in.
	 *
	 * @since TBD
	 *
	 * @return string The current migration phase the site is in.
	 */
	public function get_phase() {
		// @todo this is hard-coded, it should not be, of course.
		return self::PHASE_MIGRATION_PROMPT;
	}

	/**
	 * Returns a value for a specific data key or nested data key.
	 *
	 * @since TBD
	 * @param string ...$keys A set of one or more indexes to get the
	 *                        value of.
	 *
	 * @return mixed|null The value of the requested index, or nested indexed, or `null`
	 *                    if not defined.
	 */
	public function get( ...$keys ) {
		return Arr::get( $this->data, $keys, null );
	}
}