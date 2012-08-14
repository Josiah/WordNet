<?php namespace WordNet;

/**
 * Word Interface
 *
 * Abstract interface for all words that can be searched using wordnet.
 *
 * @author Josiah <josiah.truasheim@gmail.com>
 */
interface WordInterface
{
    const NOUN = 'n';

    const VERB = 'v';

    const ADJECTIVE = 'a';

    const ADVERB = 'r';

    /**
     * Gets the word
     * 
     * @return string
     */
    function getWord();

    /**
     * Gets the type of the word
     *
     * Must be one of:
     *  - WordInterface::NOUN
     *  - WordInterface::VERB
     *  - WordInterface::ADJECTIVE
     *  - WordInterface::ADVERB
     * 
     * @return string
     */
    function getType();
}
