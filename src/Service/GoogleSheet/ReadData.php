<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 13:21
 */

namespace App\Service\GoogleSheet;


class ReadData
{

    public function readSheetData(\Google_Service_Sheets $service,string $sheetId)
    {
        $range = 'A1:E';
        $response = $service->spreadsheets_values->get($sheetId, $range);


        return $response->getValues();
    }











}