<?php
/**
* A node of Binary Tree (BT)
*/
class Node {
    /** @var int */
    private $data;

    /** @var Node left subtree */
    private $left;

    /** @var Node right subtree */
    private $right;

    public function __construct($data, $left = null, $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }

    /**
    * get data
    * @return int
    */
    public function getData()
    {
        return $this->data;
    }

    /**
    * set data
    * @param int $data
    */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
    * get left
    * @return Node
    */
    public function getLeft()
    {
        return $this->left;
    }

    /**
    * set left
    * @param Node $left
    */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
    * get right
    * @return Node
    */
    public function getRight()
    {
        return $this->right;
    }

    /**
    * set right
    * @param Node $right
    */
    public function setRight($right)
    {
        $this->right = $right;
    }
}
Class BinaryTree { //BinaryTree classの作成
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
    
    		// case 'postorder':
    		// $this->_postorder($this->root);
    		// break;
    
    		// case 'preorder':
    		// $this->_preorder($this->root);
    		// break;
    
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

    // private function _preorder($node) {
    
    // 	echo $node->getData(). " ";
    
    // 	if($node->getLeft()) {
    // 		$this->_preorder($node->getLeft()); 
    // 	} 
    
    
    // 	if($node->getRight()) {
    // 		$this->_preorder($node->getRight()); 
    // 	} 
    // }

    // private function _postorder($node) {
    
    // 	if($node->getLeft()) {
    // 		$this->_postorder($node->getLeft()); 
    // 	} 
    
    
    // 	if($node->getRight()) {
    // 		$this->_postorder($node->getRight()); 
    // 	} 
    
    // 	echo $node->getData(). " ";
    // }


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
                $current->setRight(new Node($newNumber)); //add new node
                // $current->setRight($node);
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
        array_push($this->arr,$newNode); //Add an element to the array
    }


    public function makeTree($node) {
        $currentNode = $this->root; //current Node
        array_push($this->nodeArray, $node->getData());
        $count = count($this->nodeArray); //Number of nodes
        echo "COUNT: ".count($this->nodeArray)."\n";
        $j = 0;
        while(true){
            if($j * $j -1 <= $count && $count < ($j + 1) * ($j + 1) -1){
                $num = $j;//階層
                break;
            }
            $j++;
        }
        echo "NUM: ".$num."\n";
        $now = 1; //Current hierarchy
        $this->check = true; 
        $this->addLeaf($num, $now, $currentNode, $node);

    }

    public function addLeaf($num, $now, $currentNode, $node) {
        if($now != $num){
            //look at everything from the right first.
            if($this->check && $currentNode->getRight() != null){
                $this->addLeaf($num , $now + 1, $currentNode->getRight(), $node);
            }
            //look all the way to the left.
            if($this->check && $currentNode->getLeft() != null){    
                $this->addLeaf($num, $now + 1, $currentNode->getLeft(), $node);
            }
        }else{
            //look at everything from the right first.
            if($currentNode->getRight() == null){
                $this->check = false;
                $currentNode->setRight($node);
                return;
            }
            //look all the way to the left.
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

$root = $parent3;//追加した

$bt = new BinaryTree($root);



// $bt->traverse('inorder');
$bt->makeTree(new Node(12));
$bt->showTheTree();      
?>
