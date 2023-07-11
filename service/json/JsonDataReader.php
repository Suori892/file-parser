<?php

class JsonDataReader
{
    private string $inputDirectory;

    /**
     * @param string $inputDirectory
     */
    public function __construct(string $inputDirectory) {
        $this->inputDirectory = $inputDirectory;
    }

    /**
     * Reads data from JSON files in the input directory
     * and returns sorted an array with total fine amounts.
     * @return array
     */
    public function readAndSortData(): array {
        $files = $this->getFilesFromDirectory();
        $violationStats = [];

        foreach ($files as $file) {

            $filePath = $this->inputDirectory . '/' . $file;

            // Read the file contents
            $fileContents = file_get_contents($filePath);

            // Decode the file contents as JSON
            $data = json_decode($fileContents, true);

            // Step 2: Calculate violation statistics
            foreach ($data as $violation) {
                $type = $violation['type'];
                $fineAmount = floatval($violation['fine_amount']);

                if (isset($violationStats[$type])) {
                    $violationStats[$type] += $fineAmount;
                } else {
                    $violationStats[$type] = $fineAmount;
                }
            }
        }

        arsort($violationStats);

        return $violationStats;
    }

    /**
     * Retrieves the list of files from the input directory.
     * @return array|false The list of files
     */
    private function getFilesFromDirectory(): array {
        $files = scandir($this->inputDirectory);
        return array_diff($files, ['.', '..']);
    }
}