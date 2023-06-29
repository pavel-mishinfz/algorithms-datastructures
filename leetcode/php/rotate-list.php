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
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if($head === null || $head->next === null) {
            return $head;
        }
        $len = $this->len($head);
        if($len <= $k) {
            $k = $k % $len;
        }
        while($k) {
            $val = $this->pop_back($head);
            $node = new ListNode($val, $head);
            $head = $node;
            --$k;
        }
        return $head;
    }

    function len($head) {
        $len = 0;
        $node = $head;
        while($node !== null) {
            ++$len;
            $node = $node->next;
        }
        return $len;
    }

    function pop_back($head) {
        $cur_node = $head;
        $next_node = $head;
        while($next_node->next !== null) {
            $cur_node = $next_node;
            $next_node = $next_node->next;
        }
        $cur_node->next = null;
        return $next_node->val;
    }
}

/****** Approach ******/
/**
 *  The approach is quite simple. We extract the last item from the list and add it to the beginning. However, it should be taken into account that the list may be of small length, and k is hundreds of times larger. In this case, we should take the remainder of the division k modulo len, where len is the length of the list.
 *
 * 
 */