<?php

namespace tests\Entity;

use App\Entity\Item;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase {

    public function testIsValidNominal() {
        $item = new Item();
        $item->setName("itemName");
        $item->setContent("contenu de item");
        $item->setCreatedAt(new DateTime('now'));

        $this->assertTrue($item->isValid());
    }

    public function testIsValidNameEmpty() {
        $item = new Item();
        $item->setName("");
        $item->setContent("contenu de item");
        $item->setCreatedAt(new DateTime('now'));

        $this->assertFalse($item->isValid());
    }

    public function testIsValidContentEmpty() {
        $item = new Item();
        $item->setName("name");
        $item->setContent("");
        $item->setCreatedAt(new DateTime('now'));

        $this->assertFalse($item->isValid());
    }

    public function testIsValidContentTooLong() {

        $item = $this->getMockBuilder(Item::class)->onlyMethods(['contentLength'])->getMock();
        $item->expects($this->once())->method('contentLength')->willReturn(1050);

        $this->assertFalse($item->isValid());
    }


}