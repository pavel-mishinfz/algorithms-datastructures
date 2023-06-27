<?php
class ListNode {
    public $value;
    public $next;

    public function __construct($v = 0, $next = null) {
        $this->value = $v;
        $this->next = $next;
    }
}

class LinkedList {
    private $head;
    private $tail;


    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    public function add_in_tail($item) {
        if($this->head === null) {
            $this->head = $item;
        }
        else {
            $this->tail->next = $item;
        }
        $this->tail = $item;
    } 

    public function print_all_nodes() {
        $node = $this->head;
        while($node !== null) {
            print($node->value . "\n");
            $node = $node->next;
        }
    }

    public function find($val) {
        $node = $this->head;
        while($node !== null) {
            if($node->value == $val) {
                return $node;
            }
            $node = $node->next;
        }
        return null;
    }

    public function delete($val, $all = false) {
        $delete_node = $this->head;
        $prev_node = null;
        // 1. The list is empty
        while($delete_node !== null) {
            if($delete_node->value == $val) {
                // 2. The element is in the middle or end of the list
                if($prev_node !== null) {
                    // 2.1 The element is in the middle of the list
                    $prev_node->next = $delete_node->next;
                    // 2.2 The element is at the end of the list
                    if($prev_node->next === null) {
                        $this->tail = $prev_node;
                    }
                }
                else { 
                    // 3. The element is at the top of the list
                    $this->head = $delete_node->next;
                    // 4. The list consists of one element
                    if($this->head === null) {
                        $this->tail = null;
                    }
                }
                if($all && $delete_node !== null) {
                    $this->delete($val, $all);
                }
                return;
            }
            $prev_node = $delete_node;
            $delete_node = $delete_node->next;
        }
    }
}