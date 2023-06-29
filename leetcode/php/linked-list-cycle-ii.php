<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

 class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        $slow_p = $head;
        $fast_p = $head;
        while($fast_p !== null && $fast_p->next !== null) {
            $slow_p = $slow_p->next;
            $fast_p = $fast_p->next->next; 
            if($slow_p === $fast_p) {
                $slow_p = $head;
                while($slow_p !== $fast_p) {
                    $slow_p = $slow_p->next;
                    $fast_p = $fast_p->next;
                }
                return $slow_p;
            }
        }
        return null;
    }
}

/****** Approach ******/
/**
 *  Drawing an analogy in life, we can consider two athletes running in a circle. If one athlete runs faster than the second, then at a certain point in time they will meet again.
 * 
 * 
 *  Turtle and Hare algorithm:
 *  1. You need to create two pointers, one of which will be twice as fast as the other.
 * 
 *  2. Moving through the list until the nodes are equal to each other, this will mean that the cycle is found. Otherwise, the fast pointer will reach null.
 * 
 *  3. In order to find the node from which the cycle begins, it is necessary to return the slow pointer to the head and move them with the fast one at the same pace. 
 */