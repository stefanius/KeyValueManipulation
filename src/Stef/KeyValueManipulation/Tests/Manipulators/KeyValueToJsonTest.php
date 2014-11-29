<?php

namespace Stef\KeyValueManipulation\Tests\Manipulators;

use Stef\KeyValueManipulation\Manipulators\KeyValueToJsonManipulator;

class KeyValueToJsonTest extends \PHPUnit_Framework_TestCase{

    /**
     * @dataProvider provider
     *
     * @param $kvDelim
     * @param $lDelim
     * @param $input
     * @param $expected
     */
    public function testKeyValueToArray($kvDelim, $lDelim, $input, $expected) {
        $manipulator = new KeyValueToJsonManipulator($kvDelim, $lDelim);

        $result = $manipulator->manipulate($input);

        $this->assertJson($result);
        $this->assertEquals($expected, $result);
    }

    public function provider() {
        $block1 = "name:Bill;sex:M;city:Houston";

        return [
            [":", ';', $block1, '{"name":"Bill","sex":"M","city":"Houston"}'],
        ];
    }
}
