<?php namespace WordNet;

class Noun implements WordInterface
{
    /**
     * Word
     * 
     * @var string
     */
    protected $word;

    public function __construct($word)
    {
        $this->word = (string) $word;
    }

    public function __toString()
    {
        return $this->word;
    }

    public function getType()
    {
        return WordInterface::NOUN;
    }

    public function getWord()
    {
        return $this->word;
    }
}
