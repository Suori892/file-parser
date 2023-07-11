<?php

class XmlDataWriter
{
    private string $outputFilePath;

    /**
     * @param string $outputFilePath
     */
    public function __construct(string $outputFilePath) {
        $this->outputFilePath = $outputFilePath;
    }

    /**
     * @param array $data Map with data to write in xml format
     * @return void
     * @throws DOMException
     */
    public function writeFile(array $data): void {
        if (!$this->fileExist()) {
            $this->createEmptyXmlFile();
            echo "Xml file was created\n";
        }
        $this->appendToXml($data);
    }

    /**
     * Check if file exist
     * @return bool
     */
    private function fileExist(): bool {
        return file_exists($this->outputFilePath);
    }

    /**
     * Create empty xml file with <persons> root element
     * @return void
     */
    private function createEmptyXmlFile(): void {
        $xmlContent = '<?xml version="1.0" encoding="utf-8"?><persons></persons>';
        file_put_contents($this->outputFilePath, $xmlContent);
    }

    /**
     * Add data to existing xml file
     * @param array $data
     * @return void
     * @throws DOMException
     */
    private function appendToXml(array $data): void {
        $dom = new DOMDocument();
        $dom->load($this->outputFilePath);

        $rootElement = $dom->documentElement;

        foreach ($data as $name => $birthDate) {
            $element = $dom->createElement('person');
            $element->setAttribute('name', $name);
            $element->setAttribute('birthDate', $birthDate);
            $rootElement->appendChild($element);
        }

        $dom->save($this->outputFilePath);
    }
}