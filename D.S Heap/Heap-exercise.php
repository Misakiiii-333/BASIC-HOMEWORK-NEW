<?php
function MaxHeapify(&$data, $heapSize, $index) { // &$Variable〜= reference
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
      $temp = $data[$index]; //temp=Wait for the contents of a variable
      $data[$index] = $data[$largest];
      $data[$largest] = $temp;
  
      MaxHeapify($data, $heapSize, $largest);
   }
 }
  
 function HeapSort(&$data, $count) {
   $heapSize = $count;
  
   for ($p = floor($heapSize / 2 - 1 ); $p >= 0; $p--)
      MaxHeapify($data, $heapSize, $p);
  
   for ($i = $count - 1; $i > 0; $i--)
   {
      $temp = $data[$i];
      $data[$i] = $data[0];
      $data[0] = $temp;
  
      $heapSize--;
      MaxHeapify($data, $heapSize, 0);
   }
 }
  
$array = array(20,43,65,88,11,33,56,74,80);
HeapSort($array,count($array));
print_r($array);
 
 ?>