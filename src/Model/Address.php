<?php
namespace byhaskell\NovaPoshtaBundle\Model;

use byhaskell\NovaPoshtaBundle\Trait\ArrayHydratorTrait;

class Address
{
    use ArrayHydratorTrait;

    private readonly string $present;
    private readonly int $warehouses;
    private readonly string $mainDescription;
    private readonly string $area;
    private readonly ?string $region;
    private readonly string $settlementTypeCode;
    private readonly string $ref;
    private readonly string $deliveryCity;
    private readonly bool $addressDeliveryAllowed;
    private readonly bool $streetsAvailability;
    private readonly ?string $parentRegionTypes;
    private readonly ?string $parentRegionCode;
    private readonly ?string $regionTypes;
    private readonly ?string $regionTypesCode;

    public function getRef(): string { return $this->ref; }
    public function getMainDescription(): ?string { return $this->mainDescription; }
    public function getRegion(): ?string { return $this->region; }
}
