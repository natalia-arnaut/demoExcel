<?php
namespace Infrastructure;

use JetBrains\PhpStorm\NoReturn;
use PhpOffice\PhpSpreadsheet\IOFactory;

class XlsReader
{
    #[NoReturn]
    public function read(string $inputFileName): array
    {
        $inputFileType = 'Xlsx';

        /**  Create a new Reader of the type defined in $inputFileType  **/
        $reader = IOFactory::createReader($inputFileType);
        /**  Advise the Reader that we only want to load cell data  **/
        $reader->setReadDataOnly(true);

        $worksheetData = $reader->listWorksheetInfo($inputFileName);

        foreach ($worksheetData as $worksheet) {

            $sheetName = $worksheet['worksheetName'];

            echo "<h4>$sheetName</h4>";
            /**  Load $inputFileName to a Spreadsheet Object  **/
            $reader->setLoadSheetsOnly($sheetName);
            $spreadsheet = $reader->load($inputFileName);

            $worksheet = $spreadsheet->getActiveSheet();
            return $worksheet->toArray();
        }

        return [];
    }
}
