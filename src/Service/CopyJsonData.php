<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 14:01
 */

namespace App\Service;

use App\Service\GoogleSheet\GoogleClient;
use App\Service\GoogleSheet\ReadData;
use App\Service\GoogleSheet\AppendData;

class CopyJsonData
{

    private $insertData;

    private $message;

    /**
     * @param $sheetId
     * @throws \Google_Exception
     */
    public function copyDataFromJson($sheetId)
    {
        $operationStartTime = microtime(true);

        $service = (new GoogleClient())->getService();

        $cacheData = new CacheJsonData();
        $cacheData->saveDataToCacheFromJson('data.json','json_data');

        $readData = new ReadData();
        $sheetData = $readData->readSheetData($service,$sheetId);

        $this->prepareInsertData($sheetData,$operationStartTime,$cacheData);

        $appendData = new AppendData();
        $appendData->appendSheetData($service,$this->insertData,$sheetId);

        $this->prepereMessage($sheetId);
    }


    private function prepareInsertData($sheetData,$operationStartTime,$cacheData)
    {
        $this->insertData = [
            [
                $this->prepareOperationId($sheetData),
                1,
                $this->prepareOperationDate(),
                $this->prepareOperationTime($operationStartTime),
                $this->prepareOperationMemory(),
                'DONE',
                $cacheData->getJsonRowCount()

            ]
        ];

    }

    private function prepareOperationId($sheetData)
    {
        return end($sheetData)[0] + 1;
    }

    private function prepareOperationDate()
    {
        return (new \DateTime())->format('Y-m-d H:i:s');
    }

    private function prepareOperationMemory()
    {
        return round(memory_get_usage() * 0.000001). ' MB';
    }

    private function prepareOperationTime($operationStartTime)
    {
        return round
            (
                microtime(true) - $operationStartTime,
                4
            )
            . ' s';
    }

    private function prepereMessage($sheetId)
    {
        $this->message =
            $sheetId. ' | '.
            $this->insertData[0][0] . ' | '.
            $this->insertData[0][2] . ' | '.
            $this->insertData[0][3] . ' | '.
            $this->insertData[0][4] . ' | '.
            $this->insertData[0][5] . ' | '.
            $this->insertData[0][6];
    }

    public function getMessage()
    {
        return $this->message;
    }

}