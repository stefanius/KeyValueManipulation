<?php

namespace Stef\KeyValueManipulation\Manipulators;

class KeyValueToJsonManipulator extends KeyValueToArrayManipulator
{
    /**
     * @param $string
     * @return array|string
     */
    protected function run($string)
    {
        return $this->convertStringToJson($string);
    }

    /**
     * @param $string
     * @return string
     */
    protected function convertStringToJson($string)
    {
        $array = $this->convertStringToArray($string);

        return json_encode($array);
    }
} 