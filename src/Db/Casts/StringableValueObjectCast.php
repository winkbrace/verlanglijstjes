<?php declare(strict_types=1);

namespace Verlanglijstjes\Db\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

abstract class StringableValueObjectCast implements CastsAttributes
{
    /** Value Object full class name */
    protected string $class;

    public function get($model, string $key, $value, array $attributes)
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof $this->class) {
            return $value;
        }

        return call_user_func([$this->class, 'fromString'], (string) $value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if (empty($value)) {
            return null;
        }

        return (string) $value;
    }
}
