<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.20
 * Time: 13:50
 */

namespace App\Service;


class CacheJsonData
{

    private $jsonRowCount;

    public function saveDataToCacheFromJson($jsonPath,$cacheKey)
    {
        $decodeData = json_decode(file_get_contents('data.json'),true);

        $cache = new \Memcached();
        $cache->addServer('localhost', 11211);
        $cache->set($cacheKey,$decodeData);

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