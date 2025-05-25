<?php

namespace App\Http\Controllers;

class CsvController
{
    public function indexCsv(string $csvName)
    {
        $inputFilePath = base_path('database/data/' . $csvName);
        $rows = [];

        // Read CSV data
        $inputFile = fopen($inputFilePath, 'r');
        if (!$inputFile) {
            die("Error opening file.");
        }

        $headers = fgetcsv($inputFile); // Read original headers
        array_unshift($headers, 'ID'); // Add 'ID' column
        $rows[] = $headers;

        $id = 1;
        while (($row = fgetcsv($inputFile)) !== false) {
            array_unshift($row, $id++); // Add ID at the start
            $rows[] = $row;
        }
        fclose($inputFile);

        // Overwrite the file with modified data
        $outputFile = fopen($inputFilePath, 'w');
        if (!$outputFile) {
            die("Error writing file.");
        }

        foreach ($rows as $row) {
            fputcsv($outputFile, $row);
        }
        fclose($outputFile);
    }

    public function formatCsvIdentifiers(string $csvName)
    {
        $filePath = base_path('database/data/' . $csvName);
        $rows = [];

        // Read CSV data
        $inputFile = fopen($filePath, 'r');
        if (!$inputFile) {
            die("Error opening file.");
        }

        $headers = fgetcsv($inputFile); // Read headers
        // Format headers: replace hyphens with spaces and capitalize words
        $headers = array_map(fn($header) => ucwords(str_replace('_', ' ', $header)), $headers);
        $rows[] = $headers; // Store formatted headers

        while (($row = fgetcsv($inputFile)) !== false) {
            // Modify the identifier column (index 1)
            $row[1] = ucwords(str_replace('-', ' ', $row[1])); // Replace hyphens and capitalize words
            // $row[2] = ucwords(str_replace('-', ' ', $row[2]));
            $rows[] = $row;
        }
        fclose($inputFile);

        // Overwrite the file with formatted data
        $outputFile = fopen($filePath, 'w');
        if (!$outputFile) {
            die("Error writing file.");
        }

        foreach ($rows as $row) {
            fputcsv($outputFile, $row);
        }
        fclose($outputFile);
    }
}
