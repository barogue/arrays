<?php

namespace Barogue\Arrays\Tests;

use function array_pull;
use PHPUnit\Framework\TestCase;

/**
 * @covers \array_pop_many
 *
 * @group array_pop_many
 */
class ArrayPopManyTest extends TestCase
{
    public function testLessThanOnePops()
    {
        $array = [1, 2, 3, 4, 5];
        $popped = array_pop_many($array, 0);
        $this->assertSame(null, $popped);
        $this->assertSame([1, 2, 3, 4, 5], $array);
    }

    public function testMoreThanArray()
    {
        $array = [1, 2, 3];
        $popped = array_pop_many($array, 5);
        $this->assertSame([3, 2, 1, null, null], $popped);
        $this->assertSame([], $array);
    }
}
