<?php
$cal = [[5, 12, 17, 9, 13], [13, 4, 8, 14, 1], [9, 5, 3, 17, 21]];

$min = $cal[0][0];
$max = $cal[0][0];
$sum = 0;
$avg = 0;
$cnt = count($cal);

// Loop through 2-dimention array
foreach ($cal as $row) {
    // Loop through each row
    foreach ($row as $elm) {
        // add element so tum
        $sum += $elm;

        // check min element
        if ($min > $elm) {
            $min = $elm;
        }

        // check max element
        if ($max < $elm) {
            $max = $elm;
        }
    }
}

$avg = $sum / $cnt;
?>

