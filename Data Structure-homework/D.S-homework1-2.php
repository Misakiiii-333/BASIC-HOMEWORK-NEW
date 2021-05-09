<?php
$cal = array(13,4,8,14,1);

$min = $cal[0];
$max = $cal[0];
$sum = 0;
$avg = 0;
$cnt = count($cal);

for ($i = 0; $i < $cnt; $i++) {
    $sum += $cal[$i];

    if ($min > $cal[$i]) {
        $min = $cal[$i];
    }
    if ($max < $cal[$i]) {
        $max = $cal[$i];
    }
}

$avg = $sum / $cnt;

echo "average is".$avg."\n";
echo "sum is".$sum."\n";
echo "min is".$min."\n";
echo "max is".$max."\n";
?>
