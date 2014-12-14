<?php

namespace Stef\KeyValueManipulation\Manipulators;


class KeyValueToArrayManipulator extends AbstractKeyValueManipulator {

    /**
     * @param $string
     * @return array
     */
    protected function run($string)
    {
        return $this->convertStringToArray($string);
    }

    /**
     * @param $string
     * @return array
     */
    protected function convertStringToArray($string)
    {
        $kv = [];
        $lines = $this->splitTextBlockIntoLines($string);

        foreach ($lines as $line) {
            $pair = $this->splitLineIntoKeyValuePair($line);

            if (is_array($pair) && array_key_exists('key', $pair) && array_key_exists('value', $pair) ) {
                $kv[$pair['key']] = $pair['value'];
            }
        }

        return $kv;
    }
} 