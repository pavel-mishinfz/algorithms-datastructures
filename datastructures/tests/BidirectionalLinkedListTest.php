<?php
use PHPUnit\Framework\TestCase;
require_once 'BidirectionalLinkedList.php';

class BidirectionalLinkedListTest extends TestCase
{
    protected $list;
    protected function setUp(): void
    {
        $this->list = new BidirectionalLinkedList();
    }

    public function listToArray() {
        $result = [];
        $node = $this->list->head;
        while($node !== null) {
            $result[] = $node->value;
            $node = $node->next;
        }
        return $result;
    }

    public function testAddInTail() {
        $this->list->add_in_tail(new ListNode(57));
        $this->assertEquals($this->listToArray(), [57]);

        $this->list->add_in_tail(new ListNode(77));
        $this->list->add_in_tail(new ListNode(91));
        $this->list->add_in_tail(new ListNode(35));
        $this->assertEquals($this->listToArray(), [57, 77, 91, 35]);
    }

    public function testFind()
    {
        $this->assertEquals($this->list->find(12), null);

        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(19));

        $this->assertEquals($this->list->find(7)->value, 7);
    }

    public function testClean()
    {
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(19));
        $this->list->clean();

        $this->assertNull($this->list->head);
    }

    public function testLen()
    {
        $this->list->add_in_tail(new ListNode(12));
        $this->assertEquals($this->list->len(), 1);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(19));
        $this->assertEquals($this->list->len(), 3);
    }

    public function testFindAll()
    {
        $this->assertEquals($this->list->find_all(12), []);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(19));
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));

        $this->assertEquals($this->list->find_all(7), [7,7,7]);
    }

    public function testDelete() {
        $this->list->delete(7, true);
        $this->assertEquals($this->listToArray(), []);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->delete(7);
        $this->assertEquals($this->listToArray(), []);
    
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(3));
        $this->list->delete(7);
        $this->assertEquals($this->listToArray(), [12,3]);

        $this->list->delete(3);
        $this->assertEquals($this->listToArray(), [12]);

        $this->list->delete(12);
        $this->assertEquals($this->listToArray(), []);

        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(12));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->add_in_tail(new ListNode(7));
        $this->list->delete(7, true);
        $this->assertEquals($this->listToArray(), [12]);
    }

    public function testInsert() {
        $this->list->insert(null, new ListNode(12));
        $this->assertEquals($this->listToArray(), [12]);

        $this->list->insert(null, new ListNode(35));
        $this->assertEquals($this->listToArray(), [12,35]);

        $this->list->insert(new ListNode(12), new ListNode(99));
        $this->assertEquals($this->listToArray(), [12,99,35]);

        $this->list->insert(new ListNode(35), new ListNode(77));
        $this->assertEquals($this->listToArray(), [12,99,35,77]);
    }

    public function testAddInHead() {
        $this->list->add_in_head(new ListNode(5));
        $this->assertEquals($this->listToArray(), [5]);

        $this->list->add_in_head(new ListNode(12));
        $this->list->add_in_head(new ListNode(8));
        $this->list->add_in_head(new ListNode(11));
        $this->list->add_in_head(new ListNode(5));
        $this->assertEquals($this->listToArray(), [5,11,8,12,5]);
    }

    protected function tearDown(): void
    {
        $this->list = null;
    }
}