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
Class BinaryTree { //BinaryTree class
    private $root;
    private $arr;

    public function __construct($root = null,$arr = array()) {
        $this->root = $root;
        $this->arr = $arr;
    }

    public function getRoot() {
        return $this->root;
    }
    public function setRoot($root) {
        $this->root = $root;
    }

    public function addNewData($newNumber) { //add new data
        if ($this->root === null) { //root = null
            $this->root = new Node($newNumber);
            return;
        }
        for ($n = 0;$n < count($this->arr);$n++) { 
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
            } elseif($current->getRight() === null) { //if right nood = null
                $current->setRight(new Node($newNumber)); //add new node 
                array_push($this->arr,$current->getRight());
                break;
            } else {
                $i++;
            }
        }
    }
    public function showTheTree() { //show tree
        print_r($this->root);
    }
    
    public function arrayPush($data) {
        array_push($this->arr,$data);
    }
}
        $leaf1 = new Node(7);
        $leaf2 = new Node(15);
        $leaf3 = new Node(8);
        
        $parent1 = new Node(11, $leaf1); //I want to add a leaf(12) under this
        $parent2 = new Node(9, $leaf2, $leaf3); 
        $parent3 = new Node(10, $parent1,$parent2); 
        $root = $parent3; //Define root
        $bt = new BinaryTree($root);
        
        
        $bt->arrayPush($leaf1);
        $bt->arrayPush($leaf2);
        $bt->arrayPush($leaf3);
        $bt->arrayPush($parent1->getRight());
        $bt->arrayPush($parent1);
        $bt->arrayPush($parent2);
        $bt->arrayPush($parent3);
        
        $bt->addNewdata(12); //add leaf(12)
        $bt->showTheTree();
        
        ?>
