<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePassItem extends ItemWrapper
{
    /**
     * Update the Backstage Pass item.
     * The quality increases as the sellIn value decreases, with special rules for different ranges.
     *
     * @return void
     */
    public function update(): void
    {
        $this->decreaseSellIn();

        // If the sellIn is less than 0, the quality drops to 0 regardless of it's current value.
        if ($this->item->sellIn < 0) {
            $this->item->quality = 0;
            return;
        }

        // The quality increases by 1 by default
        $this->increaseQuality();

        // If the sellIn is less than 11, the quality increases by an additional 1.
        if ($this->item->sellIn < 10) {
            $this->increaseQuality();
        }

        // If the sellIn is less than 6, the quality increases by an additional 1.
        if ($this->item->sellIn < 5) {
            $this->increaseQuality();
        }
    }
}
