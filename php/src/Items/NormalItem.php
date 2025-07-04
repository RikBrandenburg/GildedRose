<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\ItemWrapper;

class NormalItem extends ItemWrapper
{
    /**
     * Update the item by decreasing its sellIn value and quality.
     * If the sellIn is less than 0, the quality decreases by an additional 1.
     */
    public function update(): void
    {
        $this->decreaseSellIn();
        $this->decreaseQuality($this->item->sellIn < 0 ? 2 : 1);
    }
}
