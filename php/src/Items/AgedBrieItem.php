<?php

declare(strict_types=1);

namespace GildedRose\Items;

use GildedRose\ItemWrapper;

class AgedBrieItem extends ItemWrapper
{
    public function update(): void
    {
        $this->decreaseSellIn();
        $this->increaseQuality($this->item->sellIn < 0 ? 2 : 1);
    }
}
