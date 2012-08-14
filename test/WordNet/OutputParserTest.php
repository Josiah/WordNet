<?php namespace WordNet;

use PHPUnit_Framework_TestCase as TestCase;

class SynonymOutputParserTest extends TestCase
{
    public function testParseSynonymsFull()
    {
        $text = <<<EOF

Synonyms/Hypernyms (Ordered by Estimated Frequency) of noun home

9 senses of home                                                        

Sense 1
home, place -- (where you live at a particular time; "deliver the package to my home"; "he doesn't have a home to go to"; "your place or mine?")
       => residence, abode -- (any address at which you dwell more than temporarily; "a person can have several residences")

Sense 2
dwelling, home, domicile, abode, habitation, dwelling house -- (housing that someone is living in; "he built a modest dwelling near the pond"; "they raise money to provide homes for the homeless")
       => housing, lodging, living accommodations -- (structures collectively in which people are housed)

Sense 3
home -- (the country or state or city where you live; "Canadian tariffs enabled United States lumber companies to raise prices at home"; "his home is New Jersey")
       => location -- (a point or extent in space)

Sense 4
home plate, home base, home, plate -- ((baseball) base consisting of a rubber slab where the batter stands; it must be touched by a base runner in order to score; "he ruled that the runner failed to touch home")
       => base, bag -- (a place that the runner must touch before scoring; "he scrambled to get back to the bag")

Sense 5
base, home -- (the place where you are stationed and from which missions start and end)
       => location -- (a point or extent in space)

Sense 6
home -- (place where something began and flourished; "the United States is the home of basketball")
       => beginning, origin, root, rootage, source -- (the place where something begins, where it springs into being; "the Italian beginning of the Renaissance"; "Jupiter was the origin of the radiation"; "Pittsburgh is the source of the Ohio River"; "communism's Russian root")

Sense 7
home -- (an environment offering affection and security; "home is where the heart is"; "he grew up in a good Christian home"; "there's no place like home")
       => environment -- (the totality of surrounding conditions; "he longed for the comfortable environment of his living room")

Sense 8
family, household, house, home, menage -- (a social unit living together; "he moved his family to Virginia"; "It was a good Christian household"; "I waited until the whole house was asleep"; "the teacher asked how many people made up his home")
       => unit, social unit -- (an organization regarded as part of a larger social group; "the coach said the offensive unit did a good job"; "after the battle the soldier had trouble rejoining his unit")

Sense 9
home, nursing home, rest home -- (an institution where people are cared for; "a home for the elderly")
       => institution -- (an establishment consisting of a building or complex of buildings where an organization for the promotion of some cause is situated)

EOF;

        $parser = new OutputParser();
        $result = $parser->parse($text);

        $this->assertEquals("Synonyms/Hypernyms (Ordered by Estimated Frequency)", $result->getDescription());
        $this->assertEquals("home", $result->getWord());
        $this->assertInstanceOf("WordNet\Noun", $result->getWord());
    }
}
