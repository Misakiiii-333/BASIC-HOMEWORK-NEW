<?php

function Primenumber($y){
    if($y==0 || $y ==1){
        return false;
 }
     if ($y == 2){
        return true;
 }
     $x = $y/2;
    for ($i = 2;$i <= $x; $i++){
        if($y%$i == 0){
            return false; 
        }
    }
    return true;
}


if(Primenumber(9)){
    echo "9 is prime number"."\n";   
} else {
    echo "9 is not prime number"."\n"; 
}
if (PrimeNumber(31)) {
    echo "31 is prime number"."\n";   
} else {
    echo "31 is not prime number"."\n";
}

?>