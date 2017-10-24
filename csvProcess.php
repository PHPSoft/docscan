<?php
/**
 * Created for making life easier with scanniingn staff */


/**

TODO:
- Show interface text field where scanned sctring will be placed
- Check string in the field and run search throgh array of lines in CSV-to-array associative array
- once line read (beep) make ajax call to compare new string to asoc array column
- When found add entered param in the form: pallet number
- return to empty form (keep palet number until changed or reset)
 */

$file = "data.csv";

$csv = array_map('str_getcsv', file($file));

var_dump("data: ", $file);

array_walk($csv, function(&$a) use ($csv) {
    $a = array_combine($csv[0], $a);
});
array_shift($csv); # remove column header


echo "<pre>";
var_dump($_GET['q'], $_GET['p']);
echo "</pre>";

