<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayLastKeyBench extends Bench
{
    protected array $array;

    public function benchLastKeyCallbackEarly()
    {
        array_last_key($this->array, function ($value) {
            return $value < 98;
        });
    }

    public function benchLastKeyCallbackLate()
    {
        array_last_key($this->array, function ($value) {
            return $value < 1;
        });
    }

    public function benchLastKeyEmpty()
    {
        array_last_key([]);
    }

    public function benchLastKeyLarge()
    {
        array_last_key($this->array);
    }

    public function init()
    {
        $this->array = range(1, 100);
    }
}
