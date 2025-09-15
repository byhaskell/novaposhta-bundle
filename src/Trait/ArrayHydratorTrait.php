<?php
namespace byhaskell\NovaPoshtaBundle\Trait;

use byhaskell\NovaPoshtaBundle\Model\AbstractCollection;
use ReflectionProperty;

trait ArrayHydratorTrait
{
    public static function fromArray(array $data): static
    {
        $obj = new static();

        foreach ($data as $key => $value) {
            // PascalCase → camelCase
            $property = lcfirst($key);

            if (!property_exists($obj, $property)) {
                continue;
            }

            $refProperty = new ReflectionProperty($obj, $property);
            $refProperty->setAccessible(true);

            $type = self::getPropertyType($obj, $property);

            if ($value === null) {
                $refProperty->setValue($obj, null);
                continue;
            }

            if (is_array($value) && $type && class_exists($type)) {
                // Collection
                if (is_subclass_of($type, AbstractCollection::class)) {
                    $itemClass = $type::getItemClass();
                    $items = array_map(fn($item) => $itemClass::fromArray($item), $value);
                    $refProperty->setValue($obj, new $type($items));
                }
                // Item DTO
                elseif (self::isAssoc($value)) {
                    $refProperty->setValue($obj, $type::fromArray($value));
                }
                // Array DTO
                else {
                    $refProperty->setValue($obj, array_map(fn($item) => $type::fromArray($item), $value));
                }
            } else {
                $refProperty->setValue($obj, $value);
            }
        }

        return $obj;
    }

    private static function isAssoc(array $arr): bool
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * @throws \ReflectionException
     */
    private static function getPropertyType(object $obj, string $property): ?string
    {
        $ref = new ReflectionProperty($obj, $property);
        $type = $ref->getType();

        if ($type && !$type->isBuiltin()) {
            return $type->getName();
        }

        return null;
    }
}