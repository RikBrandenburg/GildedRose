<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

/**
 * This unit test uses [Approvals](https://github.com/approvals/ApprovalTests.php).
 *
 * There are two test cases here with different styles:
 * <li>"foo" is more similar to the unit test from the 'Java' version
 * <li>"thirtyDays" is more similar to the TextTest from the 'Java' version
 *
 * I suggest choosing one style to develop and deleting the other.
 */
class ApprovalTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $app = new GildedRose($items);
        $app->updateQuality();

        $itemStrings = array_map(
            fn($item) => (string) $item,
            $items
        );

        Approvals::verifyList($itemStrings);
    }

    public function testThirtyDays(): void
    {
        $items = [
            new Item("+5 Dexterity Vest", 10, 20),
            new Item("Aged Brie", 2, 0),
            new Item("Elixir of the Mongoose", 5, 7),
            new Item("Sulfuras, Hand of Ragnaros", 0, 80),
            new Item("Sulfuras, Hand of Ragnaros", -1, 80),
            new Item("Backstage passes to a TAFKAL80ETC concert", 15, 20),
            new Item("Backstage passes to a TAFKAL80ETC concert", 10, 49),
            new Item("Backstage passes to a TAFKAL80ETC concert", 5, 49),
            new Item("Conjured Mana Cake", 3, 6),
        ];

        $app = new GildedRose($items);

        $results = [];

        for ($day = 0; $day < 30; $day++) {
            $results[] = "-------- day $day --------";
            $results[] = "name, sellIn, quality";

            foreach ($items as $item) {
                $results[] = (string) $item;
            }

            $results[] = ""; // empty line between days

            $app->updateQuality();
        }

        Approvals::verifyList($results);
    }
}
