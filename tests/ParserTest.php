<?php
use PHPUnit\Framework\TestCase;
include dirname(__FILE__) . '/../src/TextReader.php';
use Src\TextReader;
use Src\WordParser;

/**
 * @covers WordParser
 */
final class ParserTest extends TestCase
{
    public function testDivideTextIntoWords()
    {
        $reader = $this->createMock(TextReader::class);
	$reader->method('getText')->will($this->returnArgument(0));

	$parser = new WordParser($reader->getText('divide this test text in sepparate words'));
	$wordsArray = ['divide', 'this', 'test', 'text', 'in', 'sepparate', 'words'];

        $this->assertEquals($wordsArray, $parser->getWords());
    }

    public function testDivideTextWithSymbols()
    {
        $reader = $this->createMock(TextReader::class);
	$reader->method('getText')->will($this->returnArgument(0));

	$parser = new WordParser($reader->getText('This text, with symbols. "Will\' divide without the symbols!".'));
	$wordsArray = ['this', 'text', 'with', 'symbols', 'will', 'divide', 'without', 'the', 'symbols'];

        $this->assertEquals($wordsArray, $parser->getWords());
    }

    public function testDivideTextWithDoubleMinus()
    {
        $reader = $this->createMock(TextReader::class);
	$reader->method('getText')->will($this->returnArgument(0));

	$parser = new WordParser($reader->getText('Test text that includes--a double minus'));
	$wordsArray = ['test', 'text', 'that', 'includes', 'a', 'double', 'minus'];

        $this->assertEquals($wordsArray, $parser->getWords());
    }
}
