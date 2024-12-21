<?php
namespace Swilson\utilities\File;

use Exception;

function loadProperties(String $strPath, bool $bSections = false): array
{
    $properties = array();

    try {

        $bSections ? $properties = parse_ini_file($strPath, $bSections) : $properties = parse_ini_file($strPath);
    } catch (Exception $exception) {

        echo 'Error while loading properties';
    }

    return $properties;
}

function loadIniFile(String $filePath, bool $processSections = false): array
{
    if (!file_exists($filePath)) {
        throw new Exception("File not found: $filePath");
    }

    $properties = parse_ini_file($filePath, $processSections);

    if ($properties === false) {
        throw new Exception("Error parsing INI file: $filePath");
    }

    return $properties;
}

function createFileOld(String $fileName, String $content = '', String $path = ''): bool
{
    try {
        $fullPath = $path ? rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName : $fileName;

        $fileHandle = fopen($fullPath, 'w');
        if ($fileHandle === false) {
            throw new Exception("Unable to open file: $fullPath");
        }

        if (fwrite($fileHandle, $content) === false) {
            throw new Exception("Unable to write to file: $fullPath");
        }

        fclose($fileHandle);
        return true;
    } catch (Exception $exception) {
        echo 'Error while creating file: ' . $exception->getMessage();
        return false;
    }
}

function createFile(String $fileName, String $content = '', String $path = ''): bool
{
    try {
        $fullPath = $path ? rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName : $fileName;

        $mode = file_exists($fullPath) ? 'a' : 'w';
        $fileHandle = fopen($fullPath, $mode);
        if ($fileHandle === false) {
            throw new Exception("Unable to open file: $fullPath");
        }

        if (fwrite($fileHandle, $content) === false) {
            throw new Exception("Unable to write to file: $fullPath");
        }

        fclose($fileHandle);
        return true;
    } catch (Exception $exception) {
        echo 'Error while creating file: ' . $exception->getMessage();
        return false;
    }
}

function readFile(String $fileName, String $path = ''): array
{
    try {
        $fullPath = $path ? rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName : $fileName;

        if (!file_exists($fullPath)) {
            throw new Exception("File not found: $fullPath");
        }

        $contents = file($fullPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($contents === false) {
            throw new Exception("Unable to read file: $fullPath");
        }

        return $contents;
    } catch (Exception $exception) {
        echo 'Error while reading file: ' . $exception->getMessage();
        return [];
    }
}
?>