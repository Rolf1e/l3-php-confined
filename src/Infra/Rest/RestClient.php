<?php


namespace App\Infra\Rest;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class RestClient
{
    protected $httpClient;
    protected $serializer;

    protected function __construct($httpClient)
    {
        $this->httpClient = $httpClient;
        $this->serializer = new Serializer(
            [new ObjectNormalizer(), new ArrayDenormalizer(), new GetSetMethodNormalizer(), new ArrayDenormalizer()],
            [new JsonEncoder()]
        );
    }

}
