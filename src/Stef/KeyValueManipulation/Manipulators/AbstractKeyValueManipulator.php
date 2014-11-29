<?php

namespace Stef\KeyValueManipulation\Manipulators;

use Stef\KeyValueManipulation\Exception\WrongDelimiterException;
use Stef\Manipulation\Manipulators\AbstractStringManipulator;

abstract class AbstractKeyValueManipulator extends AbstractStringManipulator{

    /**
     * @var string
     */
    protected $lineDelimiter;

    /**
     * @var string
     */
    protected $keyValueDelimiter;

    function __construct($keyValueDelimiter, $lineDelimiter)
    {
        $this->keyValueDelimiter = $keyValueDelimiter;
        $this->lineDelimiter = $lineDelimiter;
    }

    /**
     * @param $textblock
     * @return array
     */
    protected function splitTextBlockIntoLines($textblock)
    {
        return explode($this->lineDelimiter, $textblock);
    }

    /**
     * @param $line
     * @return array
     */
    protected function splitLineIntoKeyValuePair($line)
    {
        $pair = explode($this->keyValueDelimiter, $line);

        if (count($pair) !== 2) {
            throw new WrongDelimiterException("Just make a message for this ;)");
        }

        $key = trim($pair[0]);
        $val = trim($pair[1]);

        return ['key' => $key, 'value' => $val];
    }
}