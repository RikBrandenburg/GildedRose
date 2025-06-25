<?php

declare(strict_types=1);

namespace GildedRose;

class ConjuredItem extends ItemWrapper
{
    /**
     * Update the Conjured item by decreasing its sellIn value and quality.
     * 
     * @return void
     */
    public function update(): void
    {
        $this->decreaseSellIn();
        $this->decreaseQuality($this->item->sellIn < 0 ? 4 : 2);
    }
}
