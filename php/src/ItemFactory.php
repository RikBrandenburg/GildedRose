<?php

declare(strict_types=1);

namespace GildedRose;

class ItemFactory
{
    /**
     * Mappings of item names to their respective classes which allows for larger scaling purposes.
     */
    private const MAPPINGS = [
        'Aged Brie' => AgedBrieItem::class,
        'Sulfuras, Hand of Ragnaros' => SulfurasItem::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePassItem::class,
    ];

    public static function create(Item $item): ItemWrapper
    {
        if (str_contains($item->name, 'Conjured')) {
            return new ConjuredItem($item);
        }

        $class = self::MAPPINGS[$item->name] ?? NormalItem::class;
        return new $class($item);
    }
}
