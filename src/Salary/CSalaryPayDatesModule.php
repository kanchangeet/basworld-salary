<?php
namespace BasWorld\Salary;
use RuntimeException;

class CSalaryPayDatesModule {

	public const DIRECTORY_NAME = 'salary_data';

	/**
	 * Constructor function
	 */
	public function __construct() {
    }

	/**
	 * Prepare the salary data which need to write in CSV file
	 * @param string $strFileName
	 * @param object $objCSVWriter
	 * @return bool
	 */
	public function prepareSalaryData( string $strFileName, mixed $objCSVWriter, int $intYear ): bool {
		// directory and file location
		$strDirPath = ABSPATH . DIRECTORY_SEPARATOR . self::DIRECTORY_NAME;

        if( !is_dir( $strDirPath ) && !mkdir( $strDirPath ) && !is_dir( $strDirPath ) ) {
	        throw new RuntimeException( sprintf( 'Directory "%s" was not created', $strDirPath ) );
        }

        $strFilePath        = $strDirPath . DIRECTORY_SEPARATOR . $strFileName;

		if( file_exists( $strFilePath ) ) {
			echo 'File is already present for year '. $intYear;
			return false;
		}

		$arrstrSalaryData[] = $this->getHeaderTitle();
		$objSalaryPayDates  = new CSalaryPayDates;

		for( $i=1; $i<=12; $i++ ) {
			$strFirstDayOfMonth             	= date( 'd-m-Y', strtotime( '01-'.$i.'-'.$intYear ) );
			$objFirstDay 			            = date_create($strFirstDayOfMonth);
			$arrstrSalaryData[$i]['month'] 	    = date( 'F', strtotime( $strFirstDayOfMonth ) );//exit;
			$arrstrSalaryData[$i]['bonus_date'] = $objSalaryPayDates->getBonusDate($objFirstDay);
			$arrstrSalaryData[$i]['pay_date'] 	= $objSalaryPayDates->getSalaryDate($objFirstDay);
		}

		$objCSVWriter->writeIntoCSV( $strFilePath, $arrstrSalaryData );
        return true;
	}

	/**
	 * get CSV header data
	 * @return array $arrmixPayData
	 */
	public function getHeaderTitle(): array {
        $arrmixPayData['month'] 		= 'Month Name';
		$arrmixPayData['bonus_date']    = 'Bonus Payment Date';
		$arrmixPayData['pay_date'] 	    = 'Salary Payment Date';
		return $arrmixPayData;
    }
}