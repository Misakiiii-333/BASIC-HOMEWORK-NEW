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

/**
* Binary Tree Class
*/
class BinaryTree {
    /** @var Node */ 
    protected $root;

    public function __construct($root = null)
    {
        $this->root = $root;
    }

	public function isEmpty() {
        return $this->root === null;
    }

    /**
    * get root
    * @return Node
    */
    public function getRoot()
    {
        return $this->root;
    }

    /**
    * set root
    * @param Node $root
    */
    public function setRoot($root)
    {
        $this->root = $root;
    }
 
    public function traverse($method) {
        switch($method) {
        
            case 'inorder':
            $this->_inorder($this->root);
            break;
        
            case 'postorder':
            $this->_postorder($this->root);
            break;
        
            case 'preorder':
            $this->_preorder($this->root);
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
        
        if($node->getRight()) {
            $this->_inorder($node->getRight()); 
        } 
    }
    
    private function _preorder($node) {
        
        echo $node->getData(). " ";
        
        if($node->getLeft()) {
            $this->_preorder($node->getLeft()); 
        } 

        if($node->getRight()) {
            $this->_preorder($node->getRight()); 
        } 
    }
    
    private function _postorder($node) {
        
        if($node->getLeft()) {
            $this->_postorder($node->getLeft()); 
        } 
        
        
        if($node->getRight()) {
            $this->_postorder($node->getRight()); 
        } 
        
        echo $node->getData(). " ";
    }
}  

   
class SearchBinaryTree extends BinaryTree {
    public function insert($data) {
        if($this->root == NULL) {
            $this->root = new Node($data);
        } else {
	    $current = $this->root;
	    while(true) {
                if($data < $current->getData()) {					
	            if($current->getLeft()) {
		        $current = $current->getLeft();
		    } else {
		        $current->setLeft(new Node($data));
		        break; 
		    }
	      } else if($data > $current->getData()) {
	          if($current->getRight()) {
	              $current = $current->getRight();
	          } else {
		      $current->setRight(new Node($data));
		      break; 
	          }
	      } else {
	          break;
	      }
	  } 
      }
}
    public function getMaxelement() {
        $currentNode = $this->root; //spot where you are now
        while(true){
            if($currentNode->getRight() == null){
                $maxdata = $currentNode->getData(); //return getData (data value)
                break;
            } else {
                // $maxdata = $node->getRight()->getData();
                $currentNode = $currentNode->getRight(); //Shift your viewpoint to the bottom Right node. 
            }
            
        }
        echo $maxdata."\n";
        return $maxdata;
    }  
    public function getMinimumelement() {
        $currentNode = $this->root;//spot where you are now
        while(true){
            if($currentNode->getLeft() == null){
                $mindata = $currentNode->getData(); //return getData (data value)
                break;
            } else { 
                $currentNode = $currentNode->getLeft(); //Shift your viewpoint to the bottom left node.                
            }
        }
        echo $mindata."\n";
        return $mindata;                 
    }
}  


$arr = array(10, 5, 19, 1 ,6, 17);
$tree = new SearchBinaryTree();
for($i=0,$n=count($arr);$i < $n;$i++) {
    $tree->insert($arr[$i]);
}
// echo "\nFind value 5 in tree:\n"; 
// $tree->search(5);
// echo "\nFind value 18 in tree:\n"; 
// $tree->search(18);
$tree->getMaxelement();
$tree->getMinimumelement();
?>
