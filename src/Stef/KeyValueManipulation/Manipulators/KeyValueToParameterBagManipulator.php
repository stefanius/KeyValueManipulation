<?php

namespace Stef\KeyValueManipulation\Manipulators;


use Symfony\Component\HttpFoundation\ParameterBag;

class KeyValueToParameterBagManipulator extends KeyValueToArrayManipulator {

    /**
     * @param $string
     * @return ParameterBag
     */
    protected function run($string)
    {
        return $this->convertStringToParameterBag($string);
    }

    /**
     * @param $string
     * @return ParameterBag
     */
    protected function convertStringToParameterBag($string)
    {
        $array = $this->convertStringToArray($string);
        $bag = new ParameterBag($array);

        return $bag;
    }
} 