<?php namespace Wordnet;

/**
 * Synset
 *
 * Cognative synonym of a word.
 *
 * @author Josiah <josiah.truasheim@gmail.com>
 */
class Synset
{
    /**
     * Words in this synset
     * 
     * @var string
     */
    protected $words = [];

        /**
         * Gets the words in this synset
         * 
         * @return string
         */
        public function getWords()
        {
            return $this->words;
        }

        /**
         * Adds a new word to this synset definition
         * 
         * @param WordInterface $word Word
         */
        public function addWord(WordInterface $word)
        {
            $this->words[] = $word;

            return $this;
        }

    /**
     * Definitions of this synset
     * 
     * @var array
     */
    protected $definitions = [];

        /**
         * Gets the definition for this synset
         * 
         * @return string
         */
        public function getDefinition()
        {
            if (!empty($this->definitions)) {
                return $this->definitions[0];
            } else {
                return null;
            }
        }

        /**
         * Adds a definition of this synset
         * 
         * @param string $definition Definition
         */
        public function addDefinition($definition)
        {
            $this->definitions[] = $definition;
        }

    /**
     * Example usage for this synset
     * 
     * @var array
     */
    protected $examples = [];

        /**
         * Gets the example usage for this synset
         * 
         * @return string
         */
        public function getExamples()
        {
            return $this->examples;
        }

        /**
         * Adds example usage of this synset
         * 
         * @param string $example Example
         */
        public function addExample($example)
        {
            $this->examples[] = $example;
        }
}
