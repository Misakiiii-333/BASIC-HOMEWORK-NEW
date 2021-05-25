<?php 

function partition(&$array, $left, $right) {
    $pivot = $array[$right];
    $i = $left -1;
    for ($j = $left; $j < $right; $j++) {
          if(($array[$j] < $pivot)){
            $i++; 
            $temp = $array[$i];
            $array[$i] = $array[$j]; //replacement work
            $array[$j] = $temp;
          }
    } 
    /**
     * Exit the For statement because the value of j 
    *is such that the if statement does not hold and 
    *the condition of the For statement j<right.
    **/
    $temp = $array[$i + 1];
    $array[$i + 1] = $array[$right];
    $array[$right] = $temp;
    return ($i + 1);
}

function quicksort(&$array, $left, $right) {
    if($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        quicksort($array,$left,$pivotIndex -1 );
        quicksort($array,$pivotIndex, $right);
    }
}

function printArray(&$arr, $n) 
{ 
    for ($i = 0; $i < $n; $i++) 
        print_r($arr[$i]." "); 
        echo "\n"; 
} 

$arr = [0, 2, 1, 9, 7]; 
$n = count($arr); 
quicksort($arr, 0,$n-1);
$sum = $arr[$n-2]+ $arr[$n-1];
print_r($sum); 

?>
