<?php
namespace byhaskell\NovaPoshtaBundle\Model;

use byhaskell\NovaPoshtaBundle\Trait\ArrayHydratorTrait;

class AddressResponse implements ResponseInterface
{
    use ArrayHydratorTrait;

    private ?int $totalCount = null;

    /** @var AddressCollection|null */
    private ?AddressCollection $addresses = null;

    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    public function getAddresses(): ?AddressCollection
    {
        return $this->addresses;
    }
}