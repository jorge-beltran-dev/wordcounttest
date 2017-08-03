<?php
include 'src/TextReader.php';
include 'src/WordCounter.php';
use Src\TextReader;
use Src\WordCounter;

$counter = new WordCounter(new TextReader($argv[2]));
$count = $counter->getCount($argv[1]);
foreach ($count as $word => $number) {
    echo "$word,$number" . "\n";
}
