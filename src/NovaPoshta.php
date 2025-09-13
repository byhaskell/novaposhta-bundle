<?php
namespace byhaskell\NovaPoshtaBundle;

use byhaskell\NovaPoshtaBundle\Service\AddressService;

class NovaPoshta
{
    public function __construct(
        private readonly AddressService $address,
    ) {}

    public function address(): AddressService
    {
        return $this->address;
    }
}