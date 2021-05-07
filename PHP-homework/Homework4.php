<?php

function isPrimenumber($y){
    if($y== 0 ||$y == 1){
        return false; 
 }
    if ($y == 2){
        return true; 
 }

    $x = $y/2 ;
    for ($i = 2;$i <= $x; $i++) {
         if($y%$i == 0){
            return false; 
    }
 }
    return true;
}

function getPrimeNumbers($ty){
    $result=[] ;
    for ($i = 1 ; $i<= $ty ; $i++){
        if(isPrimeNumber($i)) {
            array_push($result, $i); 
        }
    }
    return $result;
}

print_r(getPrimeNumbers(12)); //実行

?>