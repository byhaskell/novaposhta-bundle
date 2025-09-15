<?php
namespace byhaskell\NovaPoshtaBundle\Client;

use byhaskell\NovaPoshtaBundle\Exception\NovaPoshtaException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $apiKey,
        private readonly string $baseUrl = 'https://api.novaposhta.ua/v2.0/json/',
    ) {}

    /**
     * @throws NovaPoshtaException
     */
    public function request(string $modelName, string $calledMethod, array $params = []): ApiResponse
    {
        try {
            $response = $this->httpClient->request('POST', $this->baseUrl, [
                'json' => [
                    'apiKey' => $this->apiKey,
                    'modelName' => $modelName,
                    'calledMethod' => $calledMethod,
                    'methodProperties' => $params,
                ],
            ]);

            $raw = $response->toArray(false);

            return new ApiResponse($raw);

        } catch (\Throwable $exception) {
            throw new NovaPoshtaException($exception->getMessage());
        }
    }
}