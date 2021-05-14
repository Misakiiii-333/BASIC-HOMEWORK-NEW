<?php
class Queue {
    /** @var array queue element */
    private $elements;//タスクが入っている
    /** @var array $dependentList */
    private $dependentList;//タスクの順番が入っている

    public function __construct() {
        $this->elements = array(); //initialize queue element
        $this->dependentList = array();
    }

    /**
    * insert an element
    * @param string $ele
    * @return void
    */
    public function enqueue($ele) {
        array_unshift($this->elements, $ele); 
    }

    /**
    * delete front element
    * @return void
    */
    public function dequeue() {
        if (!$this->isEmpty()) { //check if queue is not empty
            unset($this->elements[sizeof($this->elements) - 1]); // same to pop function in stack
        }
    }

    /**
    * get front element
    * @return string
    */
    public function front() {
        if (!$this->isEmpty()) {
            return $this->elements[sizeof($this->elements) - 1]; // 一番先頭のstackと同じように返す
        }
        return null;
    }
    /**
    * check queue is empty or not
    * @return boolean
    */
    public function isEmpty(){
        return empty($this->elements);
    }
    
    //タスクの順番
    public function inputDependentList($num) {
        array_unshift($this->dependentList, $num); 
        // print_r($this->dependentList);
    }
    
    public function deleteDependentList() {
        if (!$this->isEmptyDependentList()) { //queueが空でないか確認
            unset($this->dependentList[sizeof($this->dependentList) - 1]); // same to pop function in stack
        }
    }
    
    public function isEmptyDependentList() {
        return empty($this->dependentList);
    }
    
    //タスクの実行
    public function doTask($n){
        $hour = 0;
        echo "start:"."\n";
        print_r($this->elements);
        print_r($this->dependentList);
        
        for($i = $n - 1; $i >= 0;    ){
            echo "\n"."i = ".$i."\n";
            echo "elements[i] = ".$this->elements[$i]."\n";
            echo "dependentList = ".$this->dependentList[$i]."\n";
            
            if($this->elements[$i] == $this->dependentList[$i]){ //優先順位通りに仕事が手元に来た時
                $hour = $hour + 2; //仕事にかかる時間は2時間
                $this->dequeue(); //仕事が実行されたら消去(dequenceされますよ)
                $this->deleteDependentList();
                echo "after:"."\n"; //残っている仕事を明示しましょう
                print_r($this->elements);
                print_r($this->dependentList);
                $i = $i - 1; //$i--をこの時だけ実行したいから
            }else{
                $hour = $hour + 1;
                array_unshift($this->elements, $this->front()); 
                $this->dequeue();
            }
            echo "hour: ".$hour."\n";
        }
        return $hour;
    }
}
//与えられたタスク
$priorityTasks = new Queue();
$priorityTasks->enqueue(2);
$priorityTasks->enqueue(1);
$priorityTasks->enqueue(3);

//タスクをこなす順番
$priorityTasks->inputDependentList(1);
$priorityTasks->inputDependentList(2);
$priorityTasks->inputDependentList(3);

//タスク実行
echo $priorityTasks->doTask(3);

?>