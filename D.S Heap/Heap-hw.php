<?php
function MaxHeapify(&$data, $heapSize, $index) {
    $left = $index * 2 + 1; //Subscript of the left child node of $index
    $right = $index * 2 + 2;//Subscript of the right child node of $index
    $largest = 0;
  
    if ($left < $heapSize && $data[$left] > $data[$index])
        $largest = $left;
    else
        $largest = $index;
  
    if ($right < $heapSize && $data[$right] > $data[$largest])
        $largest = $right;
  
    if ($largest != $index)
    {
       $temp = $data[$index];
       $data[$index] = $data[$largest];
       $data[$largest] = $temp;
  
       MaxHeapify($data, $heapSize, $largest);
    }
}
  
 function HeapOut(&$data, $count,$k) { //$k = Number of elements to be retrieved
    $heapSize = $count;
    $print = [];
    for ($p = floor($heapSize / 2 - 1 ); $p >= 0; $p--)
        MaxHeapify($data, $heapSize, $p);
  
    for ($i = $count - 1; $i > $count-1-$k; $i--) //Output the array after extracting K pieces.
    {
        $temp = $data[$i];
        array_push($print, $data[0]); //Reflect(dataをprintするため)
        $data[0] = $temp;

        $heapSize--;
        MaxHeapify($data, $heapSize, 0);
    }
    print_r($print);
}
  
$array = array(11, 23, 12, 9, 30, 2, 50);
HeapOut($array,count($array),3);
?>
