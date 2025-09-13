<?php
namespace byhaskell\NovaPoshtaBundle\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use byhaskell\NovaPoshtaBundle\Exception\NovaPoshtaException;

class ApiClient
{
    //https://developers.novaposhta.ua/view/model/a0cf0f5f-8512-11ec-8ced-005056b2dbe1/method/a1329635-8512-11ec-8ced-005056b2dbe1
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly string $apiKey,
        private readonly string $baseUrl = 'https://api.novaposhta.ua/v2.0/'
    ) {}

    /**
     * @throws NovaPoshtaException
     */
    public function request(string $modelName, string $calledMethod, array $params = []): array
    {
        $response = $this->httpClient->request('POST', $this->baseUrl, [
            'json' => [
                'apiKey'       => $this->apiKey,
                'modelName'    => $modelName,
                'calledMethod' => $calledMethod,
                'methodProperties' => $params,
            ],
        ]);

        $data = $response->toArray(false);

        if (!isset($data['success']) || $data['success'] !== true) {
            throw new NovaPoshtaException($data['errors'][0] ?? 'Unknown error');
        }

        return $data['data'] ?? [];
    }
}