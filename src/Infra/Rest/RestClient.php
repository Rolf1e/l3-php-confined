<?php


namespace App\Infra\Rest;

use Symfony\Component\HttpClient\HttpClient;

abstract class RestClient
{
    protected $httpClient;

    protected function __construct($httpClient)
    {
        #this->httpClient = $httpClient;
    }

}