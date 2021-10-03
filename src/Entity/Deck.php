<?php
declare(strict_types=1);

namespace App\Entity;

use ArrayIterator;

class Deck
{
    private ArrayIterator $cards;

    public function __construct(array $cards)
    {
        $this->cards = new ArrayIterator($cards);
    }

    /**
     * Move the cursor to the next card
     */
    public function getNextCard(): void
    {
        $this->cards->next();
    }

    /**
     * Check if the deck is valid (If there are still cards available)
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->cards->valid();
    }

    /**
     * Return the current cart of the battle
     *
     * @return Card
     */
    public function getCurrentCard(): Card
    {
        return $this->cards->current();
    }
}
