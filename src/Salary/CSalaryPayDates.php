<?php
namespace BasWorld\Salary;
use DateTime;

class CSalaryPayDates {
	 public const DATE_FORMAT = 'd-m-Y';
	 public const BONUS_DAYS  = 14;

	 /**
	 * Constructor function
	  */
	 public function __construct(){

	 }

	/**
	 * Calculate the bonus date of month
	 * @param datetime $objDate
	 * @return string $strBonusDate
	 */
	 public function getBonusDate( DateTime $objDate ): string {
		 $objFirstDayOfMonth = $objDate->modify( 'first day of this month' );
		 $objBonusDate       = $objFirstDayOfMonth->modify( '+ ' . self::BONUS_DAYS . ' days' );
		 if( true === $this->isWeekend( $objBonusDate ) ) {
			$objBonusDate = $objBonusDate->modify('next wednesday');
		 }

		 return $objBonusDate->format( self::DATE_FORMAT );
	 }

	/**
	 * Calculate the salary date of month
	 * @param datetime $objDate
	 * @return string $strSalaryDate
	 */
	 public function getSalaryDate( DateTime $objDate ): string {
		 $objLastDayOfMonth = $objDate->modify(  'last day of this month' );
		 if( true === $this->isWeekend( $objLastDayOfMonth ) ) {
			 $objLastDayOfMonth = $objLastDayOfMonth->modify( 'previous friday' );
		 }

		 return $objLastDayOfMonth->format( self::DATE_FORMAT );
	 }

	/**
	 * Calculate the date is on weekend or not
	 * @param datetime $objDateTime
	 * @return bool
	 */
	public function isWeekend( DateTime $objDateTime): bool {
		$strDate    = $objDateTime->format( 'd-m-Y H:i:s' );
		$strDay     = strtolower( date( "D", strtotime( $strDate )  ) );
        return true === in_array( $strDay, [ 'sat', 'sun' ] );
    }
}