<?php

namespace App\Service\GoogleSheet;

class GoogleClient
{

    /**
     * @return \Google_Service_Sheets
     * @throws \Google_Exception
     */
    public function getService()
    {
        $client = new \Google_Client();
        $client->setScopes(\Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig('config/google/pmweb-5aa3d9098ad8.json');
        $service =  new \Google_Service_Sheets($client);


        return $service;
    }




}