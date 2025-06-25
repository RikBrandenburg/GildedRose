<?php

declare(strict_types=1);

namespace GildedRose;

abstract class ItemWrapper
{
    public function __construct(
        protected Item $item
    ) {
    }

    /**
     * Update the item quality and sellIn value.
     */
    abstract public function update(): void;

    /**
     * Increase the quality of the item by a specified amount, up to a maximum of 50.
     */
    protected function increaseQuality(int $amount = 1): void
    {
        $this->item->quality = min(50, $this->item->quality + $amount);
    }

    /**
     * Decrease the quality of the item by a specified amount, down to a minimum of 0.
     */
    protected function decreaseQuality(int $amount = 1): void
    {
        $this->item->quality = max(0, $this->item->quality - $amount);
    }

    /**
     * Decrease the sellIn value of the item by 1.
     */
    protected function decreaseSellIn(): void
    {
        --$this->item->sellIn;
    }
}
