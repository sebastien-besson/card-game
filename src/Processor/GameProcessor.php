<?php
declare(strict_types=1);

namespace App\Processor;

use App\Entity\Game;
use App\Entity\Player;

class GameProcessor
{
    private int $nbCards;
    private Game $game;
    private Player $player1;
    private Player $player2;

    public function __construct(int $nbCards)
    {
        $this->game = new Game();
        $this->nbCards = $nbCards;
    }

    /**
     * Process the game
     */
    public function process(): void
    {
        $this->configureGame($this->nbCards);
        $this->printStartGame();

        $deckPlayer1 = $this->player1->getDeck();
        $deckPlayer2 = $this->player2->getDeck();

        while ($deckPlayer1->isValid() && $deckPlayer2->isValid()) {
            $this->printPlayersDrawingCard();

            if ($deckPlayer1->getCurrentCard()->getValue() > $deckPlayer2->getCurrentCard()->getValue()) {
                $this->player1->setScore($this->player1->getScore() + 1);
            } else {
                $this->player2->setScore($this->player2->getScore() + 1);
            }

            $this->printCurrentRound();
            $this->game->setRound($this->game->getRound() + 1);

            $deckPlayer1->getNextCard();
            $deckPlayer2->getNextCard();
        }

        $this->printEndGame();
    }

    /**
     * Init and configure the game from nbCards
     *
     * @param int $nbCards
     */
    private function configureGame(int $nbCards): void
    {
        $this->game->initCards($nbCards);
        $decks = $this->game->initDecks();
        $this->player1 = new Player('Player1', $decks[0]);
        $this->player2 = new Player('Player2', $decks[1]);
    }

    /**
     * Print Start Game
     */
    private function printStartGame(): void
    {
        print_r($this->player1->getName() . ' VS ' . $this->player2->getName() . PHP_EOL);
        sleep(1);
    }

    /**
     * Print players drawing card
     */
    private function printPlayersDrawingCard(): void
    {
        print_r(
            $this->player1->getName() . ' draws card value : ' . $this->player1->getDeck()->getCurrentCard()->getValue() . PHP_EOL
        );
        usleep(500000);

        print_r(
            $this->player2->getName() . ' draws card value : ' . $this->player2->getDeck()->getCurrentCard()->getValue() . PHP_EOL
        );
        usleep(500000);
    }

    /**
     * Print the current round
     */
    private function printCurrentRound(): void
    {
        print_r(
            'ROUND ' . $this->game->getRound() . ' - ' .
            $this->player1->getScoreName() . ' | ' .
            $this->player2->getScoreName() . PHP_EOL
        );
        sleep(1);
    }

    /**
     * Print End Game, Announce the winner
     */
    private function printEndGame(): void
    {
        print_r(
            'Winner is : ' . (
            ($this->player1->getScore() > $this->player2->getScore()) ? $this->player1->getName() : $this->player2->getName()
            )  . PHP_EOL
        );
    }
}
