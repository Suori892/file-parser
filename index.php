<?php

require_once "service/xml/XmlDataReader.php";
require_once "service/xml/XmlDataWriter.php";
require_once "service/json/JsonDataReader.php";
require_once "service/json/JsonDataWriter.php";

//first xml task
$inputXmlPath = 'data/xml/input/persons.xml';
$outputXmlPath = 'data/xml/output/persons.xml';

$xmlReader = new XmlDataReader($inputXmlPath);
$xmlWriter = new XmlDataWriter($outputXmlPath);

$xmlArr = $xmlReader->readFile();

$xmlWriter->writeFile($xmlArr);

//second json + xml task
$inputJsonPath = 'data/json/input';
$outputXmlStatsPath = 'data/json/output';

$jsonReader = new JsonDataReader($inputJsonPath);
$jsonWriter = new JsonDataWriter($outputXmlStatsPath);

$arr = $jsonReader->readAndSortData();

$jsonWriter->writeStatistics($arr);