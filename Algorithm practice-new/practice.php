<?php
/**
* Given two arrays of integers, computes the pair of values with the smallest (non-negative) 
* difference (one value for each array). Return the difference.
**/
function printMinimumProduct($arr, $n) {
     
    // Initialize the first and second minimum values. Assume that the array has at least two elements.
    $first_min = min($arr[0], $arr[1]);
    $second_min = max($arr[0], $arr[1]);
 
    //Scan the rest of the array and track down the two smallest elements
     
    for ($i = 2; $i < $n; $i++) {
        if ($arr[$i] < $first_min) {
            $second_min = $first_min;
            $first_min = $arr[$i];
        } else if ($arr[$i] < $second_min) {
            $second_min = $arr[$i];
        }
    return $first_min * $second_min;
    }
}
 
// Driver Code
$a = array(8,16,20,28,36,40);
$n = sizeof($a);
echo(printMinimumProduct($a, $n));
 
?>