<?php
namespace byhaskell\NovaPoshtaBundle\Model;

class AddressCollection extends AbstractCollection
{
    public static function getItemClass(): string
    {
        return Address::class;
    }
}