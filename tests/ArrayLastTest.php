<?php

namespace Barogue\Arrays\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @covers \array_last
 *
 * @group array_last
 */
class ArrayLastTest extends TestCase
{
    public function testCursorIndependent()
    {
        $array = [1, 2, 3, 4];
        next($array);
        $this->assertSame(4, array_last($array));
    }

    public function testEmptyArrayReturnsDefault()
    {
        $array = [];
        $this->assertSame('test', array_last($array, null, 'test'));
    }

    public function testEmptyArrayReturnsNull()
    {
        $array = [];
        $this->assertSame(null, array_last($array));
    }

    public function testOneEntry()
    {
        $array = [99];
        $this->assertSame(99, array_last($array));
    }

    public function testOriginalArrayIsUntouched()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(4, array_last($array));
        $this->assertEquals([1, 2, 3, 4], $array);
    }

    public function testWithCallback()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(2, array_last($array, function ($value) {
            return $value < 3;
        }));
        $this->assertEquals([1, 2, 3, 4], $array);
    }

    public function testWithCallbackDefault()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(null, array_last($array, function ($value) {
            return $value < -100;
        }));
        $this->assertSame('test', array_last($array, function ($value) {
            return $value < -100;
        }, 'test'));
        $this->assertEquals([1, 2, 3, 4], $array);
    }
}
