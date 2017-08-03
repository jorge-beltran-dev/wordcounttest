<?php
use PHPUnit\Framework\TestCase;
include dirname(__FILE__) . '/../src/TextReader.php';
use Src\TextReader;
use Src\WordCounter;

/**
 * @covers WordCounter
 */
final class ParserTest extends TestCase
{
    public function testCountMostRepeatedWords()
    {
        $reader = $this->createMock(TextReader::class);
	$reader->method('getText')->willReturn('the most common word is the "the" word. the it is the word');

        $counter = new WordCounter($reader);
        $wordCount = ['the' => 5, 'word' => 3, 'is' => 2];

        $this->assertEquals($wordCount, $counter->getCount(3));
    }

    public function testCountMostRepeatedWordsCI()
    {
        $reader = $this->createMock(TextReader::class);
	$reader->method('getText')->willReturn('The most common Word is the "The" word. the it IS the Word');

        $counter = new WordCounter($reader);
        $wordCount = ['the' => 5, 'word' => 3, 'is' => 2];

        $this->assertEquals($wordCount, $counter->getCount(3));
    }
}
