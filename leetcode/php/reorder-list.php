<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList($head) {
        $length = $this->len($head); 
        $elements = $this->delete($head, $length);
        $node = $head;
        for($i = count($elements) - 1; $i >= 0; --$i) {
            $elements[$i]->next = $node->next;
            $node->next = $elements[$i];
            $node = $node->next->next; 
        }
    }

    function len($head) {
        $length = 0;
        $node = $head;
        while($node !== null) {
            ++$length;
            $node = $node->next;
        }
        return $length;
    }

    function delete(&$head, $len) {
        $cnt = 0;
        $elements = [];
        $prev_node = $head;
        $delete_node = $head;
        while($delete_node !== null) {
            if($cnt >= ceil($len / 2))  {
                $prev_node->next = $delete_node->next;
                $elements[] = $delete_node;
                $delete_node = $prev_node->next;
                continue;
            }
            ++$cnt;
            $prev_node = $delete_node;
            $delete_node = $delete_node->next;
        }
        return $elements;
    }
}