<?php

namespace Barogue\Arrays\Benchmarks;

/**
 * @BeforeMethods({"init"})
 */
class ArrayFirstKeyBench extends Bench
{
    protected array $array;

    public function benchFirstKeyCallbackEarly()
    {
        array_first_key($this->array, function ($value) {
            return $value > 0;
        });
    }

//    public function benchFirstKeyCallbackLate()
//    {
//        array_first_key($this->array, function ($value) {
//            return $value > 94;
//        });
//    }

    public function benchFirstKeyEmpty()
    {
        array_first_key([]);
    }

    public function benchFirstKeyLarge()
    {
        array_first_key($this->array);
    }

    public function init()
    {
        $this->array = range(1, 100);
    }
}
