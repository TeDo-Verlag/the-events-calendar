<?php
/**
 * Validates a Start Date UTC input.
 *
 * @since   TBD
 *
 * @package TEC\Custom_Tables\V1\Models\Validators
 */

namespace TEC\Custom_Tables\V1\Models\Validators;

use TEC\Custom_Tables\V1\Models\Model;

/**
 * Class Start_Date_UTC
 *
 * @since   TBD
 *
 * @package TEC\Custom_Tables\V1\Models\Validators
 */
class Start_Date extends Validation {

	/**
	 * @var Valid_Date
	 */
	private $date_validator;
	/**
	 * @var Range_Dates
	 */
	private $range_dates;

	public function __construct( Valid_Date $date_validator, Range_Dates $range_dates ) {
		$this->date_validator = $date_validator;
		$this->range_dates    = $range_dates;
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate( Model $model, $name, $value ) {
		$this->error_message = '';

		if ( ! $this->date_validator->validate( $model, 'start_date', $value ) ) {
			$this->error_message = 'The start_date is not a valid date.';

			return false;
		}

		// THere's no end date this can be considered valid.
		if ( empty( $model->end_date ) ) {
			return true;
		}

		// The end date exists but is not valid.
		if ( ! $this->date_validator->validate( $model, 'end_date', $model->end_date ) ) {
			return true;
		}

		if ( $this->range_dates->compare( $model->start_date, $model->end_date ) ) {
			return true;
		}

		$this->error_message = 'The start_date should happen before the end_date';

		return false;
	}
}
