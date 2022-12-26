<?php
require_once __DIR__ . '/vendor/autoload.php';
date_default_timezone_set( 'Asia/Kolkata' );
const ABSPATH = __DIR__;

$intYear = $argv[1] ?? date( 'Y' );
try {
	$strFileName = 'salary_date_' . $intYear . '.csv';
} catch( Exception $e ) {
	throw new RuntimeException( sprintf( 'Caught exception: %s', $e->getMessage() ) );
}

$objCSVWriter = new BasWorld\File\CsvWriter();
$objSalaryData = new BasWorld\Salary\CSalaryPayDatesModule();
if( $objSalaryData->prepareSalaryData( $strFileName, $objCSVWriter, $intYear ) ) {
    echo 'File named '.$strFileName.' is downloaded under `salary_data` Directory for year ' .$intYear. '.';
}

?>


