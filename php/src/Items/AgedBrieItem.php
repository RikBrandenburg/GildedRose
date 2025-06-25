<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieItem extends ItemWrapper
{
    public function update(): void
    {
        $this->decreaseSellIn();
        $this->increaseQuality($this->item->sellIn < 0 ? 2 : 1);
    }
}
