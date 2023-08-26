<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayLastBench extends Bench
{
    protected array $array;

    public function benchLastCallbackEarly()
    {
        array_last($this->array, function ($value) {
            return $value < 99;
        });
    }

    public function benchLastCallbackLate()
    {
        array_last($this->array, function ($value) {
            return $value < 2;
        });
    }

    public function benchLastEmpty()
    {
        array_last([]);
    }

    public function benchLastLarge()
    {
        array_last($this->array);
    }

    public function init()
    {
        $this->array = range(1, 100);
    }
}
