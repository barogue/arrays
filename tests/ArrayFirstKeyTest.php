<?php

namespace Barogue\Arrays\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @covers \array_first_key
 *
 * @group array_first_key
 */
class ArrayFirstKeyTest extends TestCase
{
    public function testCursorIndependent()
    {
        $array = [1, 2, 3, 4];
        next($array);
        $this->assertSame(0, array_first_key($array));
    }

    public function testEmptyArrayReturnsDefault()
    {
        $array = [];
        $this->assertSame('test', array_first_key($array, null, 'test'));
    }

    public function testEmptyArrayReturnsNull()
    {
        $array = [];
        $this->assertSame(null, array_first_key($array));
    }

    public function testOneEntry()
    {
        $array = [99];
        $this->assertSame(0, array_first_key($array));
    }

    public function testOriginalArrayIsUntouched()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(0, array_first_key($array));
        $this->assertEquals([1, 2, 3, 4], $array);
    }

    public function testWithCallback()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(3, array_first_key($array, function ($value) {
            return $value > 2;
        }));
        $this->assertEquals([1, 2, 3, 4], $array);
    }

    public function testWithCallbackDefault()
    {
        $array = [1, 2, 3, 4];
        $this->assertSame(null, array_first_key($array, function ($value) {
            return $value > 10;
        }));
        $this->assertSame('test', array_first_key($array, function ($value) {
            return $value > 10;
        }, 'test'));
        $this->assertEquals([1, 2, 3, 4], $array);
    }
}
