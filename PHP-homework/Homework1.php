<?php
$sum = 0;
for ($i = 0; $i < 50; $i++) {
    if ($i%2 === 1) {
        $sum += $i;
    }
}

echo $sum;
?>