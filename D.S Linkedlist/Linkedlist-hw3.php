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
        $newNode = new Node($data); //ノードを設定
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
    public function visit()
    {
        $currNode = $this->head;
        echo "Linked List: ";

        while ($currNode != null) {
            echo $currNode->getData() . " ";
            $currNode = $currNode->getNext();
        }
    }
    public function merge($n1,$n2) //mergeすると定義しているだけ
    {
        if ($n1->head == null) { //もしもn1が空の時はn2をかえす
            return $n2;
        } elseif ($n2->head == null) { //もしもn2が空である時はn1をかえす
            return $n1;
        } elseif ($n1->head->getData() > $n2->head->getData()) { //n1がn2よりも大きい場合
            return $this->mergeUtil($n2,$n1);
        } else { //n2(head)がn1(head)よりも大きい場合
            return $this->mergeUtil($n1,$n2); //n1(小)→n2（大)
        }
    }
    public function mergeUtil($n1,$n2) //実際にmergeしていく
    {
        if ($n1->head->getNext() == null) {
            $n1->head->setNext($n2);
            return $n1;
        }
    
        $curr1 = $n1->head;
        $next1 = $n1->head->getNext();
        $curr2 = $n2->head;
        $next2 = $n2->head->getNext();

        while ($next1 != null && $curr2 != null) { //next1とcurr2両方がnullでないときが条件
            if (($curr2->getData()) >= ($curr1->getData()) && ($curr2->getData()) <= ($next1->getData())) {
                $next2 = $curr2->getNext();
                $curr1->setNext($curr2);
                $curr2->setNext($next1);  

                $curr1 = $curr2;
		$curr2 = $next2;
            } else {
                if ($next1->getNext() != null) {//next1がnullでないときが条件
	            $next1 = $next1->getNext();
	            $curr1 = $curr1->getNext();
	        } else {
		    $next1->setNext($curr2);
	            return $n1;
	        }
            }
        }
        return $n1;
    }
}
$list = new LinkedList(); 
$list->insert(5); 
$list->insert(7); // (5) -> (7)
$list->insert(9); // (5) -> (7) -> (9)

$list1 = new LinkedList(); 
$list1->insert(4); //
$list1->insert(6); // (4) -> (6)
$list1->insert(8); // (4) -> (6) -> (8)

$list2 = $list->merge($list, $list1);
$list2->visit();

?>
