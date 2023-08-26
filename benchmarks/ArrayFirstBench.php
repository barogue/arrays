<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayFirstBench extends Bench
{
    protected array $array;
    protected array $empty;

    public function benchFirstCallbackOne()
    {
        array_first($this->array, function ($value) {
            return $value >= 1;
        });
    }

    public function benchFirstCallbackThree()
    {
        array_first($this->array, fn ($value) => $value >= 3);
    }

    public function benchFirstEmpty()
    {
        array_first($this->empty);
    }

    public function benchFirstLarge()
    {
        array_first($this->array);
    }

    public function init()
    {
        $this->empty = [];
        $this->array = range(1, 100);
    }
}
