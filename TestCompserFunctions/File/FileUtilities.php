<?php
namespace TestComposerFunctions\File\FileUtils;

use Exception;

function loadProperties(String $strPath, bool $bSections = false): array
{
    $properties = array();

    try {
        if (@parse_ini_file($strPath)) {
            $bSections ? $properties = parse_ini_file($strPath, $bSections) : $properties = parse_ini_file($strPath);
        } else {
            throw new Exception('Missing file :: ' . $strPath);
        }
    } catch (Exception $exception) {

        die($exception->getMessage());
    } finally {

        return $properties;
    }
}

function getProjectDir(): string
{
    return dirname(__FILE__, 2);
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