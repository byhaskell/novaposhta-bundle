<?php
namespace byhaskell\NovaPoshtaBundle\Client;

class ApiResponse
{
    private array $data;
    private array $errors;
    private array $warnings;
    private array $info;
    private bool $success;

    public function __construct(array $raw)
    {
        $this->success = $raw['success'] ?? false;
        $this->data = $raw['data'] ?? [];
        $this->errors = $raw['errors'] ?? [];
        $this->warnings = $raw['warnings'] ?? [];
        $this->info = $raw['info'] ?? [];
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getData(): array
    {
        return $this->data;
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
