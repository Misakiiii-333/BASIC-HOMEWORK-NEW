<?
class Node {
   
    private $data;
    private $next; 

    public function __construct($data = 0, $next = null)  // default value of $data is 0, $next is null
    {
        $this->data = $data; // initial $data
        $this->next = $next;  // initial $next
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
        }
    }
   
    public function deleteAll($data)
    {
        if ($this->head == null) { // linked list is empty
            echo "List is empty.";
            return;
        }
        while ($this->head->getData() == $data) {
            $this->head = $this->head->getNext();
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
}

$list = new LinkedList(); //init LinkedList : $head = null
$list->insert(10); 
$list->insert(4); 
$list->insert(1); 
$list->insert(2);
$list->insert(5);
$list->insert(2);
$list->insert(3);

$list->visit(); // 10 4 1 2 5 2 3 

echo "<br>";

$list->deleteAll(10);
$list->visit();


?>