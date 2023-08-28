<?php

namespace Barogue\Arrays\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @covers \array_shift_many
 *
 * @group array_shift_many
 */
class ArrayShiftManyTest extends TestCase
{
    public function testLessThanOneShifts()
    {
        $array = [1, 2, 3, 4, 5];
        $shifted = array_shift_many($array, 0);
        $this->assertSame(null, $shifted);
        $this->assertSame([1, 2, 3, 4, 5], $array);
    }

    public function testMoreThanArray()
    {
        $array = [1, 2, 3];
        $shifted = array_shift_many($array, 5);
        $this->assertSame([1, 2, 3, null, null], $shifted);
        $this->assertSame([], $array);
    }

    public function testNormalUsage()
    {
        $array = [1, 2, 3, 4, 5, 6];
        $shifted = array_shift_many($array, 3);
        $this->assertSame([1, 2, 3], $shifted);
        $this->assertSame([4, 5, 6], $array);
    }
}
