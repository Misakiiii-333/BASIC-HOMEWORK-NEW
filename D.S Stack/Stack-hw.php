<?php
class Stack {
    private $elements;

    public function __construct()
    {
        $this->elements = array(); //initialize stack element
    }

    public function push($ele)//要素を挿入
    {
        $this->elements[] = $ele;
    }

    public function pop()
    {
        if (!$this->isEmpty()) { //要素が空でないことを確認
            array_pop($this->elements);
        }
    }

    public function top()//top elementを指定
    {
        if (!$this->isEmpty()) {//要素が空でないことを確認
            return $this->elements[sizeof($this->elements) - 1];//配列の要素数を指定
        } else {
        return null;
        }
    }

    public function isEmpty()//要素が空であるとき
    {
        return empty($this->elements);//空であることをかえす
    }

    public function size()
    { 
        return sizeof($this->elements); //sizeof:配列の要素数を数える
    }
}    
function removeCoupleOfWords($words)
{
    $stack = new Stack();
  
    for ($i = 0; $i < count($words); $i++) {
        if ($stack->isEmpty()) { 
            $stack->push($words[$i]);
        } else {
            $str = $stack->top(); //$str(string):文字列
            if ($words[$i] == $str) { 
                $stack->pop(); //そのstackは消去する
            } else { // otherwise push the current string
                $stack->push($words[$i]);
            }
        }
    }
    return $stack->size();
} 

//実行する
$words = ["ab", "aa", "aa", "bcd", "ab"];
echo removeCoupleOfWords($words);
?>