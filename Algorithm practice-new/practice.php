<?php
//整数の2つの配列が与えられたとき，差が最小（非負）の値のペア（各配列に1つの値）を計算。その差を返す。
function printMinimumProduct($arr, $n)
{
     
    // 第一、第二の最小値を初期化する。配列には少なくとも2つの要素があると仮定。
    $first_min = min($arr[0], $arr[1]);
    $second_min = max($arr[0], $arr[1]);
 
    // 残りの配列を走査し，2つの最小要素を追跡する
    //（最小要素が複数回現れる場合は，2つの最小要素が同じになることがあることに注意)
    for ($i = 2; $i < $n; $i++)
    {
        if ($arr[$i] < $first_min)
        {
            $second_min = $first_min;
            $first_min = $arr[$i];
        }
        else if ($arr[$i] < $second_min)
            $second_min = $arr[$i];
    }
 
    return $first_min * $second_min;
}
 
// Driver Code
$a = array(8,16,20,28,36,40);
$n = sizeof($a);
echo(printMinimumProduct($a, $n));
 
?>