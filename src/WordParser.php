<?php
namespace Src;

class WordParser {

    protected $text;

    protected $words;

    public function __construct($text) {
        $this->text = $text;
	$this->parse();
    }

    protected function parse() {
        $this->words = preg_split('/((^\p{P}+)|(\p{P}*\s+\p{P}*)|(\p{P}+$))/', str_replace('--', ' ', $this->text), -1, PREG_SPLIT_NO_EMPTY);
        foreach ($this->words as $key => $word) {
            $this->words[$key] = strtolower($word);
        }
    }

    public function getWords() {
        return $this->words;
    }
}
