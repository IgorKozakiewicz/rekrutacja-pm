<?php

namespace App\Service;

class GoogleClient
{

    /**
     * Returns an authorized API client.
     * @return \Google_Client the authorized client object
     * @throws \Google_Exception
     * @throws \Exception
     */
    public function getClient()
    {
        $client = new \Google_Client();
        $client->setScopes(\Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig('pmweb-5aa3d9098ad8.json');

        return $client;
    }

    public function getData()
    {

    }

    public function appendData()
    {

    }

}