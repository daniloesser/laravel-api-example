<?php

namespace App\Dtos;

use Error;
use ReflectionClass;

class GenericDTO
{
    public function __set(string $property, $value): void
    {
        throw new Error('DTOs are immutable. Create a new one to set a new value.');
    }

    public function __isset(string $property): bool
    {
        return array_key_exists($property, $this->arrSerialize());
    }

    public function __get(string $property)
    {
        if (!$this->__isset($property)) {
            $self = static::class;
            throw new Error("Undefined property: {$self}::\$$property.");
        }
        return $this->arrSerialize()[$property];
    }


    public function toArray(): array
    {
        return $this->arrSerialize();
    }


    private function arrSerialize(): array
    {
        $arr = array();
        $class = new ReflectionClass($this);
        foreach ($class->getProperties() as $key => $value) {
            $value->setAccessible(true);
            $arr[$value->getName()] = $value->getValue($this);
        }
        return $arr;
    }

    public function toJson()
    {
        return json_encode($this->arrSerialize(), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT, 512);
    }


}