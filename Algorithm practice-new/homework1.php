<?php
function findLargestSumPair($arr, $n) {

    $max;
    $secondMax;
     
    if ($arr[0] > $arr[1]) {
        $max = $arr[0];
        $secondMax = $arr[1];
    } else {
        $max = $arr[1];
        $secondMax = $arr[0];
    }
 
    for ( $i = 2; $i < $n; $i++) {

        if ($arr[$i] > $max) {
            $secondMax = $max;
            $max = $arr[$i];
        }else if ($arr[$i] >  $secondMax and $arr[$i] != $max) {
            $secondMax = $arr[$i];
        }
    return ($max + $secondMax);
    }
}
 
    // Driver Code
    $arr = array(0, 2, 1, 9, 7);
    $n = count($arr);
    echo "Largest pair Sum :" 
    findLargestSumPair($arr, $n);
 
?>