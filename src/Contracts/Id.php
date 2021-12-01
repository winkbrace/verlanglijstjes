<?php

declare(strict_types=1);

namespace Verlanglijstjes\Contracts;

/**
 * This abstract class contains the common code for Id value objects
 */
abstract class Id implements ValueObject
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function equals(ValueObject|Id $object) : bool
    {
        if ( ! $object instanceof static) {
            return false;
        }

        return $this->id === $object->toInt();
    }

    public function __toString() : string
    {
        return (string) $this->id;
    }

    public static function fromString(string $value): static
    {
        return new static((int) $value);
    }

    public static function fromStringOrNull(?string $value): ?static
    {
        if ($value === null) {
            return null;
        }

        return new static((int) $value);
    }

    public function jsonSerialize()
    {
        return $this->id;
    }

    public function toInt() : int
    {
        return $this->id;
    }
}
