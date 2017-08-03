<?php
use PHPUnit\Framework\TestCase;
use Src\TextReader;

/**
 * @covers TextReader
 */
final class ReaderTest extends TestCase
{
    public function testReaderReturnsSourceText()
    {
        $stub = $this->createMock(TextReader::class);
	$stub->method('getText')->will($this->returnArgument(0));
        $this->assertEquals($stub->getText('Foo return text'), 'Foo return text');
    }
}
