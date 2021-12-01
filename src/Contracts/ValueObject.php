<?php declare(strict_types=1);

namespace Verlanglijstjes\Contracts;

/**
 * This interface guarantees the common behaviour of value objects.
 *
 * The equals method guarantees that all value objects allow a correct way of comparing
 * The __toString method guarantees that all value objects can be saved in a database and used by Eloquent's toArray()
 * The fromString method guarantees that the value object can be reconstructed from it's database representation.
 * The JsonSerializable interface guarantees that all value objects can be cast to json
 */
interface ValueObject extends \JsonSerializable
{
    public function equals(ValueObject $object) : bool;

    public function __toString() : string;

    public static function fromString(string $value) : static;
}
