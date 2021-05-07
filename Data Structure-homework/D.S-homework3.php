<?php
$cal = [[5, 12, 17, 9, 13], [13, 4, 8, 14, 1], [9, 5, 3, 17, 21]];

$min = $cal[0][0];
$max = $cal[0][0];
$sum = 0;
$avg = 0;
$cnt = count($cal);

foreach ($cal as $row) {
    
    foreach ($row as $elm) {
        $sum += $elm;
        
        if ($min > $elm) {
            $min = $elm;
        }
        
        if ($max < $elm) {
            $max = $elm;
        }
    }
}

$avg = $sum / $cnt;
?>

