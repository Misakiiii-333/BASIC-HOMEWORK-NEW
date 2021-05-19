<?php
/**
* A node of Binary Tree (BT)
*/
class Node {
    private $data;

    private $left;

    private $right;

    public function __construct($data, $left = null, $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
    }
}
Class BinaryTree { 
    private $root;
    private $arr;
    private $nodeArray;
    private $check;

    public function __construct($root = null, $arr = array(), $nodeArray = array()) {
        $this->root = $root;
        $this->arr = $arr;
        $this->nodeArray = $nodeArray;
        $this->check = true;
        $this->traverse('inorder');

    }

    public function getRoot(){
        return $this->root;
    }
    public function setRoot($root){
        $this->root = $root;
    }

    public function traverse($method) {
    	switch($method) {
    
    		case 'inorder':
    		$this->_inorder($this->root);
    		break;
       
    		default:
    		break;
    	} 
    
    } 
    
    private function _inorder($node) {
    
    	if($node->getLeft()) {
    		$this->_inorder($node->getLeft()); 
    	} 
    
    	echo $node->getData(). " ";
        array_push($this->nodeArray, $node->getData());

    	if($node->getRight()) {
    		$this->_inorder($node->getRight()); 
    	}
        return $this->nodeArray; 
    }

    public function addNewData($newNumber) { //add new data
        if ($this->root === null) { //root = null
            $this->root = new Node($newNumber);
            return;
        }
        for ($n = 0;$n < count($this->arr)-1;$n++) { 
            if($this->arr[$n] == null) {
                $this->arr[$n] = new Node($newNumber);
                break;
            }
        }
        $i = 0;
        while ($i < count($this->arr)) {
            $current = $this->arr[$i];
            if($current->getLeft() === null) { 
                $current->setLeft(new Node($newNumber));
                array_push($this->arr,$current->getLeft());
               break;
            } elseif($current->getRight() === null) { 
                $current->setRight(new Node($newNumber)); 
                array_push($this->arr,$current->getRight());
                break;
            } else {
                $i++;
            }
        }
    }
    public function showTheTree() { 
        print_r($this->root);
    }
    
    public function arrayPush($newNode) {
        array_push($this->arr,$newNode); 
    }


    public function makeTree($node) {
        $currentNode = $this->root; 
        array_push($this->nodeArray, $node->getData());
        $count = count($this->nodeArray); 
        echo "COUNT: ".count($this->nodeArray)."\n";
        $j = 0;
        while(true){
            if($j * $j -1 <= $count && $count < ($j + 1) * ($j + 1) -1){
                $num = $j;
                break;
            }
            $j++;
        }
        echo "NUM: ".$num."\n";
        $now = 1; 
        $this->check = true; 
        $this->addLeaf($num, $now, $currentNode, $node);

    }

    public function addLeaf($num, $now, $currentNode, $node) {
        if($now != $num){
            if($this->check && $currentNode->getRight() != null){
                $this->addLeaf($num , $now + 1, $currentNode->getRight(), $node);
            }
            if($this->check && $currentNode->getLeft() != null){    
                $this->addLeaf($num, $now + 1, $currentNode->getLeft(), $node);
            }
        }else{
            if($currentNode->getRight() == null){
                $this->check = false;
                $currentNode->setRight($node);
                return;
            }
            else if($currentNode->getLeft() == null){
                $this->check = false;
                $currentNode->setLeft($node);
                return;
            }
            else{
                return;
            }

        }
    }
}

$leaf1 = new Node(7);
$leaf2 = new Node(15);
$leaf3 = new Node(8);

$parent1 = new Node(11, $leaf1);
$parent2 = new Node(9, $leaf2, $leaf3); 
$parent3 = new Node(10, $parent1,$parent2); 

$root = $parent3;

$bt = new BinaryTree($root);


$bt->makeTree(new Node(12));
$bt->showTheTree();      
?>
