<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayShiftManyBench extends Bench
{
    protected array $array;
    protected array $empty;

    public function benchShiftManyEmpty()
    {
        array_shift_many($this->empty, 10);
    }

    public function benchShiftManyOne()
    {
        array_shift_many($this->array, 1);
    }

    public function benchShiftManyTwenty()
    {
        array_shift_many($this->array, 20);
    }

    public function init()
    {
        $this->empty =[];
        $this->array = range(1, 100);
    }
}
