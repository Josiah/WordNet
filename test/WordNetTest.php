<?php

use PHPUnit_Framework_TestCase as TestCase;
use WordNet\Noun;

class WordNetTest extends TestCase
{
    public function testDefinition()
    {
        $wordnet = new WordNet();

        $definition = $wordnet->definition(new Noun("home"));

        $this->assertEquals('where you live at a particular time', $definition, '->definition() returns the correct definition');
    }
}
