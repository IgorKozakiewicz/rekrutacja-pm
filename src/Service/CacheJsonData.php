<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 13:50
 */

namespace App\Service;


class CacheData
{

    private $jsonRowCount;

    public function saveDataToCacheFromJson($jsonPath)
    {

        $decodeData = json_decode(file_get_contents('data.json'),true);

        $cache = new Memcached();
        $cache->set('')

        $this->setJsonRowCount(count($decodeData));


    }

    /**
     * @return mixed
     */
    public function getJsonRowCount()
    {
        return $this->jsonRowCount;
    }

    /**
     * @param mixed $jsonRowCount
     */
    private function setJsonRowCount($jsonRowCount): void
    {
        $this->jsonRowCount = $jsonRowCount;
    }





}