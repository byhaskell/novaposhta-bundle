<?php
namespace byhaskell\NovaPoshtaBundle\Service;

use byhaskell\NovaPoshtaBundle\Client\ApiClient;
use byhaskell\NovaPoshtaBundle\Client\ApiResult;
use byhaskell\NovaPoshtaBundle\Model\AddressResponse;

class AddressService
{
    public function __construct(private readonly ApiClient $client) {}

    public function searchSettlements(string $cityName, int $limit = 10, int $page = 1): ApiResult
    {
        $response = $this->client->request('AddressGeneral', __FUNCTION__, [
            'CityName' => $cityName,
            'Limit' => $limit,
            'Page' => $page,
        ]);

        return new ApiResult($response, new AddressResponse());
    }
}