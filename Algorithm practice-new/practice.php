<?php
//整数の2つの配列が与えられたとき，差が最小の値のペアを計算し、その差を返す。
function printMinimumProduct($arr, $n) {

    $first_min = min($arr[0], $arr[1]);
    $second_min = max($arr[0], $arr[1]);

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
$a = array(6,50,20,28,36,40);
$n = sizeof($a);
echo(printMinimumProduct($a, $n));
 
?>
