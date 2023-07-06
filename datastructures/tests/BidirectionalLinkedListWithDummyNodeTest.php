<?php

use PHPUnit\Framework\TestCase;
require_once 'BidirectionalLinkedListWithDummyNode.php';

class BidirectionalLinkedListWithDummyNodeTest extends TestCase {
    protected $list;
    protected function setUp(): void
    {
        $this->list = new BidirectionalLinkedListWithDummyNode();
    }

    public function testAddInTail() {
        $this->list->add_in_tail(new ListNode(57));
        $this->assertEquals($this->list->listToArray(), [57]);

        $this->list->add_in_tail(new ListNode(77));
        $this->list->add_in_tail(new ListNode(91));
        $this->list->add_in_tail(new ListNode(35));
        $this->assertEquals($this->list->listToArray(), [57, 77, 91, 35]);
    }

    public function testDelete() {
        $this->list->delete(7, true);
        $this->assertEquals($this->list->listToArray(), []);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->delete(7);
        $this->assertEquals($this->list->listToArray(), []);
    
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(3));
        $this->list->delete(7);
        $this->assertEquals($this->list->listToArray(), [12,3]);

        $this->list->delete(3);
        $this->assertEquals($this->list->listToArray(), [12]);

        $this->list->delete(12);
        $this->assertEquals($this->list->listToArray(), []);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->delete(7, true);
        $this->assertEquals($this->list->listToArray(), [12]);
    }

    public function testInsert() {
        $this->list->insert(null, new ListNode(12));
        $this->assertEquals($this->list->listToArray(), [12]);

        $this->list->insert(null, new ListNode(35));
        $this->assertEquals($this->list->listToArray(), [12,35]);

        $this->list->insert(new ListNode(12), new ListNode(99));
        $this->assertEquals($this->list->listToArray(), [12,99,35]);

        $this->list->insert(new ListNode(35), new ListNode(77));
        $this->assertEquals($this->list->listToArray(), [12,99,35,77]);
    }

    protected function tearDown(): void
    {
        $this->list = null;
    }
}