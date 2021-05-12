<?php 
class Set {
    private $elements;

    public function __construct()
    {
        $this->elements = array();
    }
    public function add($ele)
    {
        if (!$this->isExist($ele)) {
            $this->elements[] = $ele;
        }
    }
    public function get()
    {
        return $this->elements;
    }
    public function isExist($ele)
    {
        return in_array($ele, $this->elements); 
    }
}
$dict = new Set(); //dict(辞書)
$day1Words = ["Hello", "Hi", "Good morning", "Good night"];
$day2Words = ["Hi", "Name", "Age"];
$day3Words = ["Good morning", "How are you", "Fine", "Thank"];

$allDays = [$day1Words, $day2Words, $day3Words];

    foreach ($allDays as $day) { //多段階の配列を展開
    foreach($day as $word) {
        $dict->add($word);
    }
}
print_r($dict->get())
?>
