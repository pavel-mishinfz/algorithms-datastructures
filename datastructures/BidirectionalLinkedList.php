<?php
class ListNode {
    public $value;
    public $prev;
    public $next;

    public function __construct($v)
    {
        $this->value = $v;
        $this->prev = null;
        $this->next = null;
    }
}

class BidirectionalLinkedList {
    public $head;
    public $tail;

    public function __construct()
    {
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
            $item->prev = $this->tail;
        }
        $this->tail = $item;
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

    public function find_all($val) {
        $result = [];
        $node = $this->head;
        while($node !== null) {
            if($node->value == $val) {
                $result[] = $node->value;
            }
            $node = $node->next;
        }
        return $result;
    }

    public function delete($val, $all = false) {
        $delete_node = $this->head;
        while($delete_node !== null) {
            if($delete_node->value == $val) {
                if($delete_node == $this->head) {
                    $this->head = $delete_node->next;
                }
                else {
                    $prev_node = $delete_node->prev;
                    $prev_node->next = $delete_node->next;
                    if($prev_node->next === null) {
                        $this->tail = $prev_node; 
                    }
                    else {
                        $delete_node->next->prev = $prev_node; 
                    }
                }
                if($all == false) {
                    return;
                }
            }
            $delete_node = $delete_node->next;
        }
    }

    public function insert($after_node, $new_node) {
        if($after_node === null && $this->head === null) {
            $this->head = $new_node;
            $this->tail = $new_node;
            return;
        }

        if($after_node === null && $this->head !== null) {
            $this->tail->next = $new_node;
            $new_node->prev = $this->tail;
            $this->tail = $new_node;
            return;
        }

        $node = $this->head;
        while($node !== null) {
            if($node->value == $after_node->value) {
                if($node === $this->tail) {
                    $this->tail->next = $new_node;
                    $new_node->prev = $this->tail;
                    $this->tail = $new_node;
                }
                else {
                    $new_node->next = $node->next;
                    $node->next->prev = $new_node;
                    $node->next = $new_node;
                    $new_node->prev = $node;
                }
                return;
            }
            $node = $node->next;
        }
    }

    public function add_in_head($new_node) {
        if($this->head === null) {
            $this->head = $new_node;
            $this->tail = $new_node;
            return;
        }
        $new_node->next = $this->head;
        $this->head->prev = $new_node;
        $this->head = $new_node;
    }

    public function clean() {
        $this->head = null;
        $this->tail = null;
        return;
    }

    public function len() {
        $len = 0;
        $node = $this->head;
        while($node !== null) {
            ++$len;
            $node = $node->next;
        }
        return $len;
    }
}
