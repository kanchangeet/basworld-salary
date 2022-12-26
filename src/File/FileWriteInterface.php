<?php

namespace BasWorld\File;

interface FileWriteInterface
{
    /**
     * Write the file
     *
     * @param string $strFilePath
     * @param array $arrstrSalaryData
     * @return void
     */
    public function writeIntoCSV( string $strFilePath, array $arrstrSalaryData ): void;
}