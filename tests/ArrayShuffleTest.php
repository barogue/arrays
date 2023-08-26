<?php

namespace Barogue\Arrays\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @covers \array_shuffle
 *
 * @group dot
 * @group array_pull
 */
class ArrayShuffleTest extends TestCase
{
    public function testKeepKeys()
    {
        srand(1);
        $array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
        $shuffled = array_shuffle($array);
        $this->assertSame(['d' => 4, 'a' => 1, 'c' => 3, 'b' => 2], $shuffled);
        $shuffled = array_shuffle($array, true);
        $this->assertSame(['d' => 4, 'c' => 3, 'b' => 2, 'a' => 1], $shuffled);
    }

    public function testLoseKeys()
    {
        srand(1);
        $array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];
        $shuffled = array_shuffle($array, false);
        $this->assertSame([4, 1, 3, 2], $shuffled);
    }
}
