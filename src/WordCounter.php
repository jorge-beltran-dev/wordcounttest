<?php
namespace Src;

include 'WordParser.php';
use Src\WordParser;

class WordCounter {

    protected $reader = null;

    protected $parser = null;

    public function __construct($reader) {
        $this->reader = $reader; 
    }

    protected function initParser() {
        $this->parser = new WordParser($this->reader->getText());
    }

    public function getCount($topWords) {
        $this->initParser();
	$words = $this->parser->getWords();
        return $this->getTopCountWords($topWords, $words);
    }

    protected function getTopCountWords($topWords, $words) {
        $countedWords = [];
        foreach ($words as $word) {
            if (!isset($countedWords[$word])) {
                $countedWords[$word] = 1;
            } else {
                $countedWords[$word]++;
            }
        }
	arsort($countedWords);
	return array_slice($countedWords, 0, $topWords);
    }
}
