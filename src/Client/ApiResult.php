<?php
namespace byhaskell\NovaPoshtaBundle\Client;

use byhaskell\NovaPoshtaBundle\Model\ResponseInterface;

class ApiResult
{
    private ResponseInterface $result;
    private array $errors;
    private array $warnings;
    private array $info;
    private bool $success;

    public function __construct(ApiResponse $apiResponse, ResponseInterface $responseClass)
    {
        $this->success = $apiResponse->isSuccess();
        $this->errors = $apiResponse->getErrors();
        $this->warnings = $apiResponse->getWarnings();
        $this->info = $apiResponse->getInfo();
        $this->result = $responseClass::fromArray($apiResponse->getData()[0] ?? []);
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getResult(): ResponseInterface
    {
        return $this->result;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function getInfo(): array
    {
        return $this->info;
    }
}
