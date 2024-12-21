<?php
require_once '../File/FileUtilities.php';
require_once '../Constants/AppConstants.php';
require_once '../DirUtils/DirUtils.php';

use function TestComposerFunctions\File\FileUtils\loadProperties;
use function TestComposerFunctions\File\FileUtils\getProjectDir;

use TestComposerFunctions\Constants\AppConstants;

use function TestComposerFunctions\DirUtils\DirUtils\createProjectDir;
use function TestComposerFunctions\File\FileUtils\createFile;
use function TestComposerFunctions\File\FileUtils\readFile;

$array_t = loadProperties(getProjectDir() . DIRECTORY_SEPARATOR . AppConstants::getPropertiesDir() . DIRECTORY_SEPARATOR . AppConstants::getUtilityIniFile());

echo 'test';

echo '</br>';

//print_r($array_t);

echo '</br>';

// print_r( $array_t['mysql']);

echo '</br>';

// echo $array_t['mysql']['db_name'];

echo getProjectDir();

echo '</br>';

// createProjectDir('log');
$message = 'test message new'."\n";


createFile('testLog.log', $message, getProjectDir() . DIRECTORY_SEPARATOR . AppConstants::getPropertiesDir());

createFile('testLog.txt', $message, getProjectDir() . DIRECTORY_SEPARATOR . AppConstants::getPropertiesDir());

//$contents = readFile('testLog.log', getProjectDir());

//print_r($contents);

echo '</br>'.'from: '. getProjectDir() . DIRECTORY_SEPARATOR . AppConstants::getPropertiesDir();

echo '</br>';

echo '</br>';

$contents = readFile('testLog.log1', getProjectDir() . DIRECTORY_SEPARATOR . AppConstants::getPropertiesDir());

echo '</br>';

print_r($contents);

echo '</br>';

?>