<?php

namespace BasWorld\File;

use RuntimeException;

class CsvWriter implements FileWriteInterface
{
	public function __construct() {

	}

    /**
     * Writ data to csv file
     *
     * @param string $strPath
     * @param array $arrstrSalaryData
     * @return void
     * @throws \Exception
     */
    public function writeIntoCSV(string $strPath, array $arrstrSalaryData): void {
	    if( empty( $arrstrSalaryData ) ) {
		    throw new RuntimeException('No Data to write in file.');
	    }

		$strFile = fopen($strPath, 'wb' );

	    if( false === $strFile ) {
		    throw new RuntimeException(sprintf('Unable to write to file: %s', $strPath));
	    }

		foreach( $arrstrSalaryData as $arrstrSalary ) {
            fputcsv( $strFile, $arrstrSalary );
        }
	    fclose( $strFile );
    }
}