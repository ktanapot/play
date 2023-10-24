<?php

set_time_limit(999); //Maximum execution time of 999 seconds exceeded
// Define the filename for the text file
$filename = 'numbers.txt';

// Open the file for writing (creates a new file or overwrites an existing one)
$file = fopen($filename, 'w');

if ($file) {
    for ($i = 0; $i <= 9999999999; $i++) {  //9999999999
        // Format the number as a 10-digit string with leading zeros
        $number = str_pad($i, 10, '0', STR_PAD_LEFT);

        // Write the formatted number to the file
        fwrite($file, $number . PHP_EOL);
    }

    // Close the file
    fclose($file);

    echo "Numbers generated and saved to $filename.";
} else {
    echo "Error: Unable to open the file for writing.";
}
?>