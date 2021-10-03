<?php
declare(strict_types=1);

namespace App\Entity;

class Game
{
    private array $cards;
    private array $decks;
    private int $round;

    public function __construct()
    {
        $this->cards = [];
        $this->decks = [];
        $this->round = 1;
    }

    /**
     * Init all the cards
     *
     * @param int $maxCardValue
     * @return array
     */
    public function initCards(int $maxCardValue): array
    {
        foreach (range(1, $maxCardValue) as $number) {
            $card = new Card();
            $card->setValue($number);
            $this->cards[] = $card;
        }
        shuffle($this->cards);

        return $this->cards;
    }

    /**
     * Init and return the decks according to the numbers of players
     *
     * @param int $nbDecks
     * @return array
     */
    public function initDecks(int $nbDecks = 2): array
    {
        $cardPacks = array_chunk($this->cards, (int) ceil(count($this->cards) / $nbDecks));

        foreach ($cardPacks as $cardPack) {
            $deck = new Deck($cardPack);

            $this->decks[] = $deck;
        }

        return $this->decks;
    }

    /**
     * @return int
     */
    public function getRound(): int
    {
        return $this->round;
    }

    /**
     * @param int $round
     */
    public function setRound(int $round): void
    {
        $this->round = $round;
    }
}
