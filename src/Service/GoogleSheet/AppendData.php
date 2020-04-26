<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 13:16
 */

namespace App\Service\GoogleSheet;


class AppendData
{

    /**
     * @param \Google_Service_Sheets $service
     * @param array $insertData
     * @param string $sheetId
     * @return \Google_Service_Sheets_AppendValuesResponse
     */
    public function appendSheetData(\Google_Service_Sheets $service, array $insertData, string $sheetId)
    {
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $insertData
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $range = 'A:E';
        return $service->spreadsheets_values->append($sheetId, $range, $body, $params);
    }

}