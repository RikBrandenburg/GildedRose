<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    /**
     * Update the quality of all items in the Gilded Rose inventory.
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $wrapper = ItemFactory::create($item);
            $wrapper->update();
        }
    }
}
