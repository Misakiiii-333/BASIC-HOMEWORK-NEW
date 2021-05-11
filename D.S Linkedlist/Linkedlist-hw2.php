<?
class Node {
   
    private $data;
    private $next; 

    public function __construct($data = 0, $next = null)  // default value of $data is 0, $next is null
    {
        $this->data = $data; // initial $data
        $this->next = $next; // initial $next
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getPrev()
    {
        return $this->prev;
    }
    public function setPrev()
    {
        $this->prev = $prev;
    }
} 
class LinkedList { 
    /** @var Node  head node */
    private $head;

    public function insert($data)
    {
        $newNode = new Node($data); // ノードを設定
        if ($this->head == null) {
            $this->head = $newNode;
        } else {
            $last = $this->head; 
            while ($last->getNext() != null) { 
                $last = $last->getNext();
            }
            // insert new node to at last node
            $last->setNext($newNode);
            $newNode->setPrev($last); //新しいノードをlastに設定
        }
    }
    public function deleteAll($data)
    {
        if ($this->head == null) { // linked list is empty
            echo "List is empty.";
            return;
        }
        $current = $this->head;
	    
        while ($current->getNext() != null)
        {
            if ($current->getNext()->getData() == $data)
            {
                $current->setNext($current->getNext()->getNext());
            } else {
                $current = $current->getNext();
            }
        }
    }
    public function visit()
    {
        $currNode = $this->head;
        echo "Linked List: ";

        while ($currNode != null) {
            echo $currNode->getData() . " ";
            $currNode = $currNode->getNext();
        }
    }
    public function reverse()
    {
		$preNode = null;
        $currNode = $this->head;
		$nextNode = null;

        echo "Linked List: ";

        while ($currNode != null) { //nullになったらストップ
            $nextNode = $currNode->getNext(); 
            $currNode->setNext($preNode);//前のノードをセット
            $preNode = $currNode;//次のループの準備
            $currNode = $nextNode;//次のノードを設定する、nullが来たら終了
        }
        while ($currNode !== null) {
            echo $currNode->getData() . " ";
            $currNode = $currNode->getPrev();
        }
        $this->head =$preNode;
    }
}

$list = new LinkedList(); //init LinkedList : $head = null
$list->insert(1); 
$list->insert(2); 
$list->insert(3); 
$list->insert(4);
$list->insert(5);

$list->visit(); 

//$list->reverse(); 
$list->visit();


?>
