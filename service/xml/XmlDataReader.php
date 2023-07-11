<?php
class XmlDataReader
{
    private DOMDocument $xml;
    private string $filePath;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath) {
        $this->xml = new DOMDocument();
        $this->filePath = $filePath;
    }

    /**
     * Reads data from xml file and returns it as a map
     * @return array The data read from the xml file
     */
    public function readFile() : array {
        $data = [];

        $this->xml->load($this->filePath);
        $rootElement = $this->xml->documentElement;

        //Set first person data to array
        $childElement = $rootElement->firstElementChild;
        $data[$this->getKey($childElement)] = $childElement->getAttribute("birthDate");

        //Iterate through other persons
        for ($i = 1; $i < $rootElement->childElementCount; $i++) {
            $childElement = $childElement->nextElementSibling;
            $data[$this->getKey($childElement)] = $childElement->getAttribute("birthDate");
        }

        return $data;
    }

    /**
     * Generates a key using the "name" and "surname" attributes of an Xml element
     * @param DOMElement $element
     * @return string
     */
    private function getKey(DOMElement $element): string {
        $name = $element->getAttribute("name");
        $surname = $element->getAttribute("surname");
        return $name . " " . $surname;
    }
}