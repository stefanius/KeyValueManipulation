<?php

namespace Stef\KeyValueManipulation\Tests\Manipulators;

use Stef\KeyValueManipulation\Manipulators\KeyValueToArrayManipulator;

class KeyValueToArrayManipulatorTest extends \PHPUnit_Framework_TestCase{

    /**
     * @dataProvider provider
     *
     * @param $kvDelim
     * @param $lDelim
     * @param $input
     * @param $expected
     */
    public function testKeyValueToArray($kvDelim, $lDelim, $input, $expected) {
        $manipulator = new KeyValueToArrayManipulator($kvDelim, $lDelim);

        $result = $manipulator->manipulate($input);

        $this->assertCount(count($expected), $result);

        $this->assertEquals($expected, $result);
    }

    public function provider() {
        $block1 = "name:Bill;sex:M;city:Houston;married:TRUE";
        $result1 = [
            'name' => 'Bill',
            'sex' => 'M',
            'city' => 'Houston',
            'married' => true
        ];

        return [
            [":", ';', $block1, $result1],
        ];
    }
}
