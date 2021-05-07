<?php
$a = [1, 2, 3, 4, 5];
$b = [4, 5, 3, 2, 10];
$c = []; // c[i] = a[i] + b[i]

$cnt = count($a);

for ($i = 0; $i < $cnt; $i++) {
    $c[$i] = $a[$i] + $b[$i];
}

print_r($c); //実行

?>
