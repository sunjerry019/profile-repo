<?php 
	// https://www.php.net/manual/en/function.str-getcsv.php#117692
	$file = "../include/strings.csv";

    $csv = array_map('str_getcsv', file($file));

    $strings = array();

    // array_walk($csv, function(&$a) use ($csv) {});

	foreach ($csv as $key => $a) {
    	$a = array_combine($csv[0], $a);
    	$_key = array_shift($a); # get the actual key
    	print_r($a);
    	echo "<br>";
    	$strings[$_key] = $a;
    	echo "<div style='margin-left: 50px; color: red;'>";
    	print_r($strings);
    	echo "</div>";
    };
    array_shift($strings); # remove column header

    print_r($strings)
?>