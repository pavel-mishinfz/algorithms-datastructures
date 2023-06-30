<?php
use PHPUnit\Framework\TestCase;
require_once 'SumLinkedLists.php';

class SumLinkedListsTest extends TestCase
{
    protected $list1;
    protected $list2;

    public function listToArray($list) {
        $result = [];
        $node = $list->head;
        while($node !== null) {
            $result[] = $node->value;
            $node = $node->next;
        }
        return $result;
    }

    protected function setUp(): void 
    {
        $this->list1 = new LinkedList();
        $this->list2 = new LinkedList();
    }

    public function testSumLinkedLists() {
        $list_sum = new LinkedList();
        $list_sum = sumLinkedLists($this->list1, $this->list2);
        $this->assertEquals($this->listToArray($list_sum), []);
        
        $this->list1->add_in_tail(new ListNode(12));
        $this->list2->add_in_tail(new ListNode(7));
        $list_sum = sumLinkedLists($this->list1, $this->list2);
        $this->assertEquals($this->listToArray($list_sum), [19]);

        $this->list1->add_in_tail(new ListNode(5));
        $this->list2->add_in_tail(new ListNode(8));
        $this->list1->add_in_tail(new ListNode(3));
        $this->list2->add_in_tail(new ListNode(11));
        $list_sum = sumLinkedLists($this->list1, $this->list2);
        $this->assertEquals($this->listToArray($list_sum), [19,13,14]);
    }

    protected function tearDown(): void
    {
        $this->list1 = null;
        $this->list2 = null;
    }
}