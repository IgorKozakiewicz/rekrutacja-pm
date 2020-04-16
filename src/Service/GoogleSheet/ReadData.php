<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 13:21
 */

namespace App\Service\GoogleSheet;


class GetData
{

    private $operationTime;

    private $operationMemory;

    private $sheetData;

    public function getSheetData(\Google_Service_Sheets $service,string $sheetId)
    {
        $operationStartTime = microtime(true);


        $range = 'A1:E';
        $response = $service->spreadsheets_values->get($sheetId, $range);

        $this->
        $values = $response->getValues();

        $this->setOperationTime(
            microtime(true) - $operationStartTime
        );

        $this->setOperationMemory(
            round(memory_get_usage() * 0.000001). ' MB'
        );


        /*
        $operationTime = round($operationTime, 4). ' s';
        $memory = round(memory_get_usage() * 0.000001). ' MB';*/
    }

    /**
     * @return mixed
     */
    public function getOperationTime()
    {
        return $this->operationTime;
    }

    /**
     * @param mixed $operationTime
     */
    private function setOperationTime($operationTime): void
    {
        $this->operationTime = $operationTime;
    }

    /**
     * @return mixed
     */
    public function getOperationMemory()
    {
        return $this->operationMemory;
    }

    /**
     * @param mixed $operationMemory
     */
    private function setOperationMemory($operationMemory): void
    {
        $this->operationMemory = $operationMemory;
    }

    /**
     * @return mixed
     */
    public function getSheetData()
    {
        return $this->sheetData;
    }

    /**
     * @param mixed $sheetData
     */
    private function setSheetData($sheetData): void
    {
        $this->sheetData = $sheetData;
    }









}