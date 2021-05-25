<?php

function printMinimumProduct($arr, $n) {
     
    $first_min = min($arr[0], $arr[1]);
    $second_min = max($arr[0], $arr[1]);
 
    for ($i = 2; $i < $n; $i++)
    {
        if ($arr[$i] < $first_min) {
            $second_min = $first_min;
            $first_min = $arr[$i];
        } else if ($arr[$i] < $second_min) {
            $second_min = $arr[$i];
    }
 
    return $first_min * $second_min;
}
 
// Driver Code
$a = array(8,16,20,28,36,40);
$n = sizeof($a);
echo(printMinimumProduct($a, $n));
 
?>
