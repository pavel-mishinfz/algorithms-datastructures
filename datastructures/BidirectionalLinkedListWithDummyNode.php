<?php
class ListNode {
    public $val;
    public $prev;
    public $next;

    public function __construct($v)
    {
        $this->val = $v;
        $this->prev = null;
        $this->next = null;
    }
}
class ListDummyNode extends ListNode {
    public function __construct()
    {
        $this->prev = null;
        $this->next = null;
    }
}
class BidirectionalLinkedListWithDummyNode {
    private $head;
    private $tail;

    public function __construct()
    {
        $this->head = new ListDummyNode(); 
        $this->tail = new ListDummyNode(); 
    }

    public function add_in_tail($new_node) {
        if($this->head->next === null) {
            $this->head->next = $new_node;
            $new_node->next = $this->tail;
            $this->tail->prev = $new_node;
            $new_node->prev = $this->head;
        }
        else {
            $new_node->next = $this->tail;
            $this->tail->prev->next = $new_node;
            $new_node->prev = $this->tail->prev; 
            $this->tail->prev = $new_node;
        }
    }

    public function delete($val, $all = false) {
        $delete_node = $this->head->next;
        while($delete_node !== null && $delete_node !== $this->tail) {
            if($delete_node->val == $val) {
                $delete_node->prev->next = $delete_node->next;
                $delete_node->next->prev = $delete_node->prev;
                if($all == false) {
                    return;
                }
            }
            $delete_node = $delete_node->next;
        }
    }

    public function insert($after_node, $new_node) {
        if($after_node === null && $this->head->next === null) {
            $this->head->next = $new_node;
            $new_node->next = $this->tail;
            $this->tail->prev = $new_node;
            $new_node->prev = $this->head;
            return;
        }
        if($after_node === null && $this->head->next !== null) {
            $new_node->next = $this->tail;
            $this->tail->prev->next = $new_node;
            $new_node->prev = $this->tail->prev; 
            $this->tail->prev = $new_node;
            return;
        }
        $node = $this->head->next;
        while($node !== null && $node !== $this->tail) {
            if($node->val == $after_node->val) {
                $new_node->next = $node->next; 
                $node->next = $new_node;
                $node->next->prev = $new_node;
                $new_node->prev = $node;
                return;
            }
            $node = $node->next;
        }
    }

    // Function for only tests
    public function listToArray() {
        $result = [];
        $node = $this->head->next;
        while($node !== null && $node !== $this->tail) {
            $result[] = $node->val;
            $node = $node->next;
        }
        return $result;
    }
}