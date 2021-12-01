<?php declare(strict_types=1);

namespace Verlanglijstjes\Db\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

abstract class EnumCast implements CastsAttributes
{
    /** Enum full class name */
    protected string $class;

    public function get($model, string $key, $value, array $attributes)
    {
        if (empty($value)) {
            return null;
        }

        return new $this->class($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if (empty($value)) {
            return null;
        }

        return (string) $value;
    }
}
