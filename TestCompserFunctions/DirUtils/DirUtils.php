<?php
namespace TestComposerFunctions\DirUtils\DirUtils;

use Exception;

function getProjectDir(): string
{
    return dirname(__FILE__, 2);
}

function createProjectDir(string $dirName)
{
    $isDirCreated = false;

    try {

        if (is_dir($dirName)) {
            $isDirCreated = mkdir($dirName, 0777);
        }

        if (! $isDirCreated) {
            throw new Exception('Failed to create dir :: ' . $dirName);
        }
    } catch (Exception $exception) {

        die($exception->getMessage());
    }
}