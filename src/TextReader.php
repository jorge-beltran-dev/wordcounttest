<?php
namespace Src;

class TextReader {

    protected $source;

    protected $text;

    public function __construct($source) {
        $this->source = $source;
	$this->readText();
    }

    protected function readText() {
        $this->text = file_get_contents($this->source);
    }

    public function getText() {
        return $this->text;
    }
}
