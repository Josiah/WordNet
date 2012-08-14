<?php namespace WordNet;

/**
 * WordNet Result Class
 *
 * @author Josiah <josiah@web-dev.com.au>
 */
class Result
{
    /**
     * Description provided by WordNet for this result
     * 
     * @var string
     */
    protected $description;
    
        /**
         * Sets result description
         * 
         * @return string
         */
        public function getDescription()
        {
            return $this->description;
        }
    
        /**
         * Gets result description
         *
         * @param string $description Description provided by WordNet for this
         * result
         *
         * @return $this
         */
        public function setDescription($description)
        {
            $this->description = (string) $description;
    
            return $this;
        }

    /**
     * Word searched for
     * 
     * @var WordInterface
     */
    protected $word;
    
        /**
         * Sets the word searched for
         * 
         * @return WordInterface
         */
        public function getWord()
        {
            return $this->word;
        }
    
        /**
         * Gets the word searched for
         *
         * @param WordInterface $word Word searched for
         *
         * @return $this
         */
        public function setWord(WordInterface $word)
        {
            $this->word = $word;
    
            return $this;
        }

    /**
     * Synsets in the result
     * 
     * @var Synset[]
     */
    protected $synsets;

        /**
         * Adds a synset to this result
         * 
         * @param integer $number Synset number
         * @param Synset $synset Synset
         */
        public function addSynset($number, Synset $synset)
        {
            $this->synsets[(int) $number] = $synset;
        }

        public function getSynset($number)
        {
            $number = (int) $number;
            if (array_key_exists($number, $this->synsets)) {
                return $this->synsets[$number];
            } else {
                return null;
            }
        }
}
