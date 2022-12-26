<?php
namespace BasWorld\Salary;
use PHPUnit\Framework\TestCase;

require_once( './src/Salary/CSalaryPayDates.php' );

class CSalaryPayDatesTest extends TestCase {

	/**
	 * Prepares the environment before running a test.
	 */
	public function setUp(): void {
		parent::setUp();
		$this->m_objSalaryPayDates = new CSalaryPayDates();
	}

	/**
	 * Unset the variables after running a test.
	 */
	protected function tearDown(): void {
		parent::tearDown();
		unset( $this->m_objSalaryPayDates );
	}

	/**
	 * @param $strBonusDate
	 * @param $strExpectedResult
	 * @dataProvider dataProviderTestGetBonusDate
	 */
	public function testGetBonusDate( $strBonusDate, $strExpectedResult ) : void {
		static::assertSame( $strExpectedResult, $this->m_objSalaryPayDates->getBonusDate( date_create( $strBonusDate ) ) );
	}

	/**
	 * @param $strSalaryDate
	 * @param $strExpectedResult
	 * @dataProvider dataProviderTestGetSalaryDate
	 */
	public function testGetSalaryDate( $strSalaryDate, $strExpectedResult ) : void {
		static::assertSame( $strExpectedResult, $this->m_objSalaryPayDates->getSalaryDate( date_create( $strSalaryDate ) ) );

	}

	/**
	 * @param $strSalaryDate
	 * @param $boolExpectedResult
	 * @dataProvider dataProviderTestIsWeekend
	 */
	public function testIsWeekend( $strPayDate, $boolExpectedResult ) : void {
		static::assertSame( $boolExpectedResult, $this->m_objSalaryPayDates->isWeekend( date_create( $strPayDate ) ) );

	}

	/**
	 * @return array
	 */
	public function dataProviderTestGetBonusDate() : array {
		return [
			[
				'15-01-2022',
				'19-01-2022'
			],
			[
				'15-02-2022',
				'15-02-2022'
			],
			[
				'15-03-2023',
				'15-03-2023'
			]
		];
	}

	/**
	 * @return array
	 */
	public function dataProviderTestGetSalaryDate() : array {
		return [
			[
				'31-01-2023',
				'31-01-2023'
			],
			[
				'30-04-2023',
				'28-04-2023'
			]
		];
	}

	/**
	 * @return array
	 */
	public function dataProviderTestIsWeekend() : array {
		return [
			[
				'30-04-2023',
				true
			],
			[
				'15-01-2022',
				true
			],
			[
				'31-01-2023',
				false
			],
			[
				'15-02-2022',
				false
			]
		];
	}
}