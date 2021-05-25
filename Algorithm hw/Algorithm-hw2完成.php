<?php
$array1 = [7, 5, 2];
$array2 = [6, 11, 4,9];
$k = 3;

// Sorting array input 1  in order of decreasing size.
quicksort($array1, 0, count($array1) - 1); 

// Sorting array input 2 in order of decreasing size.
quicksort($array2, 0, count($array2) - 1);

findSmallestPair($array1, $array2, $k);

function findSmallestPair($array1, $array2, $k) {
    //If the specified number of K's exceeds the number of pairs that can be created, it is not possible.
    if ($k > count($array1)*count($array2)) {
        echo "k pairs does not exist";
        return;        
    }

    $index2 = array_fill(0, count($array1), 0); 

    while ($k > 0) {
        // Initial min sum as maximum of integer
        $minSum = PHP_INT_MAX;//Maximum value of integer
        $minIndex = 0;

        foreach ($array1 as $i => $value1) { 

            if ($index2[$i] < count($array2) && ($value1 + $array2[$index2[$i]] < $minSum)) {
                // Store the new minIndex
                $minIndex = $i;
                // Update the minimum value of the sum
                $minSum = $value1 + $array2[$index2[$i]];
            }
        }
        // Print the pair
        echo "[{$array1[$minIndex]}, {$array2[$index2[$minIndex]]}] ";
        //Moving next element of array2
        $index2[$minIndex]++;
        // Exit the while statement when K is required.
        $k--;
    }
} 
function partition(&$array, $left, $right) {
    $pivot = $array[($right + $left) / 2]; //Define the pivot
    $i = $left;
    $j = $right;
    while ($i <= $j) {
        while ($array[$i] < $pivot) $i++;
        while ($array[$j] > $pivot) $j--;
        
        if ($i <= $j) {
            $temp = $array[$i]; 
            $array[$i] = $array[$j];
            $array[$j] = $temp;
            $i++;
            $j--;
        }
    } 
    return $i;
}

function quicksort(&$array, $left, $right) {
    if($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        quicksort($array,$left,$pivotIndex -1 );
        quicksort($array,$pivotIndex, $right);
    }
}
?>
