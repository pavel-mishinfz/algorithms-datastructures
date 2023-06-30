<?php
require_once "LinkedList.php";

function sumLinkedLists($list1, $list2) {
    $list_sum = new LinkedList();
    if($list1->len() == $list2->len()) {
        $node_list1 = $list1->head;
        $node_list2 = $list2->head;
        while($node_list1 !== null && $node_list2 !== null) {
            $list_sum->add_in_tail(new ListNode($node_list1->value + $node_list2->value));
            $node_list1 = $node_list1->next;
            $node_list2 = $node_list2->next;
        }
        return $list_sum;
    }
    return null;
}