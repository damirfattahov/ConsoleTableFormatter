<?php

require_once('TableFormatter.php');

$path = './storage/data.json';
if ( ! file_exists($path)) {
	throw new Exception('Отсутствует файл с данными.');
}

$i         = 0;
$header    = '';
$data      = json_decode(file_get_contents($path), true);
$formatter = new TableFormatter($data);

foreach ($data as $item) {
	echo $formatter->getTableLine();
	echo $formatter->getRow($item);
	echo count($data) - 1 === $i ++ ? $formatter->getTableLine() : false;
}