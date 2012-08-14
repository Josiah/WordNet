<?php namespace WordNet;

/**
 * WordNet Output Parser
 *
 * Parses the output of wordnet commands into their appropriate derived forms.
 *
 * @author Josiah <josiah.truasheim@gmail.com>
 */
class OutputParser
{
    public function parse($output)
    {
        $output    = str_replace(["\r\n", "\r"], "\n", $output);
        $synset    = null;
        $result    = new Result();
        $wordClass = null;

        foreach (explode("\n", $output) as $line) {
            if (!$line) continue;

            if (preg_match("/^Sense (\d+)$/", $line, $matches)) {
                $result->addSynset($matches[1], $synset = new Synset());
            }

            if (is_null($synset)) {
                if (preg_match("/(.*) of (noun|verb|adj|adv) (\w+)$/", $line, $matches)) {
                    $result->setDescription($matches[1]);

                    switch ($matches[2]) {
                        case 'noun': $wordClass = 'WordNet\Noun'; break;
                    }

                    $result->setWord(new $wordClass($matches[3]));
                }
            } else {
                if (preg_match("/(\w+(?:, \w+)*)(?: -- \((.*)\))?/", $line, $matches)) {
                    foreach (explode(', ', $matches[1]) as $word) {
                        $synset->addWord(new $wordClass($word));
                    }

                    if (isset($matches[2])) {
                        foreach (explode("; ", $matches[2]) as $glossary) {
                            if (substr($glossary, 0, 1) === '"') {
                                $synset->addExample(substr($glossary, 1, -1));
                            } else {
                                $synset->addDefinition($glossary);
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }
}
