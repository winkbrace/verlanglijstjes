<?php declare(strict_types=1);

namespace Verlanglijstjes\Db\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

abstract class IdCast implements CastsAttributes
{
    /** ID object full class name */
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

        return $value instanceof $this->class ? $value->toInt() : (int) $value;
    }
}
