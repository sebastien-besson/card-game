<?php
declare(strict_types=1);

namespace App\Entity;

class Player
{
    private string $name;
    private int $score;
    private Deck $deck;

    public function __construct(string $name, Deck $deck)
    {
        $this->score = 0;
        $this->name = $name;
        $this->deck = $deck;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

    /**
     * @param Deck $deck
     */
    public function setDeck(Deck $deck): void
    {
        $this->deck = $deck;
    }

    /**
     * @return string
     */
    public function getScoreName(): string
    {
        return $this->getName() . ', score: ' . $this->getScore();
    }
}
