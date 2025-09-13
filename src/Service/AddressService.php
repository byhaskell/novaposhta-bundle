<?php
namespace byhaskell\NovaPoshtaBundle\Service;

use byhaskell\NovaPoshtaBundle\Client\ApiClient;

class AddressService
{
    public function __construct(private readonly ApiClient $client) {}

    public function searchSettlements(string $cityName, int $limit = 10, int $page = 1): array
    {
        return $this->client->request('AddressGeneral', __FUNCTION__, [
            'CityName' => $cityName,
            'Limit' => $limit,
            'Page' => $page,
        ]);
    }
}