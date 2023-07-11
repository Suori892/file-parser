<?php

class JsonDataWriter
{
    private string $outputDirectory;

    /**
     * @param string $outputDirectory
     */
    public function __construct(string $outputDirectory) {
        $this->outputDirectory = $outputDirectory;
    }

    /**
     * Make xml structure of violations
     * @param array $violationStats
     * @return void
     */
    public function writeStatistics(array $violationStats): void {
        $xml = new SimpleXMLElement('<violations></violations>');

        //Make xml file structure
        foreach ($violationStats as $type => $amount) {
            $violation = $xml->addChild('violation');
            $violation->addChild('type', $type);
            $violation->addChild('amount', $amount);
        }

        $this->insertXmlData($xml);
    }

    /**
     * Create and insert xml to output file
     * @param SimpleXMLElement $xml
     * @return void
     */
    private function insertXmlData(SimpleXMLElement $xml): void {
        $outputFilePath = $this->outputDirectory . '/output.xml';
        file_put_contents($outputFilePath, $xml->asXML());
        echo "Statistics written to " . $outputFilePath . "\n";
    }
}