<?php
//Lets define some useful variables
// --- NOTE: PATHS NEED TRAILING SLASH ---
$cssPath = './';

if (isset($_GET['q'])) {
 $files = $_GET['q'];
 // Got the array of files!

 //Lets just make sure that the files don't contain any nasty characters.
 foreach ($files as $key => $file) {
  $files[$key] = str_replace(array('/', '\\', '.'), '', $file);
 }

 $cssData = '';
 foreach ($files as $file) {
  $cssFileName = $cssPath . $file . '.css';
  $fileHandle = fopen($cssFileName, 'r');
  $cssData .= "\n" . fread($fileHandle, filesize($cssFileName));
  fclose($fileHandle);
 }
}

// Tell the browser that we have a CSS file and send the data.
header("Content-type: text/css");
if (isset($cssData)) {
 echo $cssData;
 echo "\n\n// Generated: " . date("r");
} else {
 echo "// Files not avalable or no files specified.";
}
?>