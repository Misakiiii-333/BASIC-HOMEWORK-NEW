<?php
class Queue {
    /** @var array queue element */
    private $elements;

    public function __construct()
    {
        $this->elements = array(); //initialize queue element
    }

    /**
    * insert an element
    * @param int $num
    * @return void
    */
    public function enqueue($num)
    {
        array_unshift($this->elements, $num); 
    }
    /**
    * delete front element
    * @return void
    */
    public function dequeue()
    {
        if (!$this->isEmpty()) { //要素が空でないとき
            unset($this->elements[sizeof($this->elements) - 1]); 
    }
}

    public function front()
    {
        if (!$this->isEmpty()) {
            return $this->elements[sizeof($this->elements) - 1]; // 一番先頭のstackと同じように返す
        }

        return null;
    }

/**
* check queue is empty or not
* @return boolean
*/
    public function isEmpty()
    {
        return empty($this->elements);
    }
}

$queue = new Queue();
$queue->enqueue("first");
$queue->enqueue("second");
$queue->enqueue("third");
$queue->dequeue();
while (!$queue->isEmpty()) {
    echo $queue->front() . " ";
    $queue->dequeue();

}
?>