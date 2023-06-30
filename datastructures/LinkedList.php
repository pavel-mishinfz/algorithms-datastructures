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
    public $head;
    public $tail;


    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    public function add_in_tail($item) {
        if($this->head === null) {
            $this->head = $item;
            $this->tail = $item;
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
        $prev_node = $this->head;
        // 1. The list is empty
        while($delete_node !== null) {
            if($delete_node->value == $val) {
                // 2. The element is at the top of the list
                if($delete_node === $this->head) {
                    $this->head = $delete_node->next;  
                }
                // 3. The element is in the middle or end of the list
                else {
                    // 3.1 The element is in the middle of the list
                    $prev_node->next = $delete_node->next; 
                    // 3.2 The element is at the end of the list
                    if($delete_node == $this->tail) {
                        $this->tail = $prev_node; 
                    }
                }
                if($all) {
                    $this->delete($val, $all);
                }
                return;
            }
            $prev_node = $delete_node;
            $delete_node = $delete_node->next;
        }
    }

    public function clean() {
        $this->head = null;
        $this->tail = null;
    }

    public function find_all($val) {
        $elements = [];
        $node = $this->head;
        while($node !== null) {
            if($node->value == $val) {
                $elements[] = $node->value;
            }
            $node = $node->next;
        }
        return $elements;
    }

    public function len() {
        $length = 0;
        $node = $this->head;
        while($node !== null) {
            ++$length;
            $node = $node->next;
        }
        return $length;
    }

    public function insert($after_node, $new_node) {
        if($this->head === null) {
            $this->head = $new_node;
            $this->tail = $new_node;
            return;
        }

        if($after_node === null) {
            $new_node->next = $this->head;
            $this->head = $new_node; 
            return;
        }

        $prev_node = $this->head;
        $next_node = $this->head;
        while($next_node !== null) {
            $prev_node = $next_node;
            $next_node = $next_node->next;
            if($prev_node->value == $after_node->value) {
                if($next_node === null) {
                    $prev_node->next = $new_node; 
                }
                else {
                    $new_node->next = $prev_node->next;
                    $prev_node->next = $new_node;    
                }
            }
        }
    }
}