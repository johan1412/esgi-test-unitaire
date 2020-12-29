<?php

namespace tests\Entity;

use App\Entity\Item;
use App\Entity\ToDoList;
use App\Entity\User;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

class ToDoListTest extends TestCase {

    private User $user;
    private Item $item;

    public function createUser() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->user = $user;
    }

    public function createItem() {
        $item = new Item();
        $item->setName("item1");
        $item->setContent("contenu de item");
        $item->setCreatedAt(new DateTime('now'));

        $this->item = $item;
    }

    public function testCanAddItemNominal() {
        $todolist = new ToDoList();
        $todolist->setName("testName");
        $todolist->setUser($this->user->getId());

        $this->assertTrue($todolist->canAddItem($this->item));
    }

    public function testCanAddItemNull() {
        $item = null;
        $todolist = new ToDoList();
        $todolist->setName("testName");
        $todolist->setUser($this->user->getId());

        $this->assertFalse($todolist->canAddItem($item));
    }

    public function testCanAddLastItemTooRecent() {
        $todolist = $this->getMockBuilder(ToDoList::class)->onlyMethods(['lastItem'])->getMock();
        $todolist->setUser($this->user);

        $lastItem = new Item();
        $lastItem->setName("item2");
        $lastItem->setContent("content of second");
        $date = new DateTime('now');
        $lastItem->setCreatedAt($date->sub(new DateInterval('P60S')));

        $todolist->expects($this->any())->method('lastItem')->willReturn($lastItem);

        $this->assertFalse($todolist->canAddItem($this->item));
    }

    public function testCanAddItemTooMany() {
        $todolist = $this->getMockBuilder(ToDoList::class)->onlyMethods(['countItem'])->getMock();
        $todolist->setUser($this->user);

        $todolist->expects($this->any())->method('countItem')->willReturn(10);

        $this->assertFalse($todolist->canAddItem($this->item));
    }

}