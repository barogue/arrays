<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayPopManyBench extends Bench
{
    protected array $array;
    protected array $empty;

    public function benchPopManyEmpty()
    {
        array_pop_many($this->empty, 10);
    }

    public function benchPopManyOne()
    {
        array_pop_many($this->array, 1);
    }

    public function benchPopManyTwenty()
    {
        array_pop_many($this->array, 20);
    }

    public function init()
    {
        $this->empty =[];
        $this->array = range(1, 100);
    }
}
