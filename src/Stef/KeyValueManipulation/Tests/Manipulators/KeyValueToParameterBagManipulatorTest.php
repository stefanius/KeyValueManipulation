<?php

namespace Stef\KeyValueManipulation\Tests\Manipulators;

use Stef\KeyValueManipulation\Manipulators\KeyValueToParameterBagManipulator;
use Symfony\Component\HttpFoundation\ParameterBag;

class KeyValueToParameterBagManipulatorTest extends \PHPUnit_Framework_TestCase{

    /**
     * @dataProvider provider
     *
     * @param $kvDelim
     * @param $lDelim
     * @param $input
     * @param $expected
     */
    public function testKeyValueToArray($kvDelim, $lDelim, $input, ParameterBag $expected) {
        $manipulator = new KeyValueToParameterBagManipulator($kvDelim, $lDelim);

        $result = $manipulator->manipulate($input);

        $this->assertEquals($expected->count(), $result->count(), "The number of key/value elements is not the same.");

        $this->assertEquals($expected, $result);
    }

    public function provider() {
        $block1 = "name:Bill;sex:M;city:Houston";
        $bag1 = new ParameterBag();
        $bag1->set('name', 'Bill');
        $bag1->set('sex', 'M');
        $bag1->set('city', 'Houston');

        return [
            [":", ';', $block1, $bag1],
        ];
    }
}
