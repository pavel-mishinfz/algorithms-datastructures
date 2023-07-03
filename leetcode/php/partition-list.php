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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        $deleted_elements = [];
        $elements_less_that_x = $this->findElementsLessThatX($head, $x);
        
        foreach($elements_less_that_x as $elem) {
            $deleted_elements[] = $this->delete($head, $elem);
        }
        
        for($i = count($deleted_elements) - 1; $i >= 0; --$i) {
            $this->insert($head, new ListNode($deleted_elements[$i]));
        }
        return $head;
    }

    function findElementsLessThatX($head, $val) {
        $node = $head;
        $less = [];
        while($node !== null) {
            if($node->val < $val) {
                $less[] = $node->val;
            }
            $node = $node->next;
        }
        return $less;
    }

    function delete(&$head, $val) {
        $prev_node = $head;
        $delete_node = $head;
        while($delete_node !== null) {
            if($delete_node->val == $val) {
                if($delete_node === $head) {
                    $head = $head->next;
                }
                else {
                    $prev_node->next = $delete_node->next; 
                }
                return $delete_node->val;
            }
            $prev_node = $delete_node;
            $delete_node = $delete_node->next;
        }
    }

    function insert(&$head, $new_node) {
        $new_node->next = $head;
        $head = $new_node; 
    }
}