<?php

use WordNet\WordInterface;
use WordNet\OutputParser;
use Symfony\Component\Process\ProcessBuilder;

class WordNet
{
    /**
     * WordNet Execuatble Path
     * 
     * @var string
     */
    protected $executable = "wordnet";

    /**
     * Output Parser
     * 
     * @var OutputParser
     */
    protected $parser;

    public function __construct()
    {
        $this->parser = new OutputParser();
    }

    public function definition(WordInterface $word)
    {
        $process = (new ProcessBuilder())
            ->add($this->executable)
            ->add($word->getWord())
            ->add('-n1')
            ->add('-g')
            ->add('-syns'.$word->getType())
            ->getProcess();

        if (!$process->run()) {
            throw new \RuntimeException("Couldn't find a definition for {$word}");
        }

        $synset = $this->parser->parse($process->getOutput())->getSynset(1);

        return $synset->getDefinition();
    }

    public function domainTerms(WordInterface $word)
    {
        $this->search($word, "domn{$word->getType()}");
    }
}
