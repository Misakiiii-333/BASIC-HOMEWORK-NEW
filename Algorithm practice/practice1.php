<?php
// Find the two smallest numbers in the array and sum the numbers.

function smallest_pair($arr, $n)
{
    $min = PHP_INT_MAX;
    $secondMin = PHP_INT_MAX;
    for ($j = 0; $j < $n; $j++)
    {
        if ($arr[$j] < $min)
        {
            $secondMin = $min;
            // minimum update
            $min = $arr[$j];
        } else if (($arr[$j] < $secondMin) && $arr[$j] != $min) {
 
            //secondMin update
            $secondMin = $arr[$j];
        }
    }
    // Return the sum of the minimum pair
    return ($secondMin + $min);
}
 
// Driver code
$arr = array(8, 4, 6, 3, 7, 15, 2, 3, 10);
$n = sizeof($arr);
echo smallest_pair($arr, $n);
 
?>
